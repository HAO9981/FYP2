@extends('staffLayout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Reservation Details</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Reservation ID:</strong> {{ $reservation->id }}</li>
        <li class="list-group-item"><strong>Table Number:</strong> {{ $reservation->table->number }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $reservation->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $reservation->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $reservation->phone }}</li>
        <li class="list-group-item"><strong>Reserve Date:</strong> {{ $reservation->date }}</li>
        <li class="list-group-item"><strong>Start Time:</strong> {{ $reservation->start_time }}</li>
        <li class="list-group-item"><strong>End Time:</strong> {{ $reservation->end_time }}</li>
    </ul>
    <br>
    <a href="{{ route('list') }}" class="btn btn-success">Back to All Reservations</a>
</div>
<br>
@endsection