@extends('layout')
@section('content')
<div class="row justify-content-center">
@foreach($products as $product)
<div class="col-md-3" style="margin-bottom: 1cm;">
<div class="card" style="margin-top: 10px; border-radius: 30px; height: 350px; width: 300px;">
    <div class="card-body">
        <a href="{{route('showProductDetail',['id'=>$product->id])}}">
        <div style="text-align: center"><h3 class="card-title">{{$product->name}}</h3>
            <img src="{{asset('images/')}}/{{$product->image}}" alt="" width="200" class="img-fluid">
        </div>
        </a>
    </div>
</div>  
</div>
@endforeach
</div>
@endsection