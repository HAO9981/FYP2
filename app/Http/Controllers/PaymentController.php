<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('payment', compact('reservation'));
    }

    public function process(Request $request, $reservationId)
    {
        // 找到预约记录
        $reservation = Reservation::findOrFail($reservationId);

        // 标记桌子为已预约
        $table = Table::findOrFail($reservation->table_id);
        $table->is_reserved = true;
        $table->save();

        // 假设支付成功，重定向到桌面界面
        return redirect()->route('tables.show')->with('success', 'Payment completed and table reserved.');
    }
}