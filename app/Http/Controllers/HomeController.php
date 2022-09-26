<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Patient;
use App\Models\Session;
use App\Models\SessionDetails;
use App\Models\PathologicalCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\HealerNotfy;

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
            
            if(auth()->user()->sessions() != null) {
                $session_today           = auth()->user()->sessions()->whereDate('date_time', $today)->count();
                $session_nextWeek        = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextWeek])->count();
                $session_nextTowWeek     = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextTowWeek])->count();
                $session_nextMonth       = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextMonth])->count();
            }
            $pathological_case_count = PathologicalCase::count();
            $post_count              = SessionDetails::where('accept', '1')->where('marital_status', 'public')->count();
            $post_inactive_count     = SessionDetails::where('accept', '0')->where('marital_status', 'public')->count();
        }
        else 
        {
            $patient_count        = Patient::your_patients()->count();
            $patient_lastWeek     = Patient::your_patients()->whereBetween('created_at', [$lastWeek, $today])->count();
            $session_not_attended = auth()->user()->sessions()->where('session_status', 'not_attended')->count();
            $session_attended     = auth()->user()->sessions()->where('session_status', 'attended')->count();
            $session_pending      = auth()->user()->sessions()->where('session_status', 'pending')->count();   
            
            if(auth()->user()->sessions() != null) {
                $session_today           = auth()->user()->sessions()->whereDate('date_time', $today)->count();
                $session_nextWeek        = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextWeek])->count();
                $session_nextTowWeek     = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextTowWeek])->count();
                $session_nextMonth       = auth()->user()->sessions()->whereBetween('date_time', [$today, $nextMonth])->count();
            }
        }
        return view('home', get_defined_vars());
    }
    
    public function session_count($time)
    {    
        $today = Carbon::today();
        if($today == $time) {
            $session = auth()->user()->sessions()->whereDate('date_time', $time)->paginate(10);
        }else{
            $session = auth()->user()->sessions()->whereBetween('date_time', [$today, $time])->paginate(10);
        }
        $time  = str_replace('-', '/', strtok($time, ' '));
        $today = str_replace('-', '/', strtok($today, ' '));
        return view('get_session', compact('session', 'today', 'time'));
    }
    
    public function communtiy()
    {
        $session_details = SessionDetails::where('marital_status', 'public')->whereAccept(1)->with('session', 'patient.user')->orderBy('posted_at', 'desc')->paginate(20);
        return view('communtiy', compact('session_details')) ;
    }
    
    public function inActive()
    {
        $session_details = SessionDetails::where('marital_status', 'public')->whereAccept(0)->with('session', 'patient.user')->orderBy('posted_at', 'desc')->get();
        return view('in_active_post', compact('session_details')) ;
    }
    
    public function remove_from_communtiy($id)
    {
        $sessionDetails = SessionDetails::whereId($id)->first();
        $sessionDetails->update(array('marital_status' => 'private'));
        
        // Send Notification to Healer
        $owner_user = $sessionDetails->patient()->first()->user()->first();
        $owner['id']      = $owner_user->id; 
        $owner['name']    = $owner_user->name; 
        $owner['email']   = $owner_user->email;
        $owner['message'] = 'Your Post has been removed by admin';
        $owner_user->notify(new HealerNotfy($owner));
        
        return redirect()->back()->with(['message' => 'Post delete Successfully']);
    }
    
    public function accept_post_communtiy($id)
    {
        $sessionDetails = SessionDetails::whereId($id)->first();
        $sessionDetails->update(['accept' => true, 'posted_at' => Carbon::now()]);
        
        // Send Notification to Healers           
        $owner_user = $sessionDetails->patient()->first()->user()->first();
        $owner['id']      = $owner_user->id; 
        $owner['name']    = $owner_user->name; 
        $owner['email']   = $owner_user->email;
        $owner['message'] = 'new Post in communtiy';
        
        $healers = User::where('id', '!=', $owner['id'] )->get();
        Notification::send($healers, new HealerNotfy($owner));
        
        $healer = User::whereId($owner['id'])->first();
        $owner['message'] = 'Your Post is Accepted';
        $healer->notify(new HealerNotfy($owner));
        return redirect()->back()->with(['message' => 'Post accept Successfully']);
    }
    
    public function get_notifications()
    {
        return auth()->user()->notifications;
    }
    
}
