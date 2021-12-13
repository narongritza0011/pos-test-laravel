<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', ['users' => $users]);
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
        // return $request->all();

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = md5($request->name);
        $users->is_admin = $request->is_admin;
        $users->save();

        if ($users) {
            return redirect()->back()->with('เพิ่มสมาชิกสำเร็จ');
        }
        return redirect()->back()->with('เพิ่มสมาชิกไม่สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request, $request->id);
        $users = User::find($id);
        if (!$users) {
            return back()->with('Error', 'ไม่เจอผู้ใช้นี้');
        }

        $users->update($request->all());
        return back()->with('Success', 'เเก้ไขข้อมูลผู้ใช้สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users = User::find($id);
        if (!$users) {
            return back()->with('Error', 'ไม่เจอผู้ใช้นี้');
        }

        $users->delete();
        return back()->with('Success', 'เเก้ไขข้อมูลผู้ใช้สำเร็จ');
    }
}
