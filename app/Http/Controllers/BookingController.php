<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Booking;
use Carbon\Carbon;
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
        if ($user->role == 1){
            // Host
            $areas = Area::rightJoin('bookings', 'areas.id', '=', 'bookings.area_id')
                ->leftJoin('area_ratings', 'areas.id', '=', 'area_ratings.area_id')
                ->select('areas.*', 'bookings.*', 'area_ratings.rating')
                ->where('created_by', $user->id)->get()->sortBy('start_date');
        } else {
            $areas = Area::rightJoin('bookings', 'areas.id', '=', 'bookings.area_id')
                ->leftJoin('area_ratings', 'areas.id', '=', 'area_ratings.area_id')
                ->select('areas.*', 'bookings.*', 'area_ratings.rating')
                ->where('bookings.guest_id', $user->id)->get()->sortBy('start_date');
        }
        $bookings = $areas->mapToGroups(function($item, $key){
                $now = Carbon::now()->toDateTimeString();
                // dd($now);
                if ($item->cancelled == 0){
                    if ($item->end_date <= $now){
                        return ['completed' => $item];
                    }
                    if ($now >= $item->start_date && $now < $item->end_date){
                        return ['ongoing' => $item];
                    }
                    if ($now < $item->start_date){
                        return ['upcoming' => $item];
                    }
                } else return ['cancelled' => $item];

                return ['none' => $item];
        });

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
        $booking = Booking::where('area_id', $request->areaId)->get();

        return view('area.area_booking', compact('area', 'booking'));
    }

    public function create()
    {
        //
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
        if ($update > 0){
            $message = 'Booking successfully cancelled!';
        } else $message = 'Something went wrong. Please try again.';
        return redirect('/bookings')->with('alert', $message);
    }
}
