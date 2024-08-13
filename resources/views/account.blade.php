@extends('layout')
@section('content')
<title>Account Page</title>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Account Information</h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateAccount') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="userName">Name:</label>
            <input class="form-control" type="text" id="userName" name="userName" required value="{{ Auth::user()->name }}" readonly> 
            <label>Email:</label>
            <input class="form-control" type="email" id="userEmail" name="userEmail" required value="{{ Auth::user()->email }}" readonly>
            <label>Contact Number:</label>
            <input class="form-control" type="text" id="userContactNum" name="userContactNum" required value="{{ Auth::user()->contactNum }}">
            <label>Gender:</label>
            <input class="form-control" type="text" id="userGender" name="userGender" required value="{{ Auth::user()->gender }}" readonly>
            <label>Birthday:</label>
            <input class="form-control" type="date" id="userBirthday" name="userBirthday" required value="{{ Auth::user()->birthday }}" readonly>
            <label>Address:</label>
            <input class="form-control" type="text" id="userAddress" name="userAddress" required value="{{ Auth::user()->address }}">
            <br><br>
            <h3>Change Password</h3>
            <label for="currentPassword">Current Password:</label>
            <input class="form-control" type="password" id="currentPassword" name="currentPassword">

            <label for="newPassword">New Password:</label>
            <input class="form-control" type="password" id="newPassword" name="newPassword">

            <label for="newPassword_confirmation">Confirm New Password:</label>
            <input class="form-control" type="password" id="newPassword_confirmation" name="newPassword_confirmation">
            
            <br><br>
            <button type="submit" class="btn btn-primary">Update Account Information</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
