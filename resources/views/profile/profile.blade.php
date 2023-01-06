@section('title', 'Profile Page')
@extends('layout.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-body">
                    <h4 class="text-center"><img src="{{ asset('assets/profile_pictures/'.auth()->user()->profile_picture) }}" class="rounded"
                        style="width: 70px; height: 70px"></i> MY PROFILE</h4>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4><i class="fa-solid fa-circle-info mb-3"></i> Current Profile Information</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>User Name &emsp; &emsp; &nbsp: {{ $userInfo->username }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number &emsp;: {{ $userInfo->phone_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
            <div class="card-body">
                <h4><i class="fa fa-pencil-alt mb-4"></i> Edit Profile</h4>

                <form action="{{url('profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h6 class="mb-2"> New Username</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Username" id="floatingUsername" name="username" value={{ $userInfo->username}}>
                        <label for="floatingInput">&lt must be more than 5 characters &gt</label>
                    </div>
                    <h6 class="mb-2"> New Phone Number</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" id="floatingPhone" name="phone_number" value={{ $userInfo->phone_number}}>
                        <label for="floatingInput">&lt must be 6-15 digits &gt</label>
                    </div>
                    <h6 class="mb-2"> New Profile Picture</h6>
                    <div class="form-group mb-3">
                        <input type="file" name="profile_image" class="form-control">
                        <img src="{{ asset('assets/profile_pictures/'.auth()->user()->profile_picture) }}" class="rounded mt-3"
                        style="width: 70px; height: 70px">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i> Save Profile Edit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
