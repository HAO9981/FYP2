@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <br><br>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h3>Account Information</h3>
            <div>
                <a href="{{route('editAccount')}}" class="btn btn-primary mb-2">Edit Account Info</a>
                <a href="{{ route('logout') }}"
                   class="btn btn-danger mb-2"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        @csrf
        <label for="userName">Name:</label>
        <input class="form-control mb-3" type="text" id="userName" name="userName" value="{{ Auth::user()->name }}" readonly> 
        <label>Email:</label>
        <input class="form-control mb-3" type="email" id="userEmail" name="userEmail" value="{{ Auth::user()->email }}" readonly>
        <label>Contact Number:</label>
        <input class="form-control mb-3" type="text" id="userContactNum" name="userContactNum" value="{{ Auth::user()->contactNum }}" readonly>
        <label>Gender:</label>
        <input class="form-control mb-3" type="text" id="userGender" name="userGender" value="{{ Auth::user()->gender }}" readonly>
        <label>Birthday:</label>
        <input class="form-control mb-3" type="date" id="userBirthday" name="userBirthday" value="{{ Auth::user()->birthday }}" readonly>
        <label>Address:</label>
        <input class="form-control mb-3" type="text" id="userAddress" name="userAddress" value="{{ Auth::user()->address }}" readonly>
        <br><br>
    </div>
</div>
@endsection
