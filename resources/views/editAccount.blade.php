@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <br><br>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h3>Change Account Information</h3>
            <div class="mt-2">
                <a href="{{route('account')}}" class="btn btn-primary mb-2">Back to Account Page</a>
            </div>
        </div>
        
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
            <input type="hidden" id="userName" name="userName" required value="{{ Auth::user()->name }}">
            <input type="hidden" id="userEmail" name="userEmail" required value="{{ Auth::user()->email }}">
            
            <label>Contact Number:</label>
            <input class="form-control mb-3" type="text" id="userContactNum" name="userContactNum" required value="{{ Auth::user()->contactNum }}">
            
            <label>Address:</label>
            <input class="form-control mb-3" type="text" id="userAddress" name="userAddress" required value="{{ Auth::user()->address }}">

            <br><br>
            <h3>Change Password</h3>
            
            <label for="currentPassword">Current Password:</label>
            <input class="form-control mb-3" type="password" id="currentPassword" name="currentPassword">

            <label for="newPassword">New Password:</label>
            <input class="form-control mb-3" type="password" id="newPassword" name="newPassword">

            <label for="newPassword_confirmation">Confirm New Password:</label>
            <input class="form-control mb-3" type="password" id="newPassword_confirmation" name="newPassword_confirmation">
            
            <br>
            <button type="submit" class="btn btn-primary w-100">Update Account Information</button>
        </form>
        <br><br>
    </div>
</div>
@endsection
