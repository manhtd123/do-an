<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'customer_id',
        'time',
        'table_id',
        'people_number',
        'status',
        'info',
    ];

    const DAXEPBAN = 0;
    const DANHANBAN = 1;
    const QUAGIO = 3;
    const DATHANHTOAN = 2;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }
}
