<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TableGroup;

class TableGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = TableGroup::all();
        return view('admin.tables.group.index', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new TableGroup;
        $group->name = $request->nameban;
        $group->info = $request->info;
        $group->save();
        return redirect()->back()->with('success', 'Thêm nhóm bàn thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = TableGroup::findOrFail($id);
        return view('admin.tables.group.edit', compact('group'));
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
        $group = TableGroup::findOrFail($id);
        $group->name = $request->name;
        $group->info = $request->info;
        $group->save();
        return redirect()->back()->with('success','Chỉnh sửa thành công');
    }
}
