<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Http\Requests\UsersStoreFormRequest;
use App\Http\Requests\UsersEditFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $UsersStoreFormRequest
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreFormRequest $request)
    {
        // $validator = \Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'repassword' => 'required',
        // ]);
        
        // if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->avatar = 'default_avatar.png';
        $user->department_id = $request->department;
        $user->save();
        return redirect()->route('user.index')->with('success', 'Thêm tài khoản thành công');
        // return response()->json(['success'=>'Data is successfully added']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        $selectedParts = $user->department()->pluck('id')->toArray();

        return view('admin.users.edit',compact('user', 'departments', 'selectedParts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->department_id = $request->department;
        $user->save();
        return redirect()->back()->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Xóa thành công');
    }
}
