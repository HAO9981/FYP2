@extends('layout')

@section('content')
<div class="d-flex justify-content-center" style="margin-top: 50px;"> <!-- 添加 margin-top 来控制整体下移 -->
    <div class="row w-100">
        <div class="col-sm-12 col-md-4 mb-4 d-flex flex-column align-items-center">
            <h2>Seat Images</h2>
            <img id="seatImage" src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid" style="max-width: 80%;">
        </div>

        <div class="col-sm-12 col-md-8">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Table No</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price (per hour)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                    <tr>
                        <td>{{ $table->number }}</td>
                        <td><img src="{{ asset('images') }}/{{ $table->image }}" alt="" width="100" class="img-fluid"></td>
                        <td>{{ $table->type }}</td>
                        <td>RM {{ $table->price }}</td>
                        <td>
                            @if($table->is_reserved)
                                <button class="btn btn-secondary" disabled>Reserved</button>
                            @else
                                <a href="{{ route('tableDetail', $table->id) }}" class="btn btn-danger">Book</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
