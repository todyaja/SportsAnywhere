@section('title', 'SportsAnywhere')
@extends('layout.master')
@section('content')
    <div style="height: 90%; width: 100%; background:url('{{ asset('assets/home_page_background.jpeg') }}'); height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"
        class="d-flex flex-column justify-content-center align-item-center">
        <div style="height: 100%; width: 100%"
            class="bg-dark d-flex bg-opacity-50 flex-column justify-content-center align-items-center">
            <h1 class="text-white pb-5">Sports Area</h1>
            <h3 class="text-white py-5">for your daily sport needs</h3>

            <a href="/about"><button class="btn btn-warning p-3"><h4>Learn More<h4></button></a>
        </div>
    </div> 
    <div class="container d-flex flex-column">
        <h3 class="my-5">Sport Areas</h3>
        <div class="row d-flex justify-content-start">
            @foreach ($data as $d)
                <div class="col mx-auto">
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
                                Rp{{ $d->price }} / hour
                                <div>
                                    {{ $d->rating }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-start my-3"><a href="/search"><button class="btn btn-primary">More</button></a>
        </div>
    </div>
@endsection
