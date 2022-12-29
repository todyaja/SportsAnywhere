<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $areasName = Area::where('name', 'LIKE', '%'.$request->input('searchArea').'%');
        $areasDesc = Area::where('description', 'LIKE', '%'.$request->input('searchArea').'%');

        //filter
        $categoryFilter = $request->input('categoryFilter');

        if ($categoryFilter){
            $areasName = $areasName->whereIn('area_type', $categoryFilter);
            $areasDesc = $areasDesc->whereIn('area_type', $categoryFilter);
        }
        $areas = $areasName->union($areasDesc);
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        if ($minPrice){
            $areas = $areas->where('price', '>=', $minPrice);
        }
        if ($maxPrice){
            $areas = $areas->where('price', '<=', $maxPrice);
        }

        $areas = $areas->get();
        $areaTypes = AreaType::all();
        return view('search.index', compact('areas', 'areaTypes', 'categoryFilter'));
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
        return view('search.index');
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
        //
    }
}
