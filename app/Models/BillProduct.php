<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillProduct extends Model
{
    use SoftDeletes;

    protected $table = 'bill_products';

    protected $fillable = [
        'user_id',
        'quantity',
        'total',
        'supplier_id',
        'date',
    ];

    public function supplier(){
    	return $this->belongsTo(Supplier::class);
    }

    public function product(){
    	return $this->hasMany(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function billProductDetail(){
        return $this->hasMany(BillProductDetail::class);
    }
}
