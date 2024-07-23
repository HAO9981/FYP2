@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Board Game Info</h3>
        <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($products as $product)
            <div class="form-group">
                <img src="{{asset('images')}}/{{$product->image}}" alt="" width="100" class="img-fluid"><br>
            <label for="productName">Name</label>
            <input type="hidden" name="id" value="{{$product->id}}">
            <input class="form-control" type="text" id="productName" name="productName" required value="{{$product->name}}"> 
            <div class="form-group">
			<label for="productType">Type</label>
			<input class="form-control" type="text" id="productType" name="productType" required value="{{$product->type}}">
            </div>
            </div>
            <div class="form-group">
            <label for="productDescription">Description</label>
            <textarea class="form-control" type="text" id="productDescription" name="productDescription" rows="5" required>{{$product->description}}</textarea>
            </div>
            <div class="form-group">
            <label for="productImage">Image</label>
            <input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
            <label for="Category">Category</label>
            <select name="CategoryID" id="CategoryID" class="form-control">                    
                        <option value="{{$product->categoryID}}"selected>     
                            {{$product->categoryID}}                   
                        </option>                    
                </select>  
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach         
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection