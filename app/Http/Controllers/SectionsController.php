<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Models\treatmentCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionsController extends Controller
{
    //
    public function index()
    {

        $data = sections::with('tc')->where('status', 'active')->get();
        return view('admin.pages.sections.list', compact('data'));
    }

    public function add()
    {
        $tc = treatmentCenters::where('status', 'active')->get();
        return view('admin.pages.sections.add', compact('tc'));
    }

    public function save(Request $request)
    {

        //|regex:/^[\pL\s\-]+$/u
        $request->validate([
            'name' => 'required',
            'tc_id' => 'required',
        ]);

        $data = $request->only([
            'name',
            'tc_id',
        ]);

        $rt = sections::create($data);

        if ($rt) {
            Session::flash('success', "تم تسجيل بيانات المستخدم بنجاح.");
            return redirect()->route('section');
        } else {
            Session::flash('error', "حدث خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = sections::where("id", $id)->get();
        if (count($user) > 0) {
            $data = sections::where("id", $id)->first();
            $tc = treatmentCenters::where('status', 'active')->get();
            return view('admin.pages.sections.edit', compact('data','tc'));
        }
        return redirect()->route('section');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tc_id' => 'required',
        ]);

        $data = $request->only([
            'name',
            'tc_id',
        ]);

        $rt = sections::where("id", $request->id)->update($data);
        if ($rt) {
            Session::flash('success', "تم تعديل بيانات المستخدم بنجاح");
            return redirect()->route('section');
        } else {
            Session::flash('error', "هناك خطأ ما!");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $user = sections::where("id", $id)->get();
        if (count($user) > 0) {
            sections::where("id", $id)->delete();
            return redirect()->route('section')->withErrors(array('success' => 'تم الحذف بنجاح'));
        }
        return redirect()->route('section');
    }
}
