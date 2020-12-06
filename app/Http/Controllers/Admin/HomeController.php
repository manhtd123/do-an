<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BillTable;
use App\Models\BillTableDetail;
use App\Models\BillProduct;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_count = BillTable::where('status', 0)
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->selectRaw('sum(paymented) as sum, count(id) as count')
        ->get();
        $bill_detail_count = BillTable::where('status', 1)
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->selectRaw('sum(paymented) as sum, count(id) as count')
        ->get();
        $customer_count = BillTable::groupBy('customer_id')
        ->selectRaw('customer_id')
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->get()
        ->count('customer_id');
        return view('admin.home', compact('bill_count', 'bill_detail_count', 'customer_count'));
    }

    public function product(Request $request){
        if($request->id == 0){
            $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
            ->join('products', 'products.id', '=', 'bill_table_details.product_id')
            ->whereMonth('bill_table_details.updated_at', Carbon::now()->format('m'))
            ->whereYear('bill_table_details.updated_at', Carbon::now()->format('Y'))
            ->selectRaw('sum(bill_table_details.total) as sum, products.name')->orderBy('sum','DESC')->limit(10)->get();
        } else {
            $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
            ->join('products', 'products.id', '=', 'bill_table_details.product_id')
            ->whereMonth('bill_table_details.updated_at', Carbon::now()->format('m'))
            ->whereYear('bill_table_details.updated_at', Carbon::now()->format('Y'))
            ->selectRaw('sum(bill_table_details.real_quantity) as sum, products.name')->orderBy('sum','DESC')->limit(10)->get();
        }
        return response()->json($data);
    }

    public function getProductByMonth(){
        $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
        ->join('products', 'products.id', '=', 'bill_table_details.product_id')
        ->selectRaw('sum(bill_table_details.real_quantity) as sum, products.name')
        ->whereMonth('bill_table_details.updated_at', Carbon::now()->format('m'))
        ->whereYear('bill_table_details.updated_at', Carbon::now()->format('Y'))
        ->orderBy('sum','DESC')->limit(10)->get();
        return response()->json($data);
    }

    public function revenueByDay(){

        $thu = BillTable::select('paymented')
        ->whereMonth('bill_tables.updated_at', Carbon::now()->format('m'))
        ->whereYear('bill_tables.updated_at', Carbon::now()->format('Y'))
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->get()->sum('paymented');
        $chi = BillProduct::select('total')
        ->whereMonth('bill_products.updated_at', Carbon::now()->format('m'))
        ->whereYear('bill_products.updated_at', Carbon::now()->format('Y'))
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->get()->sum('total');
        $data = $thu - $chi;
        return response()->json($data);
    }
}
