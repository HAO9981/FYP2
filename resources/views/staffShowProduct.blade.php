@extends('staffLayout')
@section('content')
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center" style="margin-top: 10px">
                        <h2>View Board Game List</h2>
                    </div>
                    <div class="col-md-3 text-right" style="margin-top: 10px">
                        <a href="{{route('addProduct')}}" class="btn btn-success">Add New Board Game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($products as $product)
    <div class="col-md-11" style="margin-bottom: 1cm;">
        <div class="card" style="margin-top: 10px; border: 2px solid; border-radius: 30px; display: flex; flex-direction: column; position: relative;">
            <div class="card-body row">
                <div class="col-md-4 text-center">
                    <h1 class="card-title">{{$product->name}}</h1>
                    <img src="{{asset('images/')}}/{{$product->image}}" alt="" width="400" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <h3>Type: {{$product->type}}</h3>
                        <br>
                        <h5>{{$product->description}}</h5>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="text-align: right; position: absolute; bottom: 0; right: 0;">
                <a href="{{route('editProduct',['id'=>$product->id])}}" class="btn btn-warning">Edit</a>&nbsp;
                <a href="{{route('viewProduct.delete', ['id'=>$product->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
            </div>
        </div>  
    </div>
    @endforeach
</div>
@endsection
