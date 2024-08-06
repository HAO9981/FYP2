<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $reservation = Reservation::find($request->input('reservation_id'));

        if (!$reservation) {
            return redirect()->route('home')->withErrors(['msg' => 'Reservation not found.']);
        }

        $amount = $request->input('amount');

        $session = CheckoutSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => 'Table Reservation',
                        ],
                        'unit_amount' => $amount, 
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}&reservation_id=' . $reservation->id,
            'cancel_url' => route('payment.cancel'), 
            'locale' => 'en',
        ]);

        return redirect()->away($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        $reservationId = $request->input('reservation_id');
        $reservation = Reservation::find($reservationId);

        if ($reservation) {
      
            $reservation->update(['is_paid' => true]);

            return view('success', compact('reservation')); 
        } else {
            return redirect()->route('home')->withErrors(['msg' => 'Failed to retrieve reservation details']);
        }
    }

    public function paymentCancel(Request $request)
    {
        return redirect()->route('showTable'); 
    }
}
