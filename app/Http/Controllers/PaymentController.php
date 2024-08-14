<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;
use Barryvdh\DomPDF\Facade\Pdf;

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
        'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}&reservation_id=' . $reservation->id . '&amount=' . $amount,
        'cancel_url' => route('payment.cancel'),
        'locale' => 'en',
    ]);

    return redirect()->away($session->url);
}


public function paymentSuccess(Request $request)
{
    $reservationId = $request->input('reservation_id');
    $amount = $request->input('amount'); // 获取传递的价格数据

    $reservation = Reservation::find($reservationId);

    if ($reservation) {
        // 将金额转换回原始单位
        $reservation->update([
            'is_paid' => true,
            'total_price' => $amount / 100 // 更新价格数据
        ]);

        // 生成 PDF
        $pdf = PDF::loadView('paymentPDF', compact('reservation'));

        // 保存 PDF
        $pdfPath = storage_path('app/public/reservation_invoice_' . $reservation->id . '.pdf');
        $pdf->save($pdfPath);

        // 返回成功视图，并附上 PDF 的下载链接
        return view('success', compact('reservation', 'pdfPath'));
    } else {
        return redirect()->route('home')->withErrors(['msg' => 'Failed to retrieve reservation details']);
    }
}






    public function paymentCancel(Request $request)
    {
        return redirect()->route('showTable'); 
    }

    public function downloadPDF(Request $request, $reservationId)
{
    $reservation = Reservation::with('table')->findOrFail($reservationId);

    // 获取价格参数
    $amount = $request->query('amount', 0);

    // 生成 HTML 内容，包含店名和不退款的免责声明
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservation Invoice - STL Board Game Cafe</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                margin: 20px;
                padding: 20px;
                border: 1px solid #ddd;
                font-size: 14px;
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 18px;
            }
            .list-group {
                list-style-type: none;
                padding: 0;
            }
            .list-group-item {
                margin-bottom: 10px;
            }
            .list-group-item strong {
                margin-right: 10px;
            }
            .disclaimer {
                margin-top: 40px;
                font-size: 12px;
                color: #555;
                text-align: justify;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>STL Board Game Cafe</h1>
            <h2>Reservation Invoice</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Reservation ID:</strong> ' . $reservation->id . '</li>
                <li class="list-group-item"><strong>Table Number:</strong> ' . $reservation->table->number . '</li>
                <li class="list-group-item"><strong>Name:</strong> ' . $reservation->name . '</li>
                <li class="list-group-item"><strong>Email:</strong> ' . $reservation->email . '</li>
                <li class="list-group-item"><strong>Phone:</strong> ' . $reservation->phone . '</li>
                <li class="list-group-item"><strong>Reserve Date:</strong> ' . $reservation->date . '</li>
                <li class="list-group-item"><strong>Start Time:</strong> ' . $reservation->start_time . '</li>
                <li class="list-group-item"><strong>End Time:</strong> ' . $reservation->end_time . '</li>
                <li class="list-group-item"><strong>Total Price:</strong> RM ' . number_format($amount / 100, 2) . '</li>
            </ul>
            <div class="disclaimer">
                <p><strong>Disclaimer:</strong> Please note that once the reservation has been confirmed and payment is completed, cancellations or failure to attend the reservation will not be eligible for a refund. All reservations at <strong>STL Board Game Cafe</strong> are final, and no exceptions will be made. We appreciate your understanding and cooperation.</p>
            </div>
        </div>
    </body>
    </html>';

    // 生成 PDF
    $pdf = PDF::loadHTML($html);

    return $pdf->download('reservation_invoice_' . $reservation->id . '.pdf');
}









}
