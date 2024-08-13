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
				<label for="productName">Board Game Name</label>
				<input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
				<label for="productType">Board Game Type</label>
            <select name="productType" id="productType" class="form-control" required>
               <option value="disabled selected">Please select a type</option>
               <option value="Card Game">Card Game</option>
               <option value="Party Game">Party Game</option>
               <option value="Chess game">Chess Game</option>
				</select>
            </div>
            <div class="form-group">
				<label for="productDescription">Board Game Description</label>
				<textarea class="form-control" type="text" id="productDescription" name="productDescription" rows="5" required></textarea>
            </div>
            <div class="form-group">
				<label for="productImage">Board Game Image</label>
				<input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
				<label for="productVideo">Video</label>
				<input class="form-control" type="file" id="productVideo" name="productVideo" >
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection