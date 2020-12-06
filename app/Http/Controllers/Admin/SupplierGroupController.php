<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierGroup;

class SupplierGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = SupplierGroup::where('status', 0)->get();
        return view('admin.producer.group.index', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new SupplierGroup;
        $group->name = $request->namencc;
        $group->info = $request->info;
        $group->status = 0;
        $group->save();
        return redirect()->back()->with('success', 'Thêm nhà cung cấp thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = SupplierGroup::findOrFail($id);
        return view('admin.producer.group.edit', compact('group'));
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
        $group = SupplierGroup::findOrFail($id);
        $group->name = $request->name;
        $group->info = $request->info;
        $group->save();
        return redirect()->back()->with('success','Chỉnh sửa thành công');
    }
}
