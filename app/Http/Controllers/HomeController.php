<?php

namespace App\Http\Controllers;

use App\Models\treatmentCenters;
use App\Models\patients;
use App\Models\User;
use App\Models\patients_dignses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $treatmentCenter=treatmentCenters::count();
        $patients=patients::count();
        $dignes=patients_dignses::count();
        $users=User::where ('type', 'admin')->count();

        return view('admin.pages.home',compact('treatmentCenter','patients','users','dignes') );
    }
    public function statistic()
    {
        $treatmentCenter=treatmentCenters::count();
        $patients=patients::count();
        $dignes=patients_dignses::count();
        $users=User::where ('type', 'admin')->count();

        return view('admin.pages.statistics.statistic',compact('treatmentCenter','patients','users','dignes') );  
    }
}
