@extends('staffLayout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">All Reservations</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>Table Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->table->number }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->start_time }}</td>
                <td>{{ $reservation->end_time }}</td>
                <td>
                    <a href="{{ route('list.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection