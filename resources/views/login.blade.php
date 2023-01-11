@section('title', 'Login')
@extends('layout.master')
@section('content')

    <style>
        .inner-row {
            height: 628px;
        }

        .form-box {
            background-color: #EB704D;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
    </style>

    <div class="container">
        <div class="row justify-content-center align-items-center inner-row">
            <div class="col-md-5">
                <div class="form-box w-100 p-4 d-flex flex-column justify-content-center rounded">

                    <div class="form-title">
                        <h2 class="fw-2 mb-5" style="color: white">Login</h2>
                    </div>

                    <form action="{{ url('loginprocess') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-sm" placeholder="Email"
                                id="floatingInput" name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-sm" placeholder="Password"
                                id="floatingPassword" name="password">
                            <label for="floatingInput">Password</label>
                        </div>
                        @if ($errors->any())
                            <span
                                class="bg-danger text-white w-100 d-flex justify-content-center">{{ $errors->first() }}</span>
                        @endif
                        <div class="mt-3">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                    </form>

                    <div class="mt-3 d-flex justify-content-center">
                        <span>Don't have account?</span>
                        <a href="/register"><button class="p-0 border-0 bg-transparent text-decoration-underline"
                                style="color: blue">Sign Up</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
