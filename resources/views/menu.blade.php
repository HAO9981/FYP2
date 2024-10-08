@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-12 text-center d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
                <path fill="currentColor" d="M128 352.576V352a288 288 0 0 1 491.072-204.224a192 192 0 0 1 274.24 204.48a64 64 0 0 1 57.216 74.24C921.6 600.512 850.048 710.656 736 756.992V800a96 96 0 0 1-96 96H384a96 96 0 0 1-96-96v-43.008c-114.048-46.336-185.6-156.48-214.528-330.496A64 64 0 0 1 128 352.64zm64-.576h64a160 160 0 0 1 320 0h64a224 224 0 0 0-448 0zm128 0h192a96 96 0 0 0-192 0zm439.424 0h68.544A128.256 128.256 0 0 0 704 192c-15.36 0-29.952 2.688-43.52 7.616c11.328 18.176 20.672 37.76 27.84 58.304A64.128 64.128 0 0 1 759.424 352zM672 768H352v32a32 32 0 0 0 32 32h256a32 32 0 0 0 32-32v-32zm-342.528-64h365.056c101.504-32.64 165.76-124.928 192.896-288H136.576c27.136 163.072 91.392 255.36 192.896 288z"/>
            </svg>
            <h2 style="margin: 0 15px;">Food</h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
                <path fill="currentColor" d="M128 352.576V352a288 288 0 0 1 491.072-204.224a192 192 0 0 1 274.24 204.48a64 64 0 0 1 57.216 74.24C921.6 600.512 850.048 710.656 736 756.992V800a96 96 0 0 1-96 96H384a96 96 0 0 1-96-96v-43.008c-114.048-46.336-185.6-156.48-214.528-330.496A64 64 0 0 1 128 352.64zm64-.576h64a160 160 0 0 1 320 0h64a224 224 0 0 0-448 0zm128 0h192a96 96 0 0 0-192 0zm439.424 0h68.544A128.256 128.256 0 0 0 704 192c-15.36 0-29.952 2.688-43.52 7.616c11.328 18.176 20.672 37.76 27.84 58.304A64.128 64.128 0 0 1 759.424 352zM672 768H352v32a32 32 0 0 0 32 32h256a32 32 0 0 0 32-32v-32zm-342.528-64h365.056c101.504-32.64 165.76-124.928 192.896-288H136.576c27.136 163.072 91.392 255.36 192.896 288z"/>
            </svg>
        </div>
        @foreach($menus->where('type', 'food') as $menu)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100" style="border-radius: 30px;">
                <div class="card-body text-center" style="position: relative;">
                    <h3 class="card-title">{{$menu->name}}</h3>
                    <img src="{{asset('images/')}}/{{$menu->image}}" alt="" class="img-fluid" style="max-height: 250px; max-width: 100%; object-fit: contain; margin: 0 auto; padding-bottom: 25px;">
                    <div class="d-flex justify-content-between" style="position: absolute; bottom: 10px; width: 90%;">
                        <h5>RM {{$menu->price}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-12 text-center d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                <path fill="currentColor" d="M14.48 1H20v2h-4.02l-.65 2.222h4.74L18.858 23H6.217l-.87-12.722C3.475 9.863 2 8.239 2 6.222c0-2.32 1.914-4.166 4.231-4.166c1.973 0 3.653 1.337 4.11 3.166h2.904L14.481 1Zm-1.82 6.222H7.145l.236 3.482l4.067.661l1.212-4.143Zm-.664 6.258l-4.475-.727L8.085 21h8.904l.451-6.616l-5.44-.903h-.003Zm5.581-1.1l.352-5.158h-3.185l-1.308 4.47l4.141.687ZM8.211 5.221a2.234 2.234 0 0 0-1.98-1.166C4.98 4.056 4 5.045 4 6.222c0 .797.48 1.523 1.201 1.896l-.197-2.896h3.207Z"/>
            </svg>
            <h3 style="margin: 0 15px;">Drinks</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                <path fill="currentColor" d="M14.48 1H20v2h-4.02l-.65 2.222h4.74L18.858 23H6.217l-.87-12.722C3.475 9.863 2 8.239 2 6.222c0-2.32 1.914-4.166 4.231-4.166c1.973 0 3.653 1.337 4.11 3.166h2.904L14.481 1Zm-1.82 6.222H7.145l.236 3.482l4.067.661l1.212-4.143Zm-.664 6.258l-4.475-.727L8.085 21h8.904l.451-6.616l-5.44-.903h-.003Zm5.581-1.1l.352-5.158h-3.185l-1.308 4.47l4.141.687ZM8.211 5.221a2.234 2.234 0 0 0-1.98-1.166C4.98 4.056 4 5.045 4 6.222c0 .797.48 1.523 1.201 1.896l-.197-2.896h3.207Z"/>
            </svg>
        </div>

        @foreach($menus->where('type', 'drink') as $menu)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100" style="border-radius: 30px;">
                <div class="card-body text-center" style="position: relative;">
                    <h3 class="card-title">{{$menu->name}}</h3>
                    <img src="{{asset('images/')}}/{{$menu->image}}" alt="" class="img-fluid" style="max-height: 300px; max-width: 100%; object-fit: contain; margin: 0 auto; padding-bottom: 25px;">
                    <div class="d-flex justify-content-between" style="position: absolute; bottom: 10px; width: 90%;">
                        <h5>RM {{$menu->price}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
