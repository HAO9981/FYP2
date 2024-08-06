@extends('layout')

@section('content')
<div class="row">
    <style>
        .left {
            margin-left: 30px;
            margin-top: 50px;
        }
        .right{
            margin-left: 30px;
            margin-top: 50px;
        }
    </style>
    <div class="col-sm-3">
        <div class="left"><!-- 左侧展示区域 -->
            <div class="seat-image">
                <h2 style="margin-left:118px;">Seat Images</h2>
                <img id="seatImage" src="{{ asset('images/seat_image.jpg') }}" alt="Seats Image" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-7">                
        <div class="right">
        <!-- 桌子列表表格 -->
            <table class="table table-bordered mt-4">
              <thead>
                  <tr>
                      <td>Table No</td>
                      <td>Image</td>
                       <td>Type</td>
                      <td>Price (per hour)</td>
                      <td>Action</td>
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
    <div class="col-sm-2"></div>
</div>
@endsection

