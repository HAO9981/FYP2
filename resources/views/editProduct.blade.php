@extends('staffLayout')
@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <h3>Edit Product</h3>
    </div>
</div>
<div class='row col-md-11'>
    <div class="col-md-5 text-center">
        @foreach($products as $product)
        <img src="{{asset('images')}}/{{$product->image}}" alt="" width="350" class="img-fluid">
        @endforeach
    </div>
    <div class="col-md-7">
        <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($products as $product)
            <div class="form-group">
                <label for="productName">Name</label>
                <input type="hidden" name="id" value="{{$product->id}}">
                <input class="form-control" type="text" id="productName" name="productName" required value="{{$product->name}}"> 
            </div>
            <div class="form-group">
                <label for="productType">Type</label>
                <select name="productType" id="productType" class="form-control" required value="{{$product->type}}">
                <option value="disabled selected">{{$product->type}}</option>
                <option value="card game">card game</option>
                <option value="party game">party game</option>
                <option value="chess game">chess game</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" type="text" id="productDescription" name="productDescription" rows="5" required>{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="productImage">Image</label>
                <input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach         
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection