@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">My Reservations</h1>

    <!-- 搜索表单 -->
    <form method="GET" action="{{ route('customer.reservations') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="table_number" class="form-control" placeholder="Search by Table Number" value="{{ request('table_number') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
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
                    <th>Status</th>
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
                        <a href="{{ route('cuslist.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $reservations->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
