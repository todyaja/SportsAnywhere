@section('title', 'Area Booking')

@extends('layout.master')

@section('content')
    <div class="container">
        <div class="mt-4 d-flex justify-content-center align-items-center">
            <div class="card w-1000 text-center">
                <div class="card-body shadow">
                    <div class="fs-3 fw-bold mb-3">Booking Area</div>
                    <form method="get" action="/areaBookingPage/{{ request('areaId') }}">
                        @csrf
                        <div class="mb-0">
                            <label for="bookingDate" class="form-label d-flex justify-content-start">Booking Date</label>
                            <input type="date" class="form-control" id="bookingDate" required name="bookingDate"
                                min="{{ date('Y-m-d') }}" value="{{ old('bookingDate', request('bookingDate')) }}">
                            <p class="d-flex justify-content-start text-danger">
                                *Please choose your booking date first
                            </p>
                        </div>
                        @if ($isBookingDateEmpty && $errors->any())
                            <span class="text-danger">{{ $errors->first() }}</span>
                        @endif
                        <div class="d-grid mb-3 mt-0">
                            <button type="submit" name="bookDateButton" class="btn btn-primary">Choose Booking
                                Date</button>
                        </div>
                    </form>
                    @if (sizeof($booking) > 0)
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Customer Info</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($booking as $b)
                                    <tr>
                                        <th scope="row">Booking#{{ $b->booking_id }}</th>
                                        <td>{{ $b->User->username }} </td>
                                        <td>{{ date('d F, Y', strtotime($b->start_date)) }} </br>
                                            {{ date('l, H:i:s', strtotime($b->start_date)) }}
                                        </td>
                                        <td>{{ date('d F, Y', strtotime($b->end_date)) }} </br>
                                            {{ date('l, H:i:s', strtotime($b->end_date)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-start">
                            *Table of Booking Calendar
                        </div>
                    @elseif (!$isBookingDateEmpty)
                        <div class="bg-warning p-2 mt-3 mb-1">The area is available all day on that date
                        </div>
                    @endif

                    <form method="post" action="/createBooking">
                        @csrf
                        <input class="form-control me-2" type="hidden" name="areaId" value="{{ request('areaId') }}">
                        <input class="form-control me-2" type="hidden" name="bookingDate"
                            value="{{ request('bookingDate') }}">
                        <div class="row mt-0 mb-3 mt-3">
                            <div class="col-md-6">
                                <label for="bookStart" class="form-label d-flex justify-content-start">Booking Start
                                    Time</label>
                                <select required class="form-select" name="bookStart" id="bookStart">
                                    <option value="" selected>Choose...</option>
                                    @for ($i = (int) explode(':', $area->open_time)[0]; $i <= (int) explode(':', $area->close_time)[0]; $i++)
                                        <option value="{{ sprintf('%02d', $i) }}">
                                            {{ sprintf('%02d', $i) . ':00' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="bookEnd" class="form-label d-flex justify-content-start">Booking End
                                    Time</label>
                                <select required class="form-select" name="bookEnd" id="bookEnd">
                                    <option value="" selected>Choose...</option>
                                    @for ($i = (int) explode(':', $area->open_time)[0]; $i <= (int) explode(':', $area->close_time)[0]; $i++)
                                        <option value="{{ sprintf('%02d', $i) }}">
                                            {{ sprintf('%02d', $i) . ':00' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        @if (!$isBookingDateEmpty && $errors->any())
                            <span class="text-danger">{{ $errors->first() }}</span>
                        @endif
                        <div class="d-grid mb-1">
                            <button type="submit" name="signup" class="btn btn-primary">Add Booking</button>
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
