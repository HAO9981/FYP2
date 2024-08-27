@extends('staffLayout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Table</h3>
        <form action="{{ route('addTable') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="tableNo">Table No.</label>
                <input class="form-control" type="number" id="tableNo" min="1" max="10" name="tableNo" required>
            </div>

            <div class="form-group">
                <label for="tableType">Table Type</label>
                <select name="tableType" id="tableType" class="form-control">
                    <option value="Big">Big (0-8 persons)</option>
                    <option value="Medium">Medium (0-4 persons)</option>
                    <option value="Small">Small (0-4 persons)</option>
                </select>
            </div>

            <div class="form-group">
<<<<<<< Updated upstream
                <label for="tablePrice">Table Price</label>
                <select name="tablePrice" id="tablePrice" class="form-control">
                    <option value="18">Big (1 hour RM 18)</option>
                    <option value="10">Medium (1 hour RM 10)</option>
                    <option value="6">Small (1 hour RM 6)</option>
                </select>
=======
                <label for="tablePrice">Price (RM per hour)</label>
                <input class="form-control" type="number" id="tablePrice" name="tablePrice" step="0.01" min="0" required>
>>>>>>> Stashed changes
            </div>

            <div class="form-group">
                <label for="tableImage">Table Image</label>
                <input class="form-control" type="file" id="tableImage" name="tableImage">
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
