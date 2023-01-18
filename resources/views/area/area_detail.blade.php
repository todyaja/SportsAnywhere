@section('title', 'Detail Area')

@extends('layout.master')

@section('content')
    <div class="container">
        <div class="fs-3 fw-bold mt-4 mb-4">Detail Area</div>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="1"></button>
                @for ($i = 0; $i < sizeof($area->areaPictures); $i++)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $i + 1 }}" aria-current="true"
                        aria-label="{{ $i + 2 }}"></button>
                @endfor
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="bg-carousel"
                        style="background-image: url({{ asset('assets/areas_thumbnail/' . $area->thumbnail) }});">
                    </div>
                </div>
                @forelse ($area->areaPictures as $p)
                    <div class="carousel-item">
                        <div class="bg-carousel"
                            style="background-image: url({{ asset('assets/area_picture/' . $p->pictures) }});">
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        @auth
            @if (auth()->user()->role == '0')
                <div class="mt-3 d-flex pr-5 justify-content-end">
                    <a href="/areaBookingPage/{{ $area->id }}" class="btn btn-outline-primary me-2 mb-2 ">Book Now !</a>
                </div>
            @endif
        @endauth
        <div class="mt-3">
            <div class="accordion bg-1F1F1F" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            <strong>Area Name</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            {{ $area->name }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            <strong>Area Type</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            {{ $area->areaType->name }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            <strong>Description</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            {{ $area->description }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFour">
                            <strong>Address</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            {{ $area->address }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFive">
                            <strong>Service Time</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body">
                            {{ $area->open_time . ' - ' . $area->close_time }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseSix">
                            <strong>Price</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingSix">
                        <div class="accordion-body">
                            {{ 'Rp' . $area->price . ' / Hour' }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseSeven">
                            <strong>Contact</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingSeven">
                        <div class="accordion-body">
                            {{ 'Username: ' . $area->user->username }}
                            </br>{{ 'Phone: ' . $area->user->phone_number }}</br>
                            <div class="mt-3 d-flex justify-content-start">
                                <a href="https://wa.me/62{{ substr($area->user->phone_number, 1) }}" target="_blank"
                                    class="btn btn-outline-success me-2 mb-2 ">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseEight">
                            <strong>Review</strong>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingEight">
                        <div class="accordion-body">
                            @forelse ($area->areaRatings as $r)
                                <div class="card review-card mb-4 border-0 shadow">
                                    <div class="card-header border-0">
                                        {{ $r->user->username . '  ' }}
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= (int) $r->rating)
                                                <i class="bi bi-star-fill text-warning"></i>
                                                @continue
                                            @endif
                                            <i class="bi bi-star text-warning"></i>
                                        @endfor
                                    </div>
                                    <div class="card-body border-0">
                                        <p class="card-text">
                                            {{ $r->review }}
                                        </p>
                                    </div>
                                    <div class="card-footer border-0 w-100 d-flex justify-content-end">
                                        <div class="text-secondary">{{ date_format($r->created_at, 'd-m-Y') }}</div>
                                    </div>
                                </div>
                            @empty
                                No Review Yet
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
