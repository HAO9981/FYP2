@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="margin: 0; padding: 0;">
            <img src="{{asset('image/Board Game Cafe.jpg')}}" alt="" style="width: 100%; height: 500px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 15px; background-color: black ; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center;">
            <img src="{{asset('image/Board Game Logo.png')}}" alt="" style="max-width: 100%; max-height: 210px; margin: 0; padding: 0;">
            <h2>STL</h2><h2>Board Game Cafe</h2>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <a href="{{route('showProduct')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Library.jpg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want to play board game? Let's see our Board Game Library!</h4>
            </div>
        </a>
        <a href="{{route('showTable')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Table.jpeg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want to book? Let's book now!</h4>
            </div>
        </a>
        <a href="{{route('menu')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Menu.jpeg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want enjoy food? Let's see our menu!</h4>
            </div>
        </a>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
            <h3>Phone Number:</h3>
            <h4>07-558 6605</h4>
            <h3>Email:</h3>
            <h4>southern@sc.edu.my</h4>
            <h3>Location:</h3>
            <h4>PTD 64888, Jalan Selatan Utama, KM 15, Off, Skudai Lbh, 81300 Skudai, Johor</h4>
        </div>
        <div class="col-md-4">
            <iframe
                width="100%"
                height="300"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.3891161303563!2d103.67928727371631!3d1.533632060960169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da73c109632e0b%3A0x74cda51bf210c304!2z5Y2X5pa55aSn5a2m5a2m6Zmi!5e0!3m2!1szh-CN!2smy!4v1704959981142!5m2!1szh-CN!2smy"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection
