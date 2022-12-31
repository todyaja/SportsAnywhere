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
        $areasName = Area::leftJoin('area_ratings', 'areas.id', '=', 'area_ratings.area_id')
                    ->select('areas.*', 'area_ratings.rating_id', 'area_ratings.guest_id', 'area_ratings.review', 'area_ratings.rating')
                    ->where('name', 'LIKE', '%'.$request->input('searchArea').'%');
        $areasDesc = Area::leftJoin('area_ratings', 'areas.id', '=', 'area_ratings.area_id')
                    ->select('areas.*', 'area_ratings.rating_id', 'area_ratings.guest_id', 'area_ratings.review', 'area_ratings.rating')
                    ->where('description', 'LIKE', '%'.$request->input('searchArea').'%');
        //filter
        $categoryFilter = $request->input('categoryFilter');

        if ($categoryFilter){
            $areasName = $areasName->whereIn('area_type', $categoryFilter);
            $areasDesc = $areasDesc->whereIn('area_type', $categoryFilter);
        }

        $rating = $request->input('ratingFilter');

        if ($rating){
            $areasName = $areasName->where('rating', '>=', $rating);
            $areasDesc = $areasDesc->where('rating', '>=', $rating);
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
                $areas = $areas->orderBy('name', 'ASC');
                break;
            }
            case 2: {
                $areas = $areas->orderBy('name', 'DESC');
                break;
            }
            case 3: {
                $areas = $areas->orderBy('price', 'DESC');
                break;
            }
            case 4: {
                $areas = $areas->orderBy('price', 'ASC');
                break;
            }
            default: {
                $areas = $areas->orderBy('name', 'ASC');
            }
        }

        $areas = $areas->simplePaginate(6);
        $areas->transform(function ($dt) {
            if ($dt->rating == null){
                $dt->rating = 0;
            }
            return $dt;
        });
        $areaTypes = AreaType::all()->sortByDesc('id');
        return view('search.index', compact('areas', 'areaTypes'));
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
