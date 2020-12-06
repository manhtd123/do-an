<?php

namespace App\Http\Controllers\User\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Booking;
use DB;
use App\Models\BillTableDetail;
use App\Models\BillTable;
use App\Models\Category;
use Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $bookings = Booking::where('status', 0)->orWhere('status', 1)->get();
        $categories = Category::all();
        return view('User.cashier.index', compact('products', 'bookings', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new BillTable;
        $data->date = $request->date;
        $data->customer_id = $request->customer_id;
        $data->status = 0;
        $data->user_id = Auth::user()->id;
        $data->booking_id = $request->booking_id;
        $data->paymented = $request->paymented;
        $quantityunit = $request->quantityunit;
        $unittotal = $request->unittotal;
        $product_id = $request->product_id;
        $data->save();
        $billDetails = array();
        for($i = 0; $i < $request->count; $i++){
            $billDetail = new BillTableDetail(array('quantity' => $quantityunit[$i], 'total' => $unittotal[$i], 'product_id' => $product_id[$i], 'bill_table_id' => $data->id, 'status' => 0));
            $billDetail->save();
            $billDetails[] = $billDetail;
            $product = Product::where('id', $product_id[$i])->first();
            $product->quantity -= $quantityunit[$i];
            $product->save();
        }
        $booking = Booking::findOrFail($request->booking_id);
        $booking->status = 1;
        $booking->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Booking::findOrFail($id);

        return respone()->json($data);
    }

    public function getBooking(Request $request)
    {
        $data = Product::findOrFail($request->product);
        return response ()->json( $data );
    }

    public function getTable(Request $request)
    {
        $data = Booking::select('bookings.id as booking_id','customers.name as name', 'bookings.customer_id', 'bookings.people_number', 'bookings.time')->where('bookings.id', $request->book)->leftjoin('customers', 'bookings.customer_id', '=', 'customers.id')   
        ->get();
        return response ()->json( $data);
    }

    public function getMenu(Request $request)
    {
        
        if($request->category == 0){
            $data = Product::all();
        } else {
            $data = Product::where('category_id', $request->category)->get();
        }
        return response ()->json( $data);
    }

    public function getDetailBill(Request $request) {
        $data = BillTable::select('products.name as nameproduct', 'bill_table_details.quantity as quantityunit', 'bill_table_details.total as totalunit', 'products.sale_price as saleprice', 'bill_table_details.id as proid')
        ->where('customer_id', $request->customer_id)->where('booking_id', $request->booking_id)->where('bill_tables.status', 0)
        ->leftjoin('bill_table_details', 'bill_tables.id', '=', 'bill_table_details.bill_table_id')
        ->leftjoin('products', 'bill_table_details.product_id', '=', 'products.id')
        ->get();
        return response()->json($data);
    }

    public function updatePayment(Request $request) {
        $booking = Booking::findOrFail($request->bookid);
        $billTable = BillTable::where('booking_id', $request->bookid)->first();
        $billTable->status = 1;
        $booking->status = 2;
        $booking->save();
        $billTable->save();
        return $booking;
    }

    public function homePage(){
        $data = Product::all();
        return response()->json($data);
    }
}
