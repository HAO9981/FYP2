@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Menu Info</h3>
        <form action="{{route('updateMenu')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($menus as $menu)
            <div class="form-group">
                <img src="{{asset('images')}}/{{$menu->image}}" alt="" width="100" class="img-fluid"><br>
            <label for="menuName">Name</label>
            <input type="hidden" name="id" value="{{$menu->id}}">
            <input class="form-control" type="text" id="menuName" name="menuName" required value="{{$menu->name}}">
            </div>
            <div class="form-group">
				<label for="menuType">Type</label>
				<select name="menuType" id="menuType" class="form-control" required>
                    <option value="disabled selected">Please select a type</option>
                    <option value="snack">snack</option>
                    <option value="drink">drink</option>
				</select>
            </div>
            <div class="form-group">
            <label for="menuPrice">Price</label>
            <input class="form-control" type="text" id="menuPrice" name="menuPrice" required value="{{$menu->price}}">
            </div>
            <div class="form-group">
            <label for="menuImage">Image</label>
            <input class="form-control" type="file" id="menuImage" name="menuImage" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @endforeach         
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection