@extends('staffLayout')

@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"> <!-- 修改这里的列宽为 col-sm-10 -->
        <br><br>
        <style>
            .left {
                float: left;
                width: 25%;
                margin-left: -150px;
            }

            .right {
                float: right;
                width: 80%; /* 调整右侧内容的宽度，原先是 70% */
                margin-right: 50px;
            }

            .table-img {
                width: 150px; /* 调整表格中图片的宽度 */
                height: auto; /* 保持高度自适应 */
            }

            .upload-btn {
                margin-top: 20px; /* 调整上传按钮的上边距 */
            }

            .btn-col {
                text-align: center; /* 按钮居中 */
            }
        </style>
        <div>
            <div class="left">
                <h1>Upload Image</h1>
                <input type="file" id="fileInput" name="image" accept="image/*" />
                <button type="button" onclick="uploadImage()" class="upload-btn btn btn-primary">Upload</button>
                <img id="preview" src="#" alt="Image Preview" style="display: none; width: 300px; height: auto;" />
                
            </div>
            <div class="right">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Table.No</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th class="btn-col"><a href="{{ route('addTable') }}" class="btn btn-success">Add New Table</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->number }}</td>
                            <td><img src="{{ asset('images') . '/' . $table->image }}" alt="" class="table-img img-fluid"></td>
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
    <div class="col-sm-2"></div>
</div>

<script>
    function uploadImage() {
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    
    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];

        // 预览图片
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);

        // 创建 FormData 对象
        const formData = new FormData();
        formData.append('image', file);

        // 发送 AJAX 请求
        fetch('{{ route("upload.image") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // 添加 CSRF 令牌
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert('Image uploaded successfully!');
            // 更新显示表格中的图片
            updateTableImages(data.filename);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        alert('Please select an image file.');
    }
}

function updateTableImages(filename) {
    const images = document.querySelectorAll('.table-img');

    images.forEach(img => {
        const src = img.getAttribute('src').split('/').pop();
        if (src === 'empty.jpg') { // 或者其他默认图片名称
            img.setAttribute('src', `{{ asset('images') }}/${filename}`);
        }
    });
}

</script>

@endsection
