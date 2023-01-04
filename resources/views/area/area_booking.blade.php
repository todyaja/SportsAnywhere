@section('title', 'Area Booking')

@extends('layout.master')

@section('content')
    <div class="mt-3 d-flex justify-content-center align-items-center">
        <div class="card w-1000 text-center">
            <div class="card-body shadow">
                <div class="fs-3 fw-bold mb-3">Booking Area</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Booking ID</th>
                            <th scope="col">Customer Info</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($booking as $b)
                            <tr>
                                <th scope="row">Booking #{{ $b->booking_id }}</th>
                                <td>{{ $b->User->username }} </br> {{ $b->User->email }}</td>
                                <td>{{ date('Y/m/d H:i:s', strtotime($b->start_date)) }}</td>
                                <td>{{ date('Y/m/d H:i:s', strtotime($b->end_time)) }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                    @if (count($booking) == 0)
                        <div class="d-flex justify-content-start align-item-end">
                            *Table of Booking Calendar
                        </div>
                    @endif
                </table>

                <form method="post" action="/insertUser">
                    @csrf
                    <fieldset Enable>
                        <div class="mb-3 pt-3">
                            <label for="bookStart" class="form-label d-flex justify-content-start">Start
                                Time</label>
                            <input class="w-100" type="datetime-local" id="bookStart" name="bookStart"
                                min="{{ date('Y-m-d H:i:s') }}" max="" required>
                        </div>
                        <div class="mb-4">
                            <label for="bookEnd" class="form-label d-flex justify-content-start">End
                                Time</label>
                            <input class="w-100" type="datetime-local" id="bookEnd" name="bookEnd"
                                min="{{ date('Y-m-d H:i:s') }}" max="" required>
                        </div>
                        @if ($errors->any())
                            <span class="text-danger">{{ $errors->first() }}</span>
                        @endif
                        <div class="d-grid mb-1">
                            <button type="submit" name="signup" class="btn btn-danger">Add Booking</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
