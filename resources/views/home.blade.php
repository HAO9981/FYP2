@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="text-align: center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('statust') }}
                </div>
            @endif
            <h1>{{ __('You have successfully logged in!') }}</h1>
            <br>
            <a href="{{route('showProduct')}}" class="btn btn-dark">Start to use our website!</a>
        </div>
    </div>
</div>
@endsection
