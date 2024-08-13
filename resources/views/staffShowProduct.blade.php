@extends('staffLayout')
@section('content')
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center" style="margin-top: 10px">
                        <h2>Board Game Library</h2>
                    </div>
                    <div class="col-md-3 text-right" style="margin-top: 10px; margin-bottom: 10px">
                        <a href="{{route('addProduct')}}" class="btn btn-success">Add Board Game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@foreach($products as $product)
<div class="col-md-3 col-sm-6 col-12 mb-4">
<div class="card h-100" style="border-radius: 30px;">
    <div class="card-body text-center">
        <a href="{{route('staffProductDetail',['id'=>$product->id])}}">
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
