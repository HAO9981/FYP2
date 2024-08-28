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
            <h4>07-XXX XXXX</h4>
            <h3>Email:</h3>
            <h4>XXXXX@gmail.com</h4>
            <h3>Location:</h3>
            <h4>XX, Jalan XXX, Taman XXXXX, 81300 Skudai, Johor</h4>
        </div>
        <div class="col-md-4">
            <iframe
                width="100%"
                height="300"
                frameborder="0" style="border: 2px dashed #ccc;"
                src=""
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection
