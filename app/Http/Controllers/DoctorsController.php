<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\specialties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DoctorsController extends Controller
{
    //
    public function index()
    {
        $data = doctors::where('status', 'active')->get();
        return view('admin.pages.doctors.list', compact('data'));
    }

    public function add()
    {
        $sp = specialties::where('status', 'active')->get();
        return view('admin.pages.doctors.add', compact('sp'));
    }

    public function save(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $userdata = [
            'name' => $request->name,
            'username' => $request->username,
            'password' =>  Hash::make($request->password),
            'type' => 'doctor',
        ];

        $user = User::create($userdata);

        $data = $request->only([
            'specialties_id',
            'dateofbrith',
            'gender',
            'adress',
            'phone',
            'note',
            'user_id',
        ]);

        $data['user_id'] = $user->id;

        $rt = doctors::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('doctors');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = doctors::where("id", $id)->get();
        if (count($user) > 0) {
            $data = doctors::where("id", $id)->first();

            $sp = specialties::where('status', 'active')->get();


            return view('admin.pages.doctors.edit', compact('data', 'sp'));
        }
        return redirect()->route('doctors');
    }

    public function update(Request $request)
    {
        $p = doctors::where("id", $request->id)->first();

        $request->validate([
            'username' => 'required|unique:users,username,' . $p->user_id,
            'name' => 'required',
        ]);

        $userdata = [
            'name' => $request->name,
            'username' => $request->username,
        ];
        if ($request->password && !empty($request->password)) {
            $userdata['password'] = Hash::make($request->password);
        }
        $user = User::where("id", $request->id)->update($userdata);

        $data = $request->only([
            'specialties_id',
            'dateofbrith',
            'gender',
            'adress',
            'phone',
            'note',
        ]);

        $rt = doctors::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('doctors');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = doctors::where("id", $id)->get();
        if (count($user) > 0) {
            doctors::where("id", $id)->delete();
            return redirect()->route('doctors')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('doctors');
    }
}
