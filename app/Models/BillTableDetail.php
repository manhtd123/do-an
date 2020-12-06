<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BillTable;

class BillTableDetail extends Model
{
    use SoftDeletes;

    protected $table = 'bill_table_details';

    const DANGCHEBIEN = 0;
    const CHEBIENXONG = 1;
    const DACUNGUNG = 2;

    protected $fillable = [
        'bill_table_id',
        'product_id',
        'quantity',
        'total',
        'status',
    ];

    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
