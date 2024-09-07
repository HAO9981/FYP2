@extends('staffLayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h3>Table Booking Status</h3>
            <form method="GET" action="{{ route('staffTableDetail') }}" id="dateForm">
                <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ $date }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ \Carbon\Carbon::now()->addMonths(3)->format('Y-m-d') }}">
                </div>
            </form>
            <br>
            <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Time</th>
                        @foreach($tables as $tbl)
                            <th>Table {{ $tbl->number }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeSlots as $slot)
                        <tr>
                            <td>{{ $slot }}</td>
                            @foreach($tables as $tbl)
                                @php
                                    $status = $availability[$slot][$tbl->id] ?? 'available';
                                @endphp
                                <td style="background-color: 
                                    @if($status == 'past')
                                        gray
                                    @elseif($status == 'available')
                                        green
                                    @else
                                        red
                                    @endif
                                ; color: white;">
                                    @if($status == 'available')
                                        <a href="{{ route('staffBookForm', ['table_id' => $tbl->id, 'date' => $date, 'start_time' => $slot]) }}" class="btn btn-light btn-sm">
                                            Book
                                        </a>
                                    @elseif($status == 'past')
                                            Book
                                    @else
                                        Booked
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('date').addEventListener('change', function() {
        document.getElementById('dateForm').submit();
    });
</script>
@endsection
