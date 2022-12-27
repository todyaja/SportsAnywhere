@section('title', 'Register')
@extends('layout.master')
@section('content')

<style>
    .inner-row{
        height: 700px;
    }
    .form-box{
        background-color: #EB704D;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

</style>

<div class="container">
    <div class="row justify-content-center align-items-center inner-row">
        <div class="col-md-5">
            <div class="form-box w-100 p-4 d-flex flex-column justify-content-center mt-2 mb-2 rounded">

                <div class="form-title">
                    <h2 class="fw-2 mb-4" style="color: white">Register</h2>
                </div>

                <form action="{{url('registeruser')}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <select class="w-100" name="role" id="">
                            <option name="role" value="0">Register as Guest</option>
                            <option name="role" value="1">Register as Host</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Username" id="floatingUsername" name="username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm" placeholder="Email" id="floatingEmail" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" id="floatingPhone" name="phone_number">
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-sm" placeholder="Password" id="floatingPassword" name="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-sm" placeholder="Confirm Password" id="floatingConfirm" name="confirm_password">
                        <label for="floatingInput">Confirm Password</label>
                    </div>

                    @if ($errors->any())
                        <span class="text-danger" style="background-color: white">{{$errors->first()}}</span>
                    @endif

                    <div class="regisBtn mt-3">
                        <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                </form>

                <div class="loginLink mt-2 d-flex justify-content-center">
                    <span>Already have an account?</span>
                    <a href="/login"><button class="p-0 border-0 bg-transparent text-decoration-underline" style="color: blue">Sign In</button></a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
