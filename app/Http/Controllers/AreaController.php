<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaType;
use App\Models\AreaPicture;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\AreaRating;
use App\Models\Booking;

class AreaController extends Controller
{

    public function myarea()
    {
        $data = Area::Where('created_by', auth()->user()->id)->paginate(4);

        return view('area.myarea', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $areatypes = DB::table('area_types')->orderByDesc('id')->get();

        return view('area.create', compact(['areatypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaRequest $request)
    {
        //validation

        $text = [
            'area_close_hour.gt' => 'Area close hour must be greater than area open hour.',
        ];

        $this->validate($request, [
            'area_name' => 'required|min:5',
            'area_address' => 'required',
            'area_description' => 'required',
            'area_open_hour' => 'required',
            'area_close_hour' => 'required|gt:' . (int)$request->area_open_hour,
            'area_price' => 'required',
            'area_type' => 'required',
            'area_thumbnail' => 'required',
        ], $text);



        // $latestAreaId = DB::table('areas')->orderByDesc('id')->select('id')->first()->id;

        //masukkin thumbnail
        $thumbnail_area = $request->area_thumbnail;
        $thumbnail_area_file_name = time() . '.' . $thumbnail_area->getClientOriginalExtension();
        $thumbnail_area_destination = public_path('/assets/areas_thumbnail');
        $thumbnail_area->move($thumbnail_area_destination, $thumbnail_area_file_name);

        $insertedArea = Area::create([
            'created_by' => auth()->user()->id,
            'name' => $request->area_name,
            'area_type' => $request->area_type,
            'description' => $request->area_description,
            'price' => $request->area_price,
            'address' => $request->area_address,
            'thumbnail' => $thumbnail_area_file_name,
            'status' => 0,
        ]);

        //masukkin foto-foto ke area_pictures
        if (isset($request->area_pictures)) {
            $idx = 0;
            foreach ($request->area_pictures as $p) {
                //masukkin foto ke local file
                $picture_area = $p;
                $picture_area_file_name = $idx++ . time() . '.' . $picture_area->getClientOriginalExtension();
                $picture_area_destination = public_path('/assets/area_pictures');
                $picture_area->move($picture_area_destination, $picture_area_file_name);
                //masukkin ke table area_pictures
                AreaPicture::create([
                    'area_id' => $insertedArea->id,
                    'pictures' => $picture_area_file_name,
                ]);
            };
        }
        dd("done");

        return redirect('/')
            ->with('alert', 'Your sport area has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    //FUNCTION BUAT MUNCULIN AREA Detail
    public function show(Request $request)
    {
        $area = Area::where('id', $request->areaId)->first();
        $ratings = AreaRating::join('bookings', 'bookings.booking_id', '=', 'area_ratings.booking_id')
            ->where('bookings.area_id', $request->areaId)->get();
        $area->areaRatings = $ratings;

        return view('area.area_detail', compact('area'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $area = Area::where('id', $id)->first();

        $areaPictures = AreaPicture::where('area_id', $area->id);
        unlink('assets/areas_thumbnail/' . $area->thumbnail);
        foreach ($areaPictures as $a) {
            unlink('assets/area_picture/' . $a->pictures);
        }

        $area->delete();
        return redirect('/')
            ->with('alert', $area->name . ' has been deleted successfully!');
    }
}
