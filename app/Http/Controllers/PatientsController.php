<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\patients_appoiments;
use App\Models\patients_dignses;
use App\Models\patients_medicens;
use App\Models\specialties;
use App\Models\treatmentCenters;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PatientsController extends Controller
{
    //
    public function index()
    {
        $data = patients::where('status', 'active')->get();
        return view('admin.pages.patients.list', compact('data'));
    }

    public function add()
    {
        $tc = treatmentCenters::where('status', 'active')->get();

        return view('admin.pages.patients.add', compact('tc'));
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
            'type' => 'patient',
        ];

        $user = User::create($userdata);

        $data = $request->only([
            'dig',
            'dateofbrith',
            'gender',
            'adress',
            'phone',
            'note',
            'user_id',
            'tc_id'
        ]);

        $data['user_id'] = $user->id;

        $rt = patients::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('patients');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = patients::where("id", $id)->get();
        if (count($user) > 0) {
            $data = patients::where("id", $id)->first();
            $tc = treatmentCenters::where('status', 'active')->get();

            return view('admin.pages.patients.edit', compact('data', 'tc'));
        }
        return redirect()->route('patients');
    }

    public function update(Request $request)
    {
        $p = patients::where("id", $request->id)->first();

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
            'dig',
            'dateofbrith',
            'gender',
            'adress',
            'phone',
            'note',
            'tc_id'
        ]);

        $rt = patients::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('patients');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = patients::where("id", $id)->get();
        if (count($user) > 0) {
            patients::where("id", $id)->delete();
            return redirect()->route('patients')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('patients');
    }


    public function profile($id)
    {
        $data = patients::where('id', $id)->first();
        $app = patients_appoiments::where('pation_id', $id)->get();
        $dig = patients_dignses::where('pation_id', $id)->get();
        $mid = patients_medicens::where('pation_id', $id)->get();



        return view('admin.pages.patients.profile', compact('data', 'app', 'dig','mid'));
    }
    public function save_appoiments(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'note' => 'required',
            'date' => 'required',
        ]);


        $data = $request->only([
            'pation_id',
            'doctor_id',
            'tc_id',
            'date',
            'note',
            'status',
        ]);

        $rt = patients_appoiments::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->back();
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    // dig
    public function save_dignses(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'note' => 'required',
            'dig' => 'required',
        ]);

        $data = $request->only([
            'pation_id',
            'doctor_id',
            'tc_id',
            'dig',
            'note',
            'status'
        ]);

        $rt = patients_dignses::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->back();
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function patients_mid_save(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'med_id' => 'required',
            'times' => 'required',
        ]);

        $data = $request->only([
            'pation_id',
            'doctor_id',
            'med_id',
            'tc_id',
            'times',
            'status'
        ]);

        $rt = patients_medicens::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->back();
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }
}
