@extends('layout')
@section('content')
<div class="d-flex justify-content-center" style="margin-top: 40px;">
    <div class="row w-100">
        <div class="col-sm-12 col-md-8">
            <table class="table table-bordered mt-4 text-center" style="background-color: white; border-radius: 10px;">
                <thead>
                    <tr>
                        <th style="width: 5%;">Table No</th>
                        <th style="width: 25%;">Image</th>
                        <th style="width: 15%;">Type</th>
                        <th style="width: 10%;">Price (per hour)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                    <tr>
                        <td>{{ $table->number }}</td>
                        <td><img src="{{ asset('images') }}/{{ $table->image }}" alt="" width="250" height="300" class="img-fluid img-thumbnail" style="object-fit: cover;"></td>
                        <td>
                            {{ $table->type }} 
                            @if($table->type == 'Big')
                                (Max 8 persons)
                            @elseif($table->type == 'Medium')
                                (Max 4 persons)
                            @elseif($table->type == 'Small')
                                (Max 2 persons)
                            @endif
                        </td>
                        <td>RM {{ $table->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-sm-12 col-md-4 mb-4 d-flex flex-column align-items-center seat-image-container">
            <h2>Seat Images</h2>
            <img id="seatImage" src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid" style="max-width: 80%; cursor: pointer;" data-toggle="modal" data-target="#seatImageModal">

            <div class="text-center mt-3">
                @if(!$table->is_reserved)
                    <a href="{{ route('tableDetail', $table->id) }}" class="btn btn-primary">Click to Book Table</a>
                @else
                    <button class="btn btn-secondary" disabled>Reserved</button>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="seatImageModal" tabindex="-1" role="dialog" aria-labelledby="seatImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<style>
@media (min-width: 768px) {
    .seat-image-container {
        position: sticky;
        top: 20px;
        align-self: flex-start;
        z-index: 10;
    }
}

@media (max-width: 767.98px) {
    .seat-image-container {
        position: relative;
        right: auto;
        top: auto;
        max-width: 100%;
        margin-top: 20px;
    }
}
</style>
@endsection
