<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaRating;
use App\Models\AreaType;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function paginateManual($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function index(Request $request)
    {
        $areasName = Area::leftJoin('bookings', 'bookings.area_id', '=', 'areas.id')
            ->leftJoin('area_ratings', 'bookings.booking_id', '=', 'area_ratings.booking_id')
            ->select('areas.id', 'areas.name', 'areas.description', 'areas.price', 'areas.thumbnail', DB::raw('AVG(rating) as rating'))
            ->where('name', 'LIKE', '%' . $request->input('searchArea') . '%')
            ->groupBy('areas.id', 'areas.name', 'areas.description', 'areas.price', 'areas.thumbnail');
        $areasDesc = Area::leftJoin('bookings', 'bookings.area_id', '=', 'areas.id')
            ->leftJoin('area_ratings', 'bookings.booking_id', '=', 'area_ratings.booking_id')
            ->select('areas.id', 'areas.name', 'areas.description', 'areas.price', 'areas.thumbnail', DB::raw('AVG(rating) as rating'))
            ->where('description', 'LIKE', '%' . $request->input('searchArea') . '%')
            ->groupBy('areas.id', 'areas.name', 'areas.description', 'areas.price', 'areas.thumbnail');

        //filter
        $categoryFilter = $request->input('categoryFilter');

        if ($categoryFilter) {
            $areasName = $areasName->whereIn('area_type', $categoryFilter);
            $areasDesc = $areasDesc->whereIn('area_type', $categoryFilter);
        }


        $areas = $areasName->union($areasDesc);
        //sort
        $sortBy = $request->input('sortBy');
        /**
         * 1 -> ascending alphabet
         * 2 -> descending alphabet
         * 3 -> highest price
         * 4 -> lowest price
         */
        switch ($sortBy) {
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
        $areas = $areas->get();

        foreach ($areas as $a) {
            $bookings = Booking::where('area_id', $a->id)->get();
            $booking_ids = [];
            foreach ($bookings as $b) {
                array_push($booking_ids, $b->booking_id);
            }
            $ratings = DB::table('area_ratings')->whereIn('booking_id', $booking_ids)
                ->avg('rating');
            $a->rating = number_format($ratings == null ? 0 : $ratings, 1);
        }
        $rating = $request->input('ratingFilter');
        if ($rating == '4') {
            $areas = $areas->where('rating', '>=', 4);
        }


        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        if ($minPrice) {
            $areas = $areas->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $areas = $areas->where('price', '<=', $maxPrice);
        }
            $areas = $this->paginateManual($areas);

        $areaTypes = AreaType::all()->sortByDesc('id');

        return view('search.index', compact('areas', 'areaTypes'));
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
        $areasName = Area::where('name', 'LIKE', '%' . $request->input('searchArea') . '%');
        $areasDesc = Area::where('description', 'LIKE', '%' . $request->input('searchArea') . '%');

        //filter
        $categoryFilter = $request->input('categoryFilter');

        if ($categoryFilter) {
            $areasName = $areasName->whereIn('area_type', $categoryFilter);
            $areasDesc = $areasDesc->whereIn('area_type', $categoryFilter);
        }
        $areas = $areasName->union($areasDesc);
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        if ($minPrice) {
            $areas = $areas->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $areas = $areas->where('price', '<=', $maxPrice);
        }

        $areas = $areas->get();
        $areaTypes = AreaType::all();
        dd($areas);
        return view('search.index', compact('areas', 'areaTypes', 'categoryFilter'));
    }
}
