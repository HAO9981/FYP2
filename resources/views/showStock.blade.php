@extends('staffLayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center" style="margin-top: 10px">
            <h2>Board Game Stock</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Board Game Name</th>
                        <th>Image</th>
                        <th>Stock Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{asset('images/')}}/{{$product->image}}" alt="" width="150" class="img-fluid"></td>
                        <td class="text-center">
                            <form action="{{route('updateStockQuantity')}}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input class="form-control text-center" type="text" name="productQuantity" style="width: 70px;" autocomplete="off" required value="{{$product->quantity}}">
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <button type="submit" class="btn btn-primary btn-sm mb-2">Update</button>
                                <a href="{{route('viewStock.delete', ['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Do you sure want to delete this board game?')">Delete</a>
                            </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection
