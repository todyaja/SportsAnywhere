<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\AreaRating;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            // Host
            $areas = Area::rightJoin('bookings', 'areas.id', '=', 'bookings.area_id')
                ->leftJoin('area_ratings', 'bookings.booking_id', '=', 'area_ratings.booking_id')
                ->leftJoin('users', 'users.id', '=', 'bookings.guest_id')
                ->select('areas.*', 'bookings.*', 'area_ratings.rating', 'bookings.guest_id', 'users.username')
                ->where('created_by', $user->id)->get()->sortBy('start_date');
        } else {
            $areas = Area::rightJoin('bookings', 'areas.id', '=', 'bookings.area_id')
                ->leftJoin('area_ratings', 'bookings.booking_id', '=', 'area_ratings.booking_id')
                ->select('areas.*', 'bookings.*', 'area_ratings.rating', 'bookings.guest_id')
                ->where('bookings.guest_id', $user->id)->get()->sortBy('start_date');
        }
        $bookings = $areas->mapToGroups(function ($item, $key) {
            $now = Carbon::now()->toDateTimeString();
            // dd($now);
            if ($item->cancelled == 0) {
                if ($item->end_date <= $now) {
                    return ['completed' => $item];
                }
                if ($now >= $item->start_date && $now < $item->end_date) {
                    return ['ongoing' => $item];
                }
                if ($now < $item->start_date) {
                    return ['upcoming' => $item];
                }
            } else return ['cancelled' => $item];

            return ['none' => $item];
        });
        // dd($bookings);
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function areaBookingNeededData(Request $request)
    {

        $area = Area::where('id', $request->areaId)->first();
        $booking = [];
        $isBookingDateEmpty = true;

        if ($request->bookingDate != null) {
            $isBookingDateEmpty = false;

            date_default_timezone_set('Asia/Jakarta');
            if ($request->bookingDate < date("Y-m-d")) {
                return back()->withErrors('Booking date cannot be less than current date');;
            }

            $bookingDate = DateTime::createFromFormat('Y-m-d', $request->bookingDate);
            $bookingDate->setTime(0, 0, 0);
            $from = clone $bookingDate;
            $bookingDate->setTime(23, 59, 59);
            $to = clone $bookingDate;

            $booking = Booking::where('area_id', '=',  $request->areaId)
                ->where('cancelled', '=',  '0')
                ->whereBetween('start_date', [$from, $to])
                ->get();
        }

        return view('area.area_booking', compact('area', 'booking', 'isBookingDateEmpty'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'bookingDate' => 'required',
            'bookStart' => 'required',
            'bookEnd' => 'required',
        ]);

        $area = Area::where('id', $request->areaId)->first();

        date_default_timezone_set('Asia/Jakarta');

        $bookingDate = DateTime::createFromFormat('Y-m-d', $request->bookingDate);
        $bookingDate->setTime(0, 0, 0);
        $from = clone $bookingDate;
        $bookingDate->setTime(23, 59, 59);
        $to = clone $bookingDate;

        if ($request->bookingDate < date("Y-m-d")) {
            return back()->withErrors('Booking Date cannot be less than the current date');;
        }

        if ((int)$request->bookStart < (int)explode(':', $area->open_time)[0]) {
            return back()->withErrors('Booking Start Time cannot be less than Area Open Time');
        }

        if ((int)$request->bookEnd > (int)explode(':', $area->close_time)[0]) {
            return back()->withErrors('Booking End Time cannot be greater than Area Close Time');
        }

        if ((int)$request->bookStart >= (int)$request->bookEnd) {
            return back()->withErrors('Booking Start Time cannot be greater than or equal to Booking End Time');;
        }

        $booking = Booking::where('area_id', '=',  $request->areaId)
            ->where('cancelled', '=',  '0')
            ->whereBetween('start_date', [$from, $to])
            ->get();

        foreach ($booking as $b) {
            $start = (int)date("H", strtotime($b->start_date));
            $end = (int)date("H", strtotime($b->end_date));

            if ((int)$request->bookStart == $start || (int)$request->bookEnd == $end) {
                return back()->withErrors('Booking Time collide with Booking#' . $b->booking_id);
            }

            if ((int)$request->bookStart > $start && (int)$request->bookStart < $end) {
                return back()->withErrors('2 Booking Time collide with Booking#' . $b->booking_id);
            }

            if ((int)$request->bookEnd > $start && (int)$request->bookEnd < $end) {
                return back()->withErrors('3 Booking Time collide with Booking#' . $b->booking_id);
            }

            if ((int)$request->bookStart < $start && (int)$request->bookEnd > $end) {
                return back()->withErrors('4 Booking Time collide with Booking#' . $b->booking_id);
            }
        }

        $bookingDate->setTime((int)$request->bookStart, 0, 0);
        $start_date = clone $bookingDate;
        $bookingDate->setTime((int)$request->bookEnd, 0, 0);
        $end_date = clone $bookingDate;

        Booking::create([
            'area_id' => $request->areaId,
            'guest_id' => auth()->user()->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'cancelled' => 0,
        ]);

        return redirect("/")->with('alert', 'Sport Area has been booked succesfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function giveRating(Request $request)
    {
        $booking = Booking::where('booking_id', $request->bookingId)->first();
        $area = Area::where('id', $booking->area_id)->first();
        // dd("halo ".auth()->user()->id. "    guest_id = ".$booking->guest_id);
        if ($booking->guest_id != auth()->user()->id) {

            return redirect('/')->with('alert', 'Sorry something went wrong');
        }

        return view('booking.booking_rating', compact(['area']));
    }


    public function postRating(Request $request)
    {
       // dd($request);
        AreaRating::create([
            'rating' => $request->rate,
            'review' => $request->description,
            'booking_id' => $request->bookingId,
        ]);

        return redirect('/')->with('alert', 'Thank you for your rating !');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update = Booking::where('booking_id', $id)->update([
            'cancelled' => 1
        ]);
        if ($update > 0) {
            $message = 'Booking successfully cancelled!';
        } else $message = 'Something went wrong. Please try again.';
        return redirect('/bookings')->with('alert', $message);
    }
}
