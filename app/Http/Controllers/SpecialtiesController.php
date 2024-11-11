<?php

namespace App\Http\Controllers;

use App\Models\specialties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpecialtiesController extends Controller
{
    //
    public function index()
    {
        $data = specialties::where('status', 'active')->get();
        return view('admin.pages.specialties.list', compact('data'));
    }

    public function add()
    {
        return view('admin.pages.specialties.add');
    }

    public function save(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'name' => 'required',

        ]);

        $data = $request->only([
            'name',

        ]);

        $rt = specialties::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('specialties');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = specialties::where("id", $id)->get();
        if (count($user) > 0) {
            $data = specialties::where("id", $id)->first();
            return view('admin.pages.specialties.edit', compact('data'));
        }
        return redirect()->route('specialties');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $data = $request->only([
            'name',

        ]);

        $rt = specialties::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('specialties');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = specialties::where("id", $id)->get();
        if (count($user) > 0) {
            specialties::where("id", $id)->delete();
            return redirect()->route('specialties')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('specialties');
    }
}
