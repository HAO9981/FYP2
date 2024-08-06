@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center mb-4">支付详情</h1>
            <ul class="list-group">
                <li class="list-group-item"><strong>预约 ID:</strong> {{ $reservation->id }}</li>
                <li class="list-group-item"><strong>桌子编号:</strong> {{ $reservation->table->number }}</li>
                <li class="list-group-item"><strong>姓名:</strong> {{ $reservation->name }}</li>
                <li class="list-group-item"><strong>邮箱:</strong> {{ $reservation->email }}</li>
                <li class="list-group-item"><strong>电话:</strong> {{ $reservation->phone }}</li>
                <li class="list-group-item"><strong>预约日期:</strong> {{ $reservation->date }}</li>
                <li class="list-group-item"><strong>开始时间:</strong> {{ $reservation->start_time }}</li>
                <li class="list-group-item"><strong>结束时间:</strong> {{ $reservation->end_time }}</li>
                <li class="list-group-item"><strong>总价格:</strong> <span id="total_price_display">RM {{ $reservation->total_price }}</span></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h1 class="text-center mb-4">Stripe Checkout</h1>
            <button id="checkout-button" class="btn btn-success mt-3">立即支付 RM {{ $reservation->total_price }}</button>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripe = Stripe('YOUR_STRIPE_PUBLISHABLE_KEY');
        const checkoutButton = document.getElementById('checkout-button');
        
        checkoutButton.addEventListener('click', function () {
            fetch('{{ route('create.checkout.session') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    amount: {{ $reservation->total_price * 100 }} // 价格，以分为单位
                }),
            })
            .then(response => response.json())
            .then(sessionId => {
                return stripe.redirectToCheckout({ sessionId: sessionId.id });
            })
            .then(result => {
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
@endsection
