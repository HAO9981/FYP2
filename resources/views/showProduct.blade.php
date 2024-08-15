@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: 10px; margin-bottom: 10px; text-align: right">
                <form class="form-inline d-flex justify-content-end" method="POST" action="{{route('searchProduct')}}">
                    @csrf
                    <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search" name="searchProduct">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@foreach($products as $product)
<div class="col-md-3 col-sm-6 col-12 mb-4">
    <div class="card h-100" style="margin-top: 10px; border-radius: 30px;">
        <div class="card-body text-center">
            <a href="{{route('showProductDetail',['id'=>$product->id])}}">
                <h3 class="card-title">{{$product->name}}</h3>
                <img src="{{asset('images/')}}/{{$product->image}}" alt="{{$product->name}}" class="img-fluid" style="max-width: 100%; height: auto;"> <!-- 修改了这里 -->
            </a>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
