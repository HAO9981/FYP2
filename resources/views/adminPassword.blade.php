@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-md-5" style="margin-top: 10px; border: 2px solid; border-radius: 20px; padding: 15px">
        <h1>Please Enter Security Password</h1>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.password.check') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="password">Admin Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Log In</button>
        </form>
</div>
</div>
@endsection
