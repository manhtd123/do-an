<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
	    'name',
	    'purchase_price',
	    'describe',
	    'sale_price',
	    'bua',
	    'unit',
	    'quantity',
	    'category_id',
        'img',
    ];

    public function images() {
    	return $this->hasMany(Image::class);
    }

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function getOneImage($id) {
        $image = Image::where('product_id', $id)->first();
        return $image->name;
    }
}
