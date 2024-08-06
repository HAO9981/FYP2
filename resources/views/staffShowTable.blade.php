@extends('staffLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <style>
                .left {
                    float: left;
                    width: 20%;
                    margin-top: 50px;
                }

                .right {
                    float: right;
                    width: 70%; /* 调整右侧内容的宽度，原先是 70% */
                    margin-top: 50px;

                }
            </style>
            <!-- 左侧展示区域 -->
            <div class="left">
                <h2 class="mb-4" >Upload Image</h2>
                
                <!-- 上传图片表单 -->
                <div class="upload-form">
                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex align-items-center">
                            <input type="file" id="fileInput" name="image" accept="image/*" class="form-control-file mr-2">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
                
                <!-- 图片预览 -->
                <div class="image-preview">
                    <img id="preview" src="#" alt="Image Preview" style="display: none; width: 300px; height: auto;" />
                </div>
                
                <!-- 座位图片展示 -->
                <div class="seat-image">
                    <h2 >Seat Images</h2>
                    <img id="seatImage" src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid">
                </div>
            </div>
            <div class="right">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Table No</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th class="btn-col">
                                <a href="{{ route('addTable') }}" class="btn btn-success">Add New Table</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->number }}</td>
                            <td>
                                <img src="{{ asset('images') . '/' . $table->image }}" alt="" class="table-img img-fluid">
                            </td>
                            <td>{{ $table->type }}</td>
                            <td>RM{{ $table->price }}</td> 
                            <td class="btn-col">
                                <a href="{{ route('editTable', ['id' => $table->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                                <a href="{{ route('viewTable.delete', ['id' => $table->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
