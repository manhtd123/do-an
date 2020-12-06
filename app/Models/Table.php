<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use SoftDeletes;

    protected $table = 'tables';

    protected $fillable = [
        'name',
        'status',
        'info',
        'number_slot',
        'table_group_id',
    ];

    const HOATDONG = 0;
    const BAOTRI = 1;
    const DANGSUDUNG = 2;

    public function tableGroup() {
    	return $this->belongsTo(TableGroup::class);
    }
}
