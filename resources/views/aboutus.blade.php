@section('title','About Us')
@extends('layout.master')
@section('content')
<div class="container">
    <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 m-20 p-10 text-center">
     <img src="assets/image.png" alt="avatar">
        <h1 class="text-3xl">About Our Website </h1>
        <h3 class="text-gray-500 pb-4">SportsAnywhere</h3>
        <p class="">Together we create a useful website to make it easier for you to find
         and rent a field to exercise, we also provide various kinds of sports
         ranging from basketball, futsal, and swimming pools. Not only that,
         we will also offer attractive prices and also there are discounts for
         loyal customers. And and we will always make sure the place or field 
         that you booked is still there and always available. </p>
         <h4>Our Contact</h4>
        <div class="btn" style="background-color: #E7B447"><a href="https://twitter.com"  style="text-decoration: none;" class="text-decoration-none"><h6>Twitter</h6></a></div>
        <div class="btn" style="background-color: #E7B447"><a href="https://instagram.com" style="text-decoration: none;" class="text-decoration-none"><h6>Instagram</h6></a></div>
    </div>
</div>    
 @endsection