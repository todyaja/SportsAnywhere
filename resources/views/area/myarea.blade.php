@section('title', 'Detail Area')
@extends('layout.master')
@section('content')
    <div class="container">
        <h3 class="mt-5">My Area</h3>
        <a href="/area/create"><button class="btn btn-warning my-2">Add Area</button></a>

        @foreach ($data as $d)
            <div class="card my-2">
                <div class="card-body">
                    <div class="d-flex w-100 flex-row m-auto">
                        <div class="">
                            <img src="{{ asset('assets/areas_thumbnail/' . $d->thumbnail) }}"
                                style="width: 270px; height: 200px" class="card-img-top" alt="...">
                        </div>
                        <div class="d-flex flex-column w-100 d-flex align-items-center">
                            <h2 class="">{{ $d->name }}</h2>
                            <div class="d-flex flex-column w-100 d-flex mt-2 align-items-start px-5">
                                <p>{{ $d->description }}</p>
                                <p class="text-secondary">{{ $d->address }}</p>
                                <div class="flex-row">
                                    <a href="{{ url('areaPage/' . $d->id) }}" style="text-decoration: none"><button
                                            class="btn btn-warning">Detail</button></a>
                                    <button data-bs-toggle="modal" data-bs-target={{ '#deleteAreaForm' . $d->id }}
                                        class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id={{ 'deleteAreaForm' . $d->id }} tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ url('area/' . $d->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div class="modal-header border-0">
                                        <h5 class="text-secondary modal-title" id="exampleModalLabel">Delete Area</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div
                                        class="modal-body d-flex justify-content-center align-items-center border-0 flex-column">
                                        <h2 class="my-2">Are you sure?</h2>
                                        <h6 class="text-center my-2 text-secondary">Do you want to delete
                                            <b>{{ $d->name }}</b>? This process cannot
                                            be undone.
                                        </h6>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class='d-flex justify-content-center'>
            {{ $data->links()}}
        </div>
    </div>

@endsection
