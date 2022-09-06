<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Patient;
use App\Models\Session;
use App\Models\sessionDetails;
use App\Models\PathologicalCase;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastWeek = \Carbon\Carbon::today()->subDays(7);
        $today = \Carbon\Carbon::today();

        $healer_count      = User::where('is_admin', '0')->count();
        $healer_lastWeek   = User::where('is_admin', '0')->whereBetween('created_at', [$lastWeek, $today])->count();
        
        $patient_count     = Patient::count();
        $patient_lastWeek  = Patient::whereBetween('created_at', [$lastWeek, $today])->count();
        
        $session_count     = Session::count();
        $session_lastWeek  = Session::whereBetween('created_at', [$lastWeek, $today])->count();
        
        $pathological_case_count = PathologicalCase::count();
        return view('home', get_defined_vars());
    }
    
    public function communtiy()
    {
        $session_details = sessionDetails::where('marital_status', 'public')->with('session', 'patient.user')->get();
        return view('communtiy', compact('session_details')) ;
    }
}
