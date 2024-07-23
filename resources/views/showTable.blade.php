@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br><br>
        
        <!-- 新增的照片展示区 -->
        <div class="row">
            <div class="col-md-12">
                <h3>Recently Uploaded Images</h3>
                
            </div>
        </div>

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
    <div class="col-sm-2"></div>
</div>

<script>
    // 监听图片上传后的事件
    function uploadImage() {
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    
    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);

        const formData = new FormData();
        formData.append('image', file);
        formData.append('table_id', '{{ $table->id }}'); // 确保这里有表格ID

        fetch('{{ route("upload.image") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.filename) {
                alert('Image uploaded successfully!');
                updateTableImages(data.filename);
            } else {
                alert('Error uploading image: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        alert('Please select an image file.');
    }
}

</script>

@endsection
