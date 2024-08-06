<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;

class TableController extends Controller
{
    // 添加新桌子
    public function add(Request $request)
    {
        // 处理上传的图片
        $imageName = 'empty.jpg'; // 默认图片
        if ($request->hasFile('tableImage')) {
            $image = $request->file('tableImage');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        // 根据桌子类型设置价格
        $price = '';
        if ($request->tableType === 'Big') {
            $price = 18;
        } elseif ($request->tableType === 'Medium') {
            $price = 10;
        } elseif ($request->tableType === 'Small') {
            $price = 6;
        }

        // 创建桌子记录
        Table::create([
            'number' => $request->tableNo,
            'type' => $request->tableType, // 设置桌子类型
            'price' => $price, // 设置价格
            'image' => $imageName,
            'is_reserved' => false // 确保默认未预约
        ]);

        return redirect()->route('staffShowTable')->with('success', 'Table added successfully');
    }

    // 显示所有桌子
    public function view()
    {
        $tables = Table::all();
        return view('staffShowTable', compact('tables'));
    }

    // 编辑桌子
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('editTable', compact('table'));
    }

    public function update(Request $request)
    {
        // 获取表单提交的所有数据
        $id = $request->input('id');
        $tableNo = $request->input('tableNo');
        $tableType = $request->input('tableType');

        // 根据桌子类型设置价格
        $price = '';
        if ($tableType === 'Big') {
            $price = 18;
        } elseif ($tableType === 'Medium') {
            $price = 10;
        } elseif ($tableType === 'Small') {
            $price = 6;
        }

        // 找到要更新的桌子
        $table = Table::findOrFail($id);

        // 更新桌子信息
        $table->number = $tableNo;
        $table->type = $tableType;
        $table->price = $price;

        // 处理上传的图片（如果有）
        if ($request->hasFile('tableImage')) {
            $validatedData = $request->validate([
                'tableImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $image = $request->file('tableImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $table->image = $imageName;
        }

        // 保存更新
        $table->save();

        // 重定向到某个页面
        return redirect()->route('staffShowTable')->with('success', 'Table updated successfully.');
    }
    
    // 删除桌子
    public function delete($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return redirect()->route('staffShowTable')->with('success', 'Table deleted successfully');
    }

    // 显示桌子列表给顾客
    public function show()
    {
        $tables = Table::all(); // 确保包括 is_reserved 状态
        return view('showTable', compact('tables'));
    }

    public function uploadImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'table_id' => 'required|exists:tables,id'
    ]);

    $image = $request->file('image');
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $imageName);

    $table = Table::find($request->input('table_id'));
    if ($table) {
        $table->image = $imageName;
        $table->save();
    }

    return response()->json(['filename' => $imageName]);
}


public function book($id, Request $request)
{
    $table = Table::findOrFail($id);
    $date = $request->input('date');
    $startTime = $request->input('start_time');
    return view('book', compact('table', 'date', 'startTime'));
}



    public function store(Request $request)
{
    $request->validate([
        'table_id' => 'required|exists:tables,id',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|string|max:20',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

    $startDateTime = Carbon::parse($request->date . ' ' . $request->start_time);
    $endDateTime = Carbon::parse($request->date . ' ' . $request->end_time);


    $conflictingReservations = Reservation::where('table_id', $request->table_id)
    ->where('date', $request->date)
    ->where(function ($query) use ($startDateTime, $endDateTime) {
        $query->where(function ($q) use ($startDateTime, $endDateTime) {
            $q->whereBetween('start_time', [$startDateTime, $endDateTime])
                ->orWhereBetween('end_time', [$startDateTime, $endDateTime])
                ->orWhereRaw('? BETWEEN start_time AND end_time', [$startDateTime])
                ->orWhereRaw('? BETWEEN start_time AND end_time', [$endDateTime]);
        });
    })
    ->exists();


    if ($conflictingReservations) {
        return back()->withErrors(['error' => 'The selected time slot is already reserved. Please choose a different time.']);
    }

    Reservation::create([
        'table_id' => $request->table_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'date' => $request->date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->route('showTable')->with('reservation', 'Reservation successful.');
}


public function getAvailableTimes(Request $request)
{
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

    $allTimes = $this->generateTimeOptions(10, 20, 30); // 例如10AM到8PM

    // 增加处理结束时间边界
    $adjustedBookedTimes = array_map(function($time) {
        $endTime = new \DateTime($time['end_time']);
        $endTime->modify('+1 minute'); // 将结束时间的边界调整为可用的时间段
        return [
            'start_time' => $time['start_time'],
            'end_time' => $endTime->format('H:i'),
        ];
    }, $bookedTimes);

    // 计算不可用时间（分为两个区间）
    $unavailableTimes = array_filter($allTimes, function ($time) use ($adjustedBookedTimes) {
        foreach ($adjustedBookedTimes as $booked) {
            $timeDateTime = new \DateTime($time);
            $startDateTime = new \DateTime($booked['start_time']);
            $endDateTime = new \DateTime($booked['end_time']);
            
            // Check if the time is within any booked range
            if ($timeDateTime >= $startDateTime && $timeDateTime < $endDateTime) {
                return true;
            }
        }
        return false;
    });

    // 将所有时间分为00-29和30-59的区间
    $timeSlots = [];
    foreach ($allTimes as $time) {
        $hour = (new \DateTime($time))->format('H');
        $minute = (new \DateTime($time))->format('i');

        // 判断是属于00-29还是30-59
        if ($minute < 30) {
            $timeSlots["{$hour}:00-{$hour}:29"][] = $time;
        } else {
            $timeSlots["{$hour}:30-{$hour}:59"][] = $time;
        }
    }

    // 筛选可用时间
    $availableTimes = [];
    foreach ($timeSlots as $range => $times) {
        if (!array_intersect($times, $unavailableTimes)) {
            $availableTimes = array_merge($availableTimes, $times);
        }
    }

    return response()->json([
        'available_times' => array_values($availableTimes),
        'unavailable_times' => array_values($unavailableTimes),
    ]);
}




private function generateTimeOptions($startHour, $endHour, $stepMinutes)
{
    $timeOptions = [];
    $currentTime = new \DateTime();
    $currentTime->setTime($startHour, 0);

    $endTime = new \DateTime();
    $endTime->setTime($endHour, 0);

    while ($currentTime <= $endTime) {
        $timeOptions[] = $currentTime->format('H:i');
        $currentTime->modify("+{$stepMinutes} minutes");
    }

    return $timeOptions;
}


    // 显示桌子详情，展示三个月内的桌子信息
    public function showTableDetail(Request $request, $id)
{
    $table = Table::findOrFail($id);
    $date = $request->input('date', Carbon::now()->format('Y-m-d'));

    $tables = Table::all();
    $startDate = Carbon::parse($date);
    $endDate = Carbon::parse($date)->addMonths(3);

    $reservations = Reservation::whereBetween('date', [$startDate->toDateString(), $endDate->toDateString()])
        ->get();

    // Generate all time slots
    $timeSlots = [];
    $startTime = Carbon::createFromFormat('H:i', '10:00');
    $endTime = Carbon::createFromFormat('H:i', '20:00');
    while ($startTime <= $endTime) {
        $timeSlots[] = $startTime->format('H:i');
        $startTime->addMinutes(30);
    }

    $availability = [];
    foreach ($timeSlots as $slot) {
        foreach ($tables as $tbl) {
            $isAvailable = true;
            foreach ($reservations as $reservation) {
                if ($reservation->table_id == $tbl->id) {
                    $reservationStartTime = Carbon::parse($reservation->start_time);
                    $reservationEndTime = Carbon::parse($reservation->end_time)->addMinutes(30); // 延迟30分钟

                    // Convert slot to comparable format
                    $slotTime = Carbon::parse($slot);

                    // Check if the slot is within or overlaps with the reservation period
                    if ($slotTime >= $reservationStartTime && $slotTime < $reservationEndTime) {
                        $isAvailable = false;
                        break;
                    }
                }
            }
            $availability[$slot][$tbl->id] = $isAvailable ? 'available' : 'booked';
        }
    }

    return view('tableDetail', compact('table', 'availability', 'timeSlots', 'tables', 'date'));
}









    public function showBookForm(Request $request)
{
    $tableId = $request->input('table_id');
    $date = $request->input('date');
    $startTime = $request->input('start_time');

    $table = Table::findOrFail($tableId);

    return view('book', compact('table', 'date', 'startTime'));
}

public function getRecentImages()
{
    // 获取所有图片文件名
    $files = \File::files(public_path('images'));
    $images = array_map(function ($file) {
        return basename($file);
    }, $files);

    // 返回 JSON 数据
    return response()->json(['images' => $images]);
}

public function uploadTableImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 处理上传的文件
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = 'seat_image.jpg'; // 固定文件名
        $file->move(public_path('images'), $filename);

        // 可以在这里保存图片路径到数据库，但这个例子只是保存到本地
    }
    return redirect()->back()->with('success', 'Image uploaded successfully!');
}



}
