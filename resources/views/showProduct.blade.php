@extends('layout')
@section('content')
<div class="row justify-content-center">
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
