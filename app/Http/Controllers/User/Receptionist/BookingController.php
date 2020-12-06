<?php

namespace App\Http\Controllers\User\receptionist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Table;
use App\Http\Requests\BookingsStoreFormRequest;
use App\Http\Requests\BookingsEditFormRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_waits = Booking::where('status', 0)->get();
        $book_refuses = Booking::where('status', 2)->get();
        return view('User.receptionist.index', compact('book_waits', 'book_refuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $tables = Table::where('status', 0)->get();
        return view('User.receptionist.create', compact('customers', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookingsStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingsStoreFormRequest $request)
    {
        $book = new Booking;
        $book->time =$request->time;
        $book->user_id =$request->user_id;
        $book->customer_id =$request->customer;
        $book->table_id =$request->table;
        $book->people_number =$request->people_number;
        $book->status = 0;
        $book->info =$request->info;
        $book->save();
        return redirect()->route('booking.index')->with('success', 'Thêm mới lịch thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $tables = Table::where('status', 0)->get();
        $booking = Booking::findOrFail($id);
        return view('User.receptionist.edit', compact('customers', 'tables', 'booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookingsEditFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingsEditFormRequest $request, $id)
    {
        $book = Booking::findOrFail($id);
        $book->time =$request->time;
        $book->user_id =$request->user_id;
        $book->customer_id =$request->customer;
        $book->table_id =$request->table;
        $book->people_number =$request->people_number;
        $book->status = $request->status;
        $book->info =$request->info;
        $book->save();
        return redirect()->back()->with('success', 'Cập nhật lịch đặt thành công');
    }
}
