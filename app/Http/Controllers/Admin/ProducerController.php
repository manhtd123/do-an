<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierGroup;
use App\Http\Requests\SuppliersStoreFormRequest;
use App\Http\Requests\SuppliersEditFormRequest;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = Supplier::all();
        return view('admin.producer.index', compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = SupplierGroup::all();
        return view('admin.producer.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SuppliersStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuppliersStoreFormRequest $request)
    {
        $producer = new Supplier;
        $producer->name = $request->name;
        $producer->address = $request->address;
        $producer->phone = $request->phone;
        $producer->info = $request->infosup;
        $producer->supplier_group_id = $request->group;
        $producer->save();
        return redirect()->route('producer.index')->with('success', 'Tạo nhà cung cấp thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = Supplier::findOrFail($id);
        $groups = SupplierGroup::all();
        return view('admin.producer.edit', compact('producer', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SuppliersEditFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuppliersEditFormRequest $request, $id)
    {
        $producer = Supplier::findOrFail($id);
        $producer->name = $request->name;
        $producer->address = $request->address;
        $producer->phone = $request->phone;
        $producer->info = $request->infosup;
        $producer->supplier_group_id = $request->group;
        $producer->save();
        return redirect()->back()->with('success', 'Cập nhật nhà cung cấp thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = Supplier::findOrFail($id);
        $producer->delete();
        $producer->save();
        return redirect()->route('producer.index')->with('success', 'Xóa nhà cung cấp thành công');
    }

    public function createGroup(Request $request){
        $group = new SupplierGroup;
        $group->name = $request->namencc;
        $group->info = $request->info;
        $group->status = 0;
        $group->save();
        return redirect()->back()->with('success', 'Thêm nhóm nhà cung cấp thành công');
    }
}
