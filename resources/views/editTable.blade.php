@extends('staffLayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Table Info</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updateTable') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <img src="{{ asset('images/' . $table->image) }}" alt="Table Image" width="100" class="img-fluid"><br>
                <label for="tableNo">Table No.</label>
                <input type="hidden" name="id" value="{{ $table->id }}">
                <input class="form-control" type="number" id="tableNo" name="tableNo" min="1" max="10" required value="{{ old('tableNo', $table->number) }}">

                <div class="form-group">
                    <label for="tableType">Table Type</label>
                    <select name="tableType" id="tableType" class="form-control" required>
                        <option value="Big" @if(old('tableType', $table->type) == 'Big') selected @endif>Big (0-8 person)</option>
                        <option value="Medium" @if(old('tableType', $table->type) == 'Medium') selected @endif>Medium (0-4 person)</option>
                        <option value="Small" @if(old('tableType', $table->type) == 'Small') selected @endif>Small (0-4 person)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tablePrice">Price (RM)</label>
                    <input class="form-control" type="number" id="tablePrice" name="tablePrice" min="1" step="0.01" required value="{{ old('tablePrice', $table->price) }}">
                </div>

                <div class="form-group">
                    <label for="tableImage">Table Image</label>
                    <input class="form-control" type="file" id="tableImage" name="tableImage">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
