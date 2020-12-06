<?php

namespace App\Http\Controllers\User\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TableGroup;
use App\Models\Table;
use App\Models\Booking;

class TableController extends Controller
{
    public function index() {
    	$groups = TableGroup::all();
    	$bookings = Booking::where('status', 1)->get()->sortByDesc('time');
    	return view('User.cashier.table', compact('groups', 'bookings'));
    }

    public function getTable(Request $request) {
    	if($request->group_id == 0){
    		$data = Table::whereIn('status', [0,2])->get();
    	} else {
    		$data = Table::where('table_group_id', $request->group_id)->whereIn('status', [0,2])->get();
    	}

    	return response()->json($data);
    }

    public function homePage(){
        $data = Table::whereIn('status', [0,2])->get();
        return response()->json($data);
    }
}
