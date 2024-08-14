@extends('staffLayout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Menu</h3>
        <form action="{{route('addMenuPost')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
				<label for="menuName">Name</label>
				<input class="form-control" type="text" id="menuName" name="menuName" required>
            </div>
            <div class="form-group">
				<label for="menuType">Type</label>
				<select name="menuType" id="menuType" class="form-control" required>
                    <option value="disabled selected">Please select a type</option>
                    <option value="food">food</option>
                    <option value="drink">drink</option>
				</select>
            </div>
            <div class="form-group">
				<label for="menuPrice">Price</label>
				<input class="form-control" type="text" id="menuPrice" name="menuPrice" required>
            </div>
            <div class="form-group">
				<label for="menuImage">Image</label>
				<input class="form-control" type="file" id="menuImage" name="menuImage">
            </div>
            <button type="submit" class="btn btn-primary">Add New Menu</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection