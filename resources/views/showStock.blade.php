@extends('staffLayout')
@section('content')
<div class="row justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center" style="margin-top: 10px">
                        <h2>Board Game Stock</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-8">
<table class="table table-bordered" style="text-align: center">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Board Game Name</td>                    
                    <td>Image</td>
                    <td>Stock Quantity</td>
                </tr>
            </thead> 
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img src="{{asset('images/')}}/{{$product->image}}" alt="" width="100" class="img-fluid"></td>
                    <td>
                        <form action="{{route('updateStockQuantity')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input class="form-control" type="text" name="productQuantity" style="width: 70px; text-align: center;" autocomplete="off" required value="{{$product->quantity}}">
                        <br><button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 
</div>
</div>
@endsection
