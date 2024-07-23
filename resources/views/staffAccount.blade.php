@extends('staffLayout')
@section('content')
<title>Account Page</title>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Staff Account Information</h3>
        <form action="{{ route('updateAccount') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="userName">Name:</label>
            <input class="form-control" type="text" id="userName" name="userName" required value="{{ Auth::user()->name }}" readonly> 
            <label>Email:</label>
            <input class="form-control" type="email" id="userEmail" name="userEmail" required value="{{ Auth::user()->email }}" readonly>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
