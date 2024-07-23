@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2>Payment</h2>
        <!-- Payment form -->
        <form action="{{ route('makePayment') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Make Payment</button>
        </form>
    </div>
</div>
@endsection
