<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\TableGroup;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = TableGroup::all();
        return view('admin.tables.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Table;
        $table->name = $request->name;
        $table->number_slot = $request->number_slot;
        $table->table_group_id = $request->group;
        $table->info = $request->infosup;
        $table->status = 0;
        $table->save();
        return redirect()->route('table.index')->with('success', 'Tạo bàn thành công');
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
        $table = Table::findOrFail($id);
        $groups = TableGroup::all();
        return view('admin.tables.edit', compact('table', 'groups'));
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
        $table = Table::findOrFail($id);
        $table->name = $request->name;
        $table->number_slot = $request->number_slot;
        $table->table_group_id = $request->group;
        $table->info = $request->info;
        $table->status = $request->status;
        $table->save();
        return redirect()->back()->with('success', 'Chỉnh sửa bàn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        $table->save();
        return redirect()->route('table.index')->with('success', 'Xóa bàn thành công');
    }
}
