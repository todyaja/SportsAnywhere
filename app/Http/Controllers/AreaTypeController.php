<?php

namespace App\Http\Controllers;

use App\Models\AreaType;
use App\Http\Requests\StoreAreaTypeRequest;
use App\Http\Requests\UpdateAreaTypeRequest;

class AreaTypeController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AreaType  $areaType
     * @return \Illuminate\Http\Response
     */
    public function show(AreaType $areaType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AreaType  $areaType
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaType $areaType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaTypeRequest  $request
     * @param  \App\Models\AreaType  $areaType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaTypeRequest $request, AreaType $areaType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AreaType  $areaType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaType $areaType)
    {
        //
    }
}
