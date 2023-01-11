@section('title', 'Bookings')
@extends('layout.master')
@section('content')
    <div class="container d-flex flex-column py-4">
        <h2>Bookings</h2>
        <div class="accordion border mt-4" id="accordion">
            <div id="ongoingBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingOngoing">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOngoing"
                        aria-expanded="true" aria-controls="collapseOngoing">
                        Ongoing
                    </button>
                </h4>
                <div class="accordion-collapse collapse show" id="collapseOngoing" aria-labelledby="headingOngoing">
                    <div class="accordion-body">
                        @if ($bookings->get('ongoing'))
                            <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                                @foreach ($bookings->get('ongoing') as $ongoing)
                                    <div class="col">
                                        <a href="{{ url('areaPage/' . $ongoing->area_id) }}" style="text-decoration: none"
                                            class="me-2">
                                            <div class="card my-2" style="width: 18rem;">
                                                <img class="card-img-top" style="width: 100%; height: 200px"
                                                    class="card-img-top"
                                                    src="{{ asset('assets/areas_thumbnail/' . $ongoing->thumbnail) }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h6 class="card-text">{{ Str::limit($ongoing->name, 20) }}</h6>
                                                    <h6 class="card-text text-secondary my-2">
                                                        {{ Str::limit($ongoing->address, 40) }}</h6>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                        <p class="text-info border py-1 px-2 rounded-3 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($ongoing->start_date)) }}
                                                        </p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-arrow-down"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                        </svg>
                                                        <p class="text-info border py-1 px-2 rounded-3 mt-2 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($ongoing->end_date)) }}
                                                        </p>

                                                        @if (auth()->user()->role == 1)
                                                            <p class="text-secondary">
                                                                Booked by: {{ $ongoing->username }}
                                                            </p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class='text-secondary mt-3'>There are no ongoing bookings</p>
                        @endif
                    </div>
                </div>
            </div>

            <div id="upcomingBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingUpcoming">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseUpcoming" aria-expanded="false" aria-controls="collapseUpcoming">
                        Upcoming
                    </button>
                </h4>
                <div class="accordion-collapse collapse" id="collapseUpcoming" aria-labelledby="headingUpcoming">
                    <div class="accordion-body">
                        @if ($bookings->get('upcoming'))
                            <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                                @foreach ($bookings->get('upcoming') as $upcoming)
                                    <div class="col">
                                        <a href="{{ url('areaPage/' . $upcoming->area_id) }}" style="text-decoration: none">
                                            <div class="card my-2 pb-3">
                                                <img class="card-img-top" style="width: 100%; height: 200px"
                                                    class="card-img-top"
                                                    src="{{ asset('assets/areas_thumbnail/' . $upcoming->thumbnail) }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h6 class="card-text">{{ Str::limit($upcoming->name, 20) }}</h6>
                                                    <h6 class="card-text text-secondary my-2">
                                                        {{ Str::limit($upcoming->address, 40) }}</h6>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                        <p class="text-info border py-1 px-2 rounded-3 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($upcoming->start_date)) }}
                                                        </p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-arrow-down"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                        </svg>
                                                        <p class="text-info border py-1 px-2 rounded-3 mt-2 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($upcoming->end_date)) }}
                                                        </p>
                                                        @if (auth()->user()->role == 1)
                                                            <p class="text-secondary">
                                                                Booked by: {{ $ongoing->username }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <a data-bs-toggle="modal" data-bs-target="#deleteBooking" role="button"
                                                    class="btn btn-danger rounded align-self-end cancel-booking-button me-3"
                                                    data-status-link="{{ url('bookings/' . $upcoming->booking_id) }}"
                                                    style="margin-top: -20px">Cancel</a>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class='text-secondary mt-3'>There are no upcoming bookings</p>
                        @endif
                    </div>
                </div>
            </div>

            <div id="completedBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingCompleted">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseCompleted" aria-expanded="false" aria-controls="collapseCompleted">
                        Completed
                    </button>
                </h4>
                <div class="accordion-collapse collapse show" id="collapseCompleted"aria-labelledby="headingCompleted">
                    <div class="accordion-body">
                        @if ($bookings->get('completed'))
                            <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                                @foreach ($bookings->get('completed') as $completed)
                                    <div class="col">
                                        <a href="{{ url('areaPage/' . $completed->area_id) }}"
                                            style="text-decoration: none">
                                            <div class="card my-2 pb-3">
                                                <img class="card-img-top" style="width: 100%; height: 200px"
                                                    class="card-img-top"
                                                    src="{{ asset('assets/areas_thumbnail/' . $completed->thumbnail) }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h6 class="card-text">{{ Str::limit($completed->name, 20) }}</h6>
                                                    <h6 class="card-text text-secondary my-2">
                                                        {{ Str::limit($completed->address, 40) }}</h6>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                        <p class="text-info border py-1 px-2 rounded-3 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($completed->start_date)) }}
                                                        </p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-arrow-down"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                        </svg>
                                                        <p class="text-info border py-1 px-2 rounded-3 mt-2 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($completed->end_date)) }}
                                                        </p>
                                                        @if (auth()->user()->role == 1)
                                                            <p class="text-secondary">
                                                                Booked by: {{ $ongoing->username }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center w-100 px-2">
                                                    @if (auth()->user()->role == 0 && !$completed->rating)
                                                        <a class="w-100"
                                                            href="{{ url('createRating/' . $completed->booking_id) }}">
                                                            <button class="btn btn-warning w-100">{{ 'Rate' }}
                                                            </button>
                                                        </a>
                                                    @else
                                                        <div class="mb-4 pb-3"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class='text-secondary mt-3'>There are no completed bookings</p>
                        @endif
                    </div>
                </div>
            </div>

            <div id="cancelledBookings" class="accordion-item">
                <h4 class="accordion-header" id="headingCompleted">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseCancelled" aria-expanded="false" aria-controls="collapseCancelled">
                        Cancelled
                    </button>
                </h4>
                <div class="accordion-collapse collapse" id="collapseCancelled"aria-labelledby="headingCancelled">
                    <div class="accordion-body">
                        @if ($bookings->get('cancelled'))
                            <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                                @foreach ($bookings->get('cancelled') as $cancelled)
                                    <div class="col">
                                        <a href="{{ url('areaPage/' . $cancelled->area_id) }}"
                                            style="text-decoration: none" class="me-3">
                                            <div class="card my-2">
                                                <img class="card-img-top" style="width: 100%; height: 200px"
                                                    class="card-img-top"
                                                    src="{{ asset('assets/areas_thumbnail/' . $cancelled->thumbnail) }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h6 class="card-text">{{ Str::limit($cancelled->name, 20) }}</h6>
                                                    <h6 class="card-text text-secondary my-2">
                                                        {{ Str::limit($cancelled->address, 40) }}</h6>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column mt-4">
                                                        <p class="text-info border py-1 px-2 rounded-3 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($cancelled->start_date)) }}
                                                        </p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-arrow-down"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                        </svg>
                                                        <p class="text-info border py-1 px-2 rounded-3 mt-2 fw-light">
                                                            {{ date('D, d M Y H:i', strtotime($cancelled->end_date)) }}
                                                        </p>
                                                        @if (auth()->user()->role == 1)
                                                            <p class="text-secondary">
                                                                Booked by: {{ $ongoing->username }}
                                                            </p>
                                                        @endif

                                                        <p
                                                            class="text-white bg-danger border py-1 w-100 text-center rounded-3">
                                                            Cancelled</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class='text-secondary mt-3'>There are no cancelled bookings</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteBooking" tabindex="-1" aria-labelledby="deleteBookingLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" id="cancelBookingForm" action="">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header border-0">
                            <h5 class="text-secondary modal-title" id="deleteBookingLabel">Cancel Booking</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-center align-items-center border-0 flex-column">
                            <h2 class="my-2">Are you sure?</h2>
                            <h6 class="text-center my-2 text-secondary">Do you want to cancel this booking? This
                                process
                                cannot
                                be undone.</h6>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        const buttons = document.getElementsByClassName('cancel-booking-button');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', onClick, false);
        }

        function onClick(event) {
            document.getElementById("cancelBookingForm").setAttribute('action', this.getAttribute('data-status-link'))
            console.log(document.getElementById("cancelBookingForm").getAttribute("action"))
        }
    </script>
@endsection
