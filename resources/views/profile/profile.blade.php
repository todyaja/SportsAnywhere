@section('title', 'Profile Page')
@extends('layout.master')
@section('content')

<div class="container">
    <div class="row">
        Ini profile
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-user"></i> My Profile</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td width="10">:</td>
                                <td>{{ $userInfo->email}}</td>
                                {{-- <td>placeholderd </td> --}}

                            </tr>
                            <tr>
                                <td>UserName</td>
                                <td width="10">:</td>
                                <td>{{ $userInfo->username }}</td>
                                {{-- <td>placeholderd</td> --}}
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td width="10">:</td>
                                <td>{{ $userInfo->phone }}</td>
                                {{-- <td>placeholderd</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
tes
</div>

@endsection
