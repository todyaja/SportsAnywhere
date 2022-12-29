@section('title', 'SportsAnywhere')
@extends('layout.master')
@section('content')
    <div class="container d-flex flex-column">
        <h3 class="my-5">Sport Areas</h3>
        <div class="row d-flex justify-content-start">
            @foreach ($data as $d)
                <div class="col mx-auto">
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
        <div class="d-flex justify-content-start my-3"><button class="btn btn-primary">See All</button></div>
    </div>
@endsection
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
