<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * 显示预约表单
     *
     * @param  int  $tableId
     * @return \Illuminate\View\View
     */
    public function book($tableId)
    {
        $table = Table::findOrFail($tableId);
        $date = request('date', now()->format('Y-m-d'));
        return view('book', compact('table', 'date'));
    }

    /**
     * 存储预约信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'table_id' => 'required|integer|exists:tables,id'
        ]);

        // 检查时间段冲突
        $conflictingReservations = Reservation::where('table_id', $request->table_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_time', '<', $request->start_time)
                            ->where('end_time', '>', $request->end_time);
                    });
            })
            ->exists();

        if ($conflictingReservations) {
            return back()->withInput()->withErrors(['msg' => 'The selected time slot is already booked.']);
        }

        $reservation = Reservation::create($validatedData);

        if ($reservation) {
            return redirect()->route('reservationDetail', ['reservation' => $reservation->id]);
        } else {
            return back()->withInput()->withErrors(['msg' => 'Failed to create reservation']);
        }
    }

    /**
     * 显示预约成功页面
     *
     * @param  int  $reservationId
     * @return \Illuminate\View\View
     */
    public function reservationDetail($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('reservationDetail', compact('reservation'));
    }

    public function list()
    {
        $reservations = Reservation::orderBy('id', 'ASC')->get();
        return view('list', compact('reservations'));
    }

    /**
     * 显示单个预约的详细信息
     *
     * @param  int  $reservationId
     * @return \Illuminate\View\View
     */
    public function showList($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('listView', compact('reservation'));
    }

    /**
     * 获取指定日期的可用时间段
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableTimes(Request $request)
    {
        $request->validate([
            'table_id' => 'required|integer|exists:tables,id',
            'date' => 'required|date',
        ]);

        $tableId = $request->input('table_id');
        $date = $request->input('date');

        // 查询当天已有的预约
        $reservations = Reservation::where('table_id', $tableId)
            ->where('date', $date)
            ->get();

        $bookedTimes = $reservations->map(function ($reservation) {
            return [
                'start_time' => $reservation->start_time,
                'end_time' => $reservation->end_time,
            ];
        })->toArray();

        $allTimes = $this->generateTimeOptions(10, 20, 30);

        // 筛选可用时间
        $availableStartTimes = array_filter($allTimes, function ($time) use ($bookedTimes) {
            foreach ($bookedTimes as $booked) {
                if ($time >= $booked['start_time'] && $time < $booked['end_time']) {
                    return false;
                }
            }
            return true;
        });

        $availableEndTimes = array_filter($allTimes, function ($time) use ($bookedTimes) {
            foreach ($bookedTimes as $booked) {
                if ($time > $booked['start_time'] && $time <= $booked['end_time']) {
                    return false;
                }
            }
            return true;
        });

        return response()->json([
            'available_start_times' => array_values($availableStartTimes),
            'available_end_times' => array_values($availableEndTimes),
        ]);
    }

    /**
     * 生成时间选项
     *
     * @param  int  $start
     * @param  int  $end
     * @param  int  $step
     * @return array
     */
    private function generateTimeOptions($start, $end, $step)
    {
        $timeOptions = [];
        $currentTime = new \DateTime();
        $currentTime->setTime($start, 0);

        $endTime = new \DateTime();
        $endTime->setTime($end, 0);

        while ($currentTime <= $endTime) {
            $timeOptions[] = $currentTime->format('H:i');
            $currentTime->modify("+{$step} minutes");
        }

        return $timeOptions;
    }

    

}
