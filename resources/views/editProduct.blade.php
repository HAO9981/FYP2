@extends('staffLayout')
@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <h3>Edit Board Game</h3>
    </div>
</div>
<div class='row col-md-11'>
    <div class="col-md-5 text-center">
        @foreach($products as $product)
        <img src="{{asset('images')}}/{{$product->image}}" alt="" width="350" class="img-fluid">
        <br><br>
        <video muted controls class="img-fluid" style="width: 100%; height: auto;">
            <source src="{{asset('videos/')}}/{{$product->video}}" type="video/mp4">
        </video>
        @endforeach
    </div>
    <div class="col-md-7">
        <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($products as $product)
            <div class="form-group">
                <label for="productName">Board Game Name</label>
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="productQuantity" value="{{$product->quantity}}">
                <input class="form-control" type="text" id="productName" name="productName" required value="{{$product->name}}"> 
            </div>
            <div class="form-group">
                <label for="productType">Board Game Type</label>
                <select name="productType" id="productType" class="form-control" required value="{{$product->type}}">
                <option value="{{$product->type}}">{{$product->type}}</option>
                <option value="Card Game">Card Game</option>
                <option value="Party Game">Party Game</option>
                <option value="Chess Game">Chess Game</option>
                <option value="Strategy Game">Strategy Game</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productDescription">Board Game Description</label>
                <textarea class="form-control" type="text" id="productDescription" name="productDescription" rows="5" required>{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="productImage">Board Game Image</label>
                <input class="form-control" type="file" id="productImage" name="productImage">
            </div>
            <div class="form-group">
                <label for="productVideo">Board Game Introduction Video</label>
                <input class="form-control" type="file" id="productVideo" name="productVideo">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach         
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection