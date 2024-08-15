@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Reservation Details</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Reservation ID:</strong> {{ $reservation->id }}</li>
        <li class="list-group-item"><strong>Table Number:</strong> {{ $reservation->table->number }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $reservation->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $reservation->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $reservation->phone }}</li>
        <li class="list-group-item"><strong>Reserve Date:</strong> {{ $reservation->date }}</li>
        <li class="list-group-item"><strong>Start Time:</strong> {{ $reservation->start_time }}</li>
        <li class="list-group-item"><strong>End Time:</strong> {{ $reservation->end_time }}</li>
        <li class="list-group-item"><strong>Total Price:</strong> <span id="total_price_display">RM 0.00</span></li>
    </ul>
    <br>
    <div class="d-flex justify-content-between">
        <form id="payment-form" action="{{ route('create.checkout.session') }}" method="POST">
            @csrf
            <input type="hidden" id="amount" name="amount" value="">
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <button type="submit" class="btn btn-success" style=" margin-left: 470px;">Make Payment</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalPriceDisplay = document.getElementById('total_price_display');
        const amountInput = document.getElementById('amount');

        const totalPrice = localStorage.getItem('total_price');

        if (totalPrice) {
            totalPriceDisplay.innerText = `RM ${totalPrice}`;

            const amountInCents = Math.round(parseFloat(totalPrice) * 100);
            amountInput.value = amountInCents;
        } else {
            totalPriceDisplay.innerText = 'RM 0.00';
            amountInput.value = 0;
        }
    });
</script>
@endsection
