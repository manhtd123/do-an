<?php

namespace App\Http\Controllers\User\Chief;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillTableDetail;
use Carbon;

class ChiefController extends Controller
{
    public function index() {
        $currentTime = Carbon\Carbon::now();
        $products = BillTableDetail::where('bill_table_details.status', 0)
        ->select('tables.name as nametable', 'users.name as nameuser', 'bill_table_details.id', 'bill_table_details.updated_at', 'bill_table_details.quantity', 'products.name as nameproduct')
        ->join('bill_tables', 'bill_tables.id', '=', 'bill_table_details.bill_table_id')
        ->join('bookings', 'bill_tables.booking_id', '=', 'bookings.id')
        ->join('tables', 'bookings.table_id', '=', 'tables.id')
        ->join('users', 'bill_tables.user_id', '=', 'users.id')
        ->join('products', 'bill_table_details.product_id', '=', 'products.id')
        ->get();

    	return view('User.chief.index', compact('products', 'currentTime'));
    }

    public function postQuantity(Request $request) {
        $data = BillTableDetail::findOrFail($request->id);
        if($data->quantity == $request->quantity){
            $data->real_quantity = $request->quantity;
            $data->status = 2;
            $data->save();
        } else {
            $data->real_quantity = $request->quantity;
        }
        $data->save();
    }
}
