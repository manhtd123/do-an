<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierGroup extends Model
{
    use SoftDeletes;

    protected $table = 'supplier_groups';

    protected $fillable = [
        'name',
        'info',
        'status'
    ];

    public function supplier() {
    	return $this->hasMany(Supplier::class);
    }
}
