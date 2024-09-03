@extends('staffLayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h3>Table Booking Status</h3>

            <!-- 日期选择表单 -->
            <form method="GET" action="{{ route('staffTableDetail') }}">
                <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ $date }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ \Carbon\Carbon::now()->addMonths(3)->format('Y-m-d') }}">
                </div>
                <button type="submit" class="btn btn-primary">Show Status</button>
            </form>
            <br>

            <!-- 状态表格 -->
            <table class="table table-bordered">
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
                                        orange
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
                                        Past
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
@endsection
