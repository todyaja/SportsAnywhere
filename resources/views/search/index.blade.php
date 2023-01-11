@section('title', 'Search Page')
@extends('layout.master')
@section('content')
    <div class="container d-flex flex-column">
        <h1 class="my-4">Sport Areas</h1>

        <div class="d-flex flex-row col-9 justify-content-between align-items-center">
            @if (app('request')->input('searchArea') != '')
                <h2 class="fs-4 my-3">Show result for "{{ app('request')->input('searchArea') }}"</h2>
            @endif


        </div>


        <div class='row d-flex '>
            <div class='d-flex col-9 flex-column'>
                <div class="row d-flex justify-content-start g-0" id="areaList">
                   @foreach ($areas as $d)
                    <div class="col-4">
                        <a href="{{ url('areaPage/' . $d->id) }}" style="text-decoration: none">
                            <div class="card my-2" style="width: 18rem; height: 30rem">
                                <img src="{{ asset('assets/areas_thumbnail/' . $d->thumbnail) }}"
                                    style="width: 100%; height: 200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="my-2">{{ $d->name }}</h6>
                                    <p class="card-text text-black">{{ Str::limit($d->description, 100) }}</p>
                                    <h6 class="text-secondary">{{ Str::limit($d->address, 40) }}</h6>
                                </div>
                                <div class="card-footer bg-transparent flex-row d-flex justify-content-between">
                                    <div class="text-secondary">Rp{{ $d->price }} / hour</div>
                                    <div>
                                        <h6 class="text-secondary">{{ $d->rating }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning mb-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class='d-flex justify-content-center'>
                    {{ $areas->links()}}
                </div>
            </div>

            <div class='col-3'>
                <div class="card p-4">
                    <form action="{{url('search')}}" method="GET" >
                        <div class="d-flex flex-column">
                            <label for="sortBy">
                                <h4 class="d-flex text-nowrap me-4">Sort</h4>
                            </label>

                            <select class="form-select my-3" aria-label="Default select" name="sortBy" id="sortBy" onchange="this.form.submit()">
                                <option value="1" {{app('request')->input('sortBy') == 1 ? 'selected' : ''}}>Ascending Alphabet</option>
                                <option value="2" {{app('request')->input('sortBy') == 2 ? 'selected' : ''}}>Descending Alphabet</option>
                                <option value="3" {{app('request')->input('sortBy') == 3 ? 'selected' : ''}}>Highest Price</option>
                                <option value="4" {{app('request')->input('sortBy') == 4 ? 'selected' : ''}}>Lowest Price</option>
                            </select>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <h4>Filter</h4>
                            <button style="border: none; background-color: transparent" class="p-0" type="button" onclick="clearFilter()">
                                <p class="text-danger m-0">Clear Filter</p>
                            </button>
                        </div>

                        <div class="d-none">
                           <input type="text" value="{{app('request')->input('searchArea')}}" name="searchArea">
                        </div>


                        <div class="w-100 d-flex flex-column my-2">
                            <label class="my-2">
                                <h6>Category</h6>
                            </label>
                            <div class="btn-group flex-column" role="group" aria-label="Basic checkbox toggle button group">
                                @foreach ($areaTypes as $type)
                                    <input type="checkbox" class="btn-check" name="categoryFilter[]" id="btnradio-{{$type->id}}" autocomplete="off" value="{{$type->id}}"
                                    {{app('request')->input('categoryFilter') != null && in_array($type->id, app('request')->input('categoryFilter')) ? 'checked' : ''}}>
                                    <label class="btn btn-outline-warning rounded-3 my-2 text-black" for="btnradio-{{$type->id}}">{{$type->name}}</label>
                                @endforeach

                            </div>

                        </div>

                        <div class="w-100 d-flex flex-column my-2">
                            <label class="my-2">
                                <h6>Rating</h6>
                            </label>

                            <input type="checkbox" class="btn-check" name="ratingFilter" id="btnRating" autocomplete="off" value="4" {{ app('request')->input('ratingFilter') == 4 ? 'checked' : ''}}>
                            <label class="btn btn-outline-warning rounded-3 my-2 text-black align-items-center" for="btnRating">
                                More than 4
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </label>

                        </div>

                        <div class="w-100 d-flex flex-column my-2">
                            <label class="my-2">
                                <h6>Price</h6>
                            </label>
                            <div class="d-flex flex-row w-100 rounded-3"
                                style="border-radius: .75rem; border-color: rgb(44, 44, 44); border: solid 1px">
                                <p class="my-auto px-2" style="border-right: solid 1px gray">Rp</p>
                                <input type="text" style="outline: none;" placeholder="Minimum Price"
                                    class="form-control-plaintext px-2" name="minPrice" id="minPrice" value="{{app('request')->input('minPrice')}}">
                            </div>
                            <div class="d-flex flex-row w-100 rounded-3 mt-2"
                                style="border-radius: .75rem; border-color: rgb(44, 44, 44); border: solid 1px">
                                <p class="my-auto px-2" style="border-right: solid 1px gray">Rp</p>
                                <input type="text" style="outline: none;" placeholder="Maximum Price"
                                    class="form-control-plaintext px-2" name="maxPrice" id="maxPrice" value={{app('request')->input('maxPrice')}}>
                            </div>
                        </div>
                        <button class="btn btn-danger w-100 mt-4" type="submit">Filter</button>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        function clearFilter() {
            const btns = document.getElementsByName('categoryFilter[]');
            btns.forEach((item) => {
                item.removeAttribute('checked')
            })
            document.getElementById("minPrice").value = ''
            document.getElementById("maxPrice").value = ''
        }
    </script>

@endsection
