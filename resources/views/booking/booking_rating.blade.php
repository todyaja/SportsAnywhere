@section('title', 'Rating')
@extends('layout.master')
@section('content')
    <style>
        .rate {
            float: left;
            height: 64px;
            padding: 0 0px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #f6ff00;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #ffd437;
        }
    </style>
    <div class="container">
        <h3 class="my-5">Sport Areas</h3>
        <div class="d-flex justify-content-center align-items-center flex-column py-5"
            style="background-color: rgb(232, 232, 232)">
            <h3><b>Give us your thoughts about {{ $area->name }} !</b></h3>
            <form action={{url("/postRating")}} method="post">
                @csrf
                <div class="d-flex flex-column w-100 justify-content-center align-items-center">
                    <input type="hidden" name="bookingId" value="{{request()->route()->bookingId}}">
                    <div class="rate">
                        <input checked type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <textarea placeholder="Describe your rate here..." name="description" rows="4" cols="70" style="border: none;
                    outline: none;" class="mb-5"></textarea>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
