<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillTable;
use App\Models\Booking;

class BillTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = BillTable::all();
        return view('admin.deal.table.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billdetails = BillTable::where('bill_tables.id', $id)
        ->select('products.name as nameproduct', 'bill_table_details.real_quantity', 'products.sale_price', 'bill_table_details.total')
        ->join('bill_table_details', 'bill_tables.id', '=', 'bill_table_details.bill_table_id')
        ->join('products', 'products.id', '=', 'bill_table_details.product_id')
        ->get();
        $bill = BillTable::findOrFail($id);
        $booking = Booking::findOrFail($bill->booking_id);
        return view('admin.deal.table.show', compact('billdetails', 'bill', 'booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
