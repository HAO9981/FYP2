@extends('layout')
@section('content')
<div class="row justify-content-center">
    @foreach($products as $product)
    <div class="col-lg-10 col-md-12 col-sm-12" style="margin-bottom: 1cm;">
        <div class="card" style="margin-top: 10px; border: 2px solid; border-radius: 30px; display: flex; flex-direction: column; position: relative;">
        <input type="hidden" name="id" value="{{$product->id}}">
            <div class="card-body row">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <h1 class="card-title">{{$product->name}}</h1>
                    <img src="{{asset('images/')}}/{{$product->image}}" alt="" class="img-fluid" style="max-width: 100%;">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="col-md-12">
                        <h3>Type: {{$product->type}}</h3>
                        <br>
                        <h5>{{$product->description}}</h5>
                        <br>
                        <video autoplay muted controls class="img-fluid" style="width: 100%; height: auto;">
                            <source src="{{asset('videos/')}}/{{$product->video}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>s
        </div>  
    </div>
    @endforeach
</div>
@endsection
