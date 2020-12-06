<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillTable extends Model
{
    use SoftDeletes;

    protected $table = 'bill_tables';

    const WAIT = 0;
    const DONE = 1;

    protected $fillable = [
        'date',
        'customer_id',
        'status',
        'table_id',
        'booking_id',
        'paymented',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function billTableDetails(){
        return $this->hasMany(BillTableDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
