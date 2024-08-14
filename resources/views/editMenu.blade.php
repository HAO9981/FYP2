@extends('staffLayout')
@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <h3>Edit Menu Info</h3>
    </div>
</div>
<div class='row col-md-11'>
    <div class="col-md-5 text-center">
        @foreach($menus as $menu)
        <img src="{{asset('images')}}/{{$menu->image}}" alt="" width="350" class="img-fluid">
        @endforeach
    </div>
    <div class="col-md-7">
        <form action="{{route('updateMenu')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($menus as $menu)
            <div class="form-group">
                <label for="menuName">Menu Name</label>
                <input type="hidden" name="id" value="{{$menu->id}}">
                <input class="form-control" type="text" id="menuName" name="menuName" required value="{{$menu->name}}"> 
            </div>
            <div class="form-group">
                <label for="menuType">Menu Type</label>
                <select name="menuType" id="menuType" class="form-control" required value="{{$menu->type}}">
                <option value="{{$menu->type}}">{{$menu->type}}</option>
                <option value="food">food</option>
                <option value="drink">drink</option>
                </select>
            </div>
            <div class="form-group">
                <label for="menuPrice">Menu Price</label>
                <input class="form-control" type="text" id="menuPrice" name="menuPrice" required value="{{$menu->price}}">
            </div>
            <div class="form-group">
                <label for="menuImage">Menu Image</label>
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