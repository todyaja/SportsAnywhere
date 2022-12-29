<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\AreaPicture;
use App\Models\AreaType;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->validate($request,[
            'area_name' => 'required|min:5',
            'area_address' => 'required',
            'area_description' => 'required',
            'area_open_hour' => 'required',
            'area_close_hour' => 'required|gt:'.(int)$request->area_open_hour,
            'area_price' => 'required',
            'area_type' => 'required',
            'area_thumbnail' => 'required',
        ],$text);



       $latestAreaId = DB::table('areas')->orderByDesc('id')->select('id')->first()->id;

       //masukkin thumbnail
       $thumbnail_area = $request->area_thumbnail;
       $thumbnail_area_file_name = time() . '.' . $thumbnail_area->getClientOriginalExtension();
       $thumbnail_area_destination = public_path('/assets/areas_thumbnail');
       $thumbnail_area->move($thumbnail_area_destination, $thumbnail_area_file_name);

        Area::create([
            'id' => $latestAreaId+1,
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
           foreach($request->area_pictures as $p){
            //masukkin foto ke local file
            $picture_area = $p;
            $picture_area_file_name = time() . '.' . $picture_area->getClientOriginalExtension();
            $picture_area_destination = public_path('/assets/area_pictures');
            $picture_area->move($picture_area_destination, $picture_area_file_name);
            //masukkin ke table area_pictures
            AreaPicture::create([
                'area_id' => $latestAreaId,
                'pictures' => $picture_area_file_name,
            ]);
           };
        }

        return redirect('/')
        ->with('alert','Your sport area has been created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    //FUNCTION BUAT MUNCULIN AREA Detail
    public function show(Area $area)
    {
        //

        return view('area.area_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
