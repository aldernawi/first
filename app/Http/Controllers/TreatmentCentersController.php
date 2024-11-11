<?php

namespace App\Http\Controllers;

use App\Models\treatmentCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TreatmentCentersController extends Controller
{
    //
    public function index()
    {
        $data = treatmentCenters::where('status', 'active')->get();
        return view('admin.pages.treatmentCenters.list', compact('data'));
    }

    public function add()
    {
        return view('admin.pages.treatmentCenters.add');
    }

    public function save(Request $request)
    {
        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
        ]);

        $data = $request->only([
            'name',
            'phone',
            'adress'
        ]);

        $rt = treatmentCenters::create($data);
        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('treatmentCenters');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = treatmentCenters::where("id", $id)->get();
        if (count($user) > 0) {
            $data = treatmentCenters::where("id", $id)->first();
            return view('admin.pages.treatmentCenters.edit', compact('data'));
        }
        return redirect()->route('treatmentCenters');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
        ]);

        $data = $request->only([
            'name',
            'phone',
            'adress'
        ]);

        $rt = treatmentCenters::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('treatmentCenters');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = treatmentCenters::where("id", $id)->get();
        if (count($user) > 0) {
            treatmentCenters::where("id", $id)->delete();
            return redirect()->route('treatmentCenters')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('treatmentCenters');
    }
}
