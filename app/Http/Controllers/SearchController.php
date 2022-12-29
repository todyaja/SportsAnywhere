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

        //sort
        $sortBy = $request->input('sortBy');
        /**
         * 1 -> ascending alphabet
         * 2 -> descending alphabet
         * 3 -> highest price
         * 4 -> lowest price
         */
        switch($sortBy){
            case 1: {
                $areas = $areas->sortBy('name');
                break;
            }
            case 2: {
                $areas = $areas->sortByDesc('name');
                break;
            }
            case 3: {
                $areas = $areas->sortByDesc('price');
                break;
            }
            case 4: {
                $areas = $areas->sortBy('price');
                break;
            }
        }


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
        return view('search.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('search.index');
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
        return view('search.index');
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
