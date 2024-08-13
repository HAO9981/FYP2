@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4" style="color: #006400;">Your Payment Successful</h1>
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

    <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
        <button id="download_pdf_btn" class="btn btn-danger">Download PDF</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalPriceDisplay = document.getElementById('total_price_display');
        const downloadPdfBtn = document.getElementById('download_pdf_btn');
        const reservationId = '{{ $reservation->id }}';

        const totalPrice = localStorage.getItem('total_price');

        console.log('Total Price from localStorage:', totalPrice); 

        if (totalPrice) {
            totalPriceDisplay.innerText = `RM ${totalPrice}`;
        } else {
            totalPriceDisplay.innerText = 'RM 0.00';
        }

        downloadPdfBtn.addEventListener('click', function () {
            const amountInCents = totalPrice ? Math.round(parseFloat(totalPrice) * 100) : 0;

            fetch(`{{ route('download.pdf', ['reservationId' => $reservation->id]) }}?amount=${amountInCents}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `reservation_invoice_${reservationId}.pdf`;
                document.body.appendChild(a);
                a.click();
                a.remove();
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
