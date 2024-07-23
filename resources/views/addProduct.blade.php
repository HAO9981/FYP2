@extends('staffLayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Board Game</h3>
        <form action="{{route('addProduct')}}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="productName">Name</label>
				<input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
				<label for="productType">Type</label>
				<input class="form-control" type="text" id="productType" name="productType" required>
            </div>
            <div class="form-group">
				<label for="productDescription">Description</label>
				<textarea class="form-control" type="text" id="productDescription" name="productDescription" rows="5" required></textarea>
            </div>
            <div class="form-group">
				<label for="productImage">Image</label>
				<input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
				<label for="Category">Category</label>
				<select name="CategoryID" id="CategoryID" class="form-control">
            <option value="1">1</option>       
				</select>  
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection