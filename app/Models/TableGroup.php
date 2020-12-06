<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableGroup extends Model
{
    use SoftDeletes;

    protected $table = 'table_groups';

    protected $fillable = [
        'name',
        'info',
    ];

    public function table() {
    	return $this->hasMany(Table::class);
    }
}
