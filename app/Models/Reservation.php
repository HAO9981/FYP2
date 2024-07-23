<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'start_time',
        'end_time',
        'table_id', // 确保在可填字段中
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}