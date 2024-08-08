@extends('layout')
@section('content')
<div class="row justify-content-center">
    @foreach($products as $product)
    <div class="col-md-11" style="margin-bottom: 1cm;">
        <div class="card" style="margin-top: 10px; border: 2px solid; border-radius: 30px; display: flex; flex-direction: column; position: relative;">
            <div class="card-body row">
                <div class="col-md-4 text-center">
                    <h1 class="card-title">{{$product->name}}</h1>
                    <img src="{{asset('images/')}}/{{$product->image}}" alt="" width="300" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <h3>Type: {{$product->type}}</h3>
                        <br>
                        <h5>{{$product->description}}</h5>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @endforeach
</div>
@endsection
