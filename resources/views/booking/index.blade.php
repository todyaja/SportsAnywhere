@section('title', 'Bookings')
@extends('layout.master')
@section('content')
    <div class="container d-flex flex-column py-4">
        <h2>Bookings</h2>
        <div class="accordion border mt-4 p-0" id="accordion">
            <div id="ongoingBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingOngoing">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOngoing" aria-expanded="true" aria-controls="collapseOngoing">
                        Ongoing
                    </button>
                </h4>
                <div class="accordion-collapse collapse show" id="collapseOngoing" aria-labelledby="headingOngoing">
                    <div class="accordion-body d-flex flex-row overflow-auto w-100">
                        @if ($bookings->get('ongoing'))
                            @foreach ($bookings->get('ongoing') as $ongoing)
                                <a href="{{ url('') }}" style="text-decoration: none" class="me-2">
                                    <div class="card my-2" style="width: 18rem; height: 28rem">
                                        <img class="card-img-top" style="width: 100%; height: 200px" class="card-img-top"
                                            src="{{ asset('assets/areas_thumbnail/' . $ongoing->thumbnail) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h6 class="card-text">{{ Str::limit($ongoing->name, 20) }}</h6>
                                            <h6 class="card-text text-secondary my-2">{{ Str::limit($ongoing->address, 50) }}</h6>
                                            <div class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                <p class="text-info border border-primar py-1 px-2 rounded-3">{{ date('D, d M Y H:i e',
                                                strtotime($ongoing->start_date)) }}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                                </svg>
                                                <p class="text-info border border-primar py-1 px-2 rounded-3 mt-2">{{ date('D, d M Y H:i e',
                                                strtotime($ongoing->end_date)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class='text-secondary mt-3'>There are no ongoing bookings</p>
                        @endif

                    </div>

                </div>
            </div>

            <div id="UpcomingBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingUpcoming">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUpcoming" aria-expanded="false" aria-controls="collapseUpcoming">
                    Upcoming
                    </button>
                </h4>
                <div class="accordion-collapse collapse" id="collapseUpcoming"aria-labelledby="headingUpcoming">
                    <div class="accordion-body d-flex flex-row overflow-auto w-100">
                        @if ($bookings->get('upcoming'))
                            @foreach ($bookings->get('upcoming') as $upcoming)
                                <a href="{{ url('') }}" style="text-decoration: none" class="me-3">
                                    <div class="card my-2" style="width: 18rem; height: 28rem">
                                        <img class="card-img-top" style="width: 100%; height: 200px" class="card-img-top"
                                            src="{{ asset('assets/areas_thumbnail/' . $upcoming->thumbnail) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h6 class="card-text">{{ Str::limit($upcoming->name, 20) }}</h6>
                                            <h6 class="card-text text-secondary my-2">{{ Str::limit($upcoming->address, 50) }}</h6>
                                            <div class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                <p class="text-info border border-primar py-1 px-2 rounded-3">{{ date('D, d M Y H:i e',
                                                strtotime($upcoming->start_date)) }}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                                </svg>
                                                <p class="text-info border border-primar py-1 px-2 rounded-3 mt-2">{{ date('D, d M Y H:i e',
                                                strtotime($upcoming->end_date)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class='text-secondary mt-3'>There are no upcoming bookings</p>
                        @endif

                    </div>
                </div>
            </div>

            <div id="completedBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingCompleted">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCompleted" aria-expanded="false" aria-controls="collapseCompleted">
                    Completed
                    </button>
                </h4>
                <div class="accordion-collapse collapse" id="collapseCompleted"aria-labelledby="headingCompleted">
                    <div class="accordion-body d-flex flex-row overflow-auto w-100">
                        @if ($bookings->get('completed'))
                            @foreach ($bookings->get('completed') as $completed)
                                <a href="{{ url('') }}" style="text-decoration: none" class="me-3">
                                    <div class="card my-2" style="width: 18rem; height: 28rem">
                                        <img class="card-img-top" style="width: 100%; height: 200px" class="card-img-top"
                                            src="{{ asset('assets/areas_thumbnail/' . $completed->thumbnail) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h6 class="card-text">{{ Str::limit($completed->name, 20) }}</h6>
                                            <h6 class="card-text text-secondary my-2">{{ Str::limit($completed->address, 50) }}</h6>
                                            <div class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                <p class="text-info border border-primar py-1 px-2 rounded-3">{{ date('D, d M Y H:i e',
                                                strtotime($completed->start_date)) }}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                                </svg>
                                                <p class="text-info border border-primar py-1 px-2 rounded-3 mt-2">{{ date('D, d M Y H:i e',
                                                strtotime($completed->end_date)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class='text-secondary mt-3'>There are no completed bookings</p>
                        @endif

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
