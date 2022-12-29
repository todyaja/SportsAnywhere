@section('title', 'Search Page')
@extends('layout.master')
@section('content')
    <div class="container d-flex flex-column">
        <h1 class="mt-4">Sport Areas</h1>
        <div>
            @if (app('request')->input('searchArea') != '')
                <h2 class="fs-4 my-3">Show result for "{{ app('request')->input('searchArea') }}"</h2>
            @endif
            {{-- <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Regular link</a></li>
                <li><a class="dropdown-item active" href="#" aria-current="true">Active link</a></li>
                <li><a class="dropdown-item" href="#">Another link</a></li>
            </ul> --}}
        </div>
        <div class='row d-flex'>
            <div class="row d-flex justify-content-start col-9">
                @foreach ($areas as $d)
                    <div class="col-4">
                        <a href="{{ url('area/' . $d->id) }}" style="text-decoration: none">
                            <div class="card my-2" style="width: 18rem; height: 30rem">
                                <img src="{{ asset('assets/areas_thumbnail/' . $d->thumbnail) }}"
                                    style="width: 100%; height: 200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="my-2">{{ $d->name }}</h6>
                                    <p class="card-text text-black">{{ Str::limit($d->description, 100) }}</p>
                                    <h6 class="text-secondary">{{ Str::limit($d->address, 40) }}</h6>
                                </div>
                                <div class="card-footer bg-transparent">Rp{{ $d->price }} / hour</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class='col-3 ms-4' >
                <div class="card p-4">
                    <form action="{{url('search')}}" method="GET">
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
                                    <label class="btn btn-outline-danger rounded-3 my-2" for="btnradio-{{$type->id}}">{{$type->name}}</label>
                                @endforeach

                            </div>

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
