<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teatchers;
use Illuminate\Http\Request;

class DashController extends Controller
{
    //

    public function index()
    {
        $students = 0;
        $tet = 0;
        $ser = 0;
        $req = 0;

        return view('admin.pages.home', compact('students', 'tet', 'ser', 'req'));
    }
}
