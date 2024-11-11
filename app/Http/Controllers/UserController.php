<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {

        $data = User::where('type', 'admin')->get();
        return view('admin.pages.users.list', compact('data'));
    }

    public function add()
    {
        return view('admin.pages.users.add');
    }

    public function save(Request $request)
    {

        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' =>  Hash::make($request->password),
            'type' => 'admin',
        ];

        $rt = User::create($data);

        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('users');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::where("id", $id)->get();
        if (count($user) > 0) {
            $data = User::where("id", $id)->first();
            return view('admin.pages.users.edit', compact('data'));
        }
        return redirect()->route('users');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $request->id,
            'name' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'username' => $request->username,
        ];
        if ($request->password && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $rt = User::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('users');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = User::where("id", $id)->get();
        if (count($user) > 0) {
            User::where("id", $id)->delete();
            return redirect()->route('users')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('users');
    }
}
