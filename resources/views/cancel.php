@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        Payment successful! Your reservation has been created.
    </div>
    <a href="{{ route('showTable') }}" class="btn btn-secondary" style=" margin-left: 500px; background-color: green">Home</a>

@endsection
