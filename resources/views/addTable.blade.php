@extends('staffLayout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Table</h3>

        <!-- 显示错误消息 -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 显示成功消息 -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('addTable') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="tableNo">Table No.</label>
                <input class="form-control" type="number" id="tableNo" min="1" max="10" name="tableNo" value="{{ old('tableNo') }}" required>
            </div>

            <div class="form-group">
                <label for="tableType">Table Type</label>
                <select name="tableType" id="tableType" class="form-control">
                    <option value="Big" {{ old('tableType') == 'Big' ? 'selected' : '' }}>Big (0-8 persons)</option>
                    <option value="Medium" {{ old('tableType') == 'Medium' ? 'selected' : '' }}>Medium (0-4 persons)</option>
                    <option value="Small" {{ old('tableType') == 'Small' ? 'selected' : '' }}>Small (0-4 persons)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tablePrice">Price (RM per hour)</label>
                <input class="form-control" type="number" id="tablePrice" name="tablePrice" step="0.01" min="0" value="{{ old('tablePrice') }}" required>
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
