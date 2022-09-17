<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Patient;
use App\Models\Session;
use App\Models\SessionDetails;
use App\Models\PathologicalCase;
use Carbon\Carbon;
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
        $lastWeek    = Carbon::today()->subDays(7);
        $today       = Carbon::today();
        $nextWeek    = Carbon::now()->addDays(7);
        $nextTowWeek = Carbon::now()->addDays(14);
        $nextMonth   = Carbon::now()->addDays(30);

        if(auth()->user()->is_admin == 1) 
        {
            $healer_count            = User::where('is_admin', '0')->count();
            $healer_lastWeek         = User::where('is_admin', '0')->whereBetween('created_at', [$lastWeek, $today])->count();
            $healer_inactive_count   = User::where('status', '0')->count();
            $patient_count           = Patient::count();
            $patient_lastWeek        = Patient::whereBetween('created_at', [$lastWeek, $today])->count();
            $session_count           = Session::count();
            $session_lastWeek        = Session::whereBetween('created_at', [$lastWeek, $today])->count();
            
            if(Session::your_sessions() != null) {
                $session_today           = Session::your_sessions()->whereDate('date_time', $today)->count();
                $session_nextWeek        = Session::your_sessions()->whereBetween('date_time', [$today, $nextWeek])->count();
                $session_nextTowWeek     = Session::your_sessions()->whereBetween('date_time', [$today, $nextTowWeek])->count();
                $session_nextMonth       = Session::your_sessions()->whereBetween('date_time', [$today, $nextMonth])->count();
            }
            $pathological_case_count = PathologicalCase::count();
            $post_count              = SessionDetails::where('accept', '1')->where('marital_status', 'public')->count();
            $post_inactive_count     = SessionDetails::where('accept', '0')->where('marital_status', 'public')->count();
        }
        else 
        {
            $patient_count        = Patient::your_patients()->count();
            $patient_lastWeek     = Patient::your_patients()->whereBetween('created_at', [$lastWeek, $today])->count();
            $session_not_attended = Session::your_sessions()->where('session_status', 'not_attended')->count();
            $session_attended     = Session::your_sessions()->where('session_status', 'attended')->count();
            $session_pending      = Session::your_sessions()->where('session_status', 'pending')->count();   
            
            if(Session::your_sessions() != null) {
                $session_today           = Session::your_sessions()->whereDate('date_time', $today)->count();
                $session_nextWeek        = Session::your_sessions()->whereBetween('date_time', [$today, $nextWeek])->count();
                $session_nextTowWeek     = Session::your_sessions()->whereBetween('date_time', [$today, $nextTowWeek])->count();
                $session_nextMonth       = Session::your_sessions()->whereBetween('date_time', [$today, $nextMonth])->count();
            }
        }
        return view('home', get_defined_vars());
    }
    
    public function communtiy()
    {
        $session_details = SessionDetails::where('marital_status', 'public')->whereAccept(1)->with('session', 'patient.user')->get();
        return view('communtiy', compact('session_details')) ;
    }
    
    public function inActive()
    {
        $session_details = SessionDetails::where('marital_status', 'public')->whereAccept(0)->with('session', 'patient.user')->get();
        return view('in_active_post', compact('session_details')) ;
    }
    
    public function remove_from_communtiy($id)
    {
        SessionDetails::where('id', $id)->update(array('accept' => false));
        return redirect()->back()->with(['message' => 'Post delete Successfully']);
    }
    
    public function accept_post_communtiy($id)
    {
        SessionDetails::where('id', $id)->update(array('accept' => true));
        return redirect()->back()->with(['message' => 'Post accept Successfully']);
    }
    
    public function session_count($time)
    {
        $today = Carbon::today();
        if($today == $time) {
            $session_today = Session::your_sessions()->whereDate('date_time', $time)->paginate(10);
        }
        $session = Session::your_sessions()->whereBetween('date_time', [$today, $time])->paginate(10);
        return view('get_session', compact('session', 'today', 'time'));
    }
    
}
