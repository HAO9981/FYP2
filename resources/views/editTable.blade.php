@extends('staffLayout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Table Info</h3>
        <form action="{{ route('updateTable') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <img src="{{ asset('images') }}/{{ $table->image }}" alt="Table Image" width="100" class="img-fluid"><br>
                <label for="tableNo">Table No.</label>
                <input type="hidden" name="id" value="{{ $table->id }}">
                <input class="form-control" type="number" id="tableNo" name="tableNo" min="1" max="10" required value="{{ $table->number }}">

                <div class="form-group">
                    <label for="tableType">Table Type</label>
                    <select name="tableType" id="tableType" class="form-control" required>
                        <option value="Big" @if($table->type == 'Big') selected @endif>Big (0-8 person)</option>
                        <option value="Medium" @if($table->type == 'Medium') selected @endif>Medium (0-4 person)</option>
                        <option value="Small" @if($table->type == 'Small') selected @endif>Small (0-4 person)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tablePrice">Table Price</label>
                    <select name="tablePrice" id="tablePrice" class="form-control" required>
                        <option value="18" @if($table->price == 18) selected @endif>Big (1 hour RM 18)</option>
                        <option value="10" @if($table->price == 10) selected @endif>Medium (1 hour RM 10)</option>
                        <option value="6" @if($table->price == 6) selected @endif>Small (1 hour RM 6)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tableImage">Table Image</label>
                    <input class="form-control" type="file" id="tableImage" name="tableImage">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
