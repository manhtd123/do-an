<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\CustomersStoreFormRequest;
use App\Http\Requests\CustomersEditFormRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CustomersStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomersStoreFormRequest $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->sex = $request->sex;
        $customer->rank = 0;
        $customer->birthday = $request->birthday;
        if($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->move(config('app.link_customer'), $filename);
            $customer->avatar = $filename;
        } else {
            $customer->avatar = 'default_avatar.png';
        }
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Thêm khách hàng thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CustomersEditFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomersEditFormRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->birthday = $request->birthday;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->back()->withSuccess('Sửa khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Xóa khách hàng thành công');
    }
}
