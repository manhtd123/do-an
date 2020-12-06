<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillProductDetail extends Model
{
    use SoftDeletes;

    protected $table = 'bill_product_details';

    protected $fillable = [
        'product_id',
        'quantity',
        'total',
        'bill_product_id',
    ];

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
