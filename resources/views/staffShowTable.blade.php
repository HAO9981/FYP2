@extends('staffLayout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <h2 class="mb-4">Upload Image</h2>
            
            <div class="upload-form mb-4">
                <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d-flex align-items-center">
                        <input type="file" id="fileInput" name="image" accept="image/*" class="form-control-file mr-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            
            <div class="image-preview mb-4">
                <img id="preview" src="#" alt="Image Preview" style="display: none; width: 300px; height: auto;" />
            </div>
            
            <div class="seat-image">
                <h2>Seat Images</h2>
                <img id="seatImage" src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid">
            </div>
        </div>

        <div class="col-md-8 table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Table No</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th class="text-center">
                            <a href="{{ route('addTable') }}" class="btn btn-success">Add New Table</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                    <tr>
                        <td>{{ $table->number }}</td>
                        <td>
                            <img src="{{ asset('images') . '/' . $table->image }}" alt="" class="table-img img-fluid" style="max-width: 100px;">
                        </td>
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
                        <td class="text-center">
                            <a href="{{ route('editTable', ['id' => $table->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                            <a href="{{ route('viewTable.delete', ['id' => $table->id]) }}" 
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure you want to delete this table?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
