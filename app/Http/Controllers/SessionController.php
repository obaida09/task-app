<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Patient;
use App\Models\SessionDetails;
use Illuminate\Http\Request;
use App\DataTables\SessionsDatatable;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use Carbon\Carbon;

class SessionController extends Controller
{

    public function index(SessionsDatatable $session)
    {
        $from_date = date('2020-01-01 00:00:00');
        $to_date = Carbon::now();
        return $session->with([
                'from' => $from_date,
                'to' => $to_date,
            ])
            ->render('sessions.index');
    }


    public function create()
    {
        $patient = Patient::your_patients()->get();
        return view('sessions.create', compact('patient'));
    }


    public function store(StoreSessionRequest $request)
    {
        foreach ($request->date_time as $item) {
            $data = [
                'date_time'      => $item,
                'patient_id'     => $request->patient_id,
                'session_status' => $request->session_status,
                'payment_status' => $request->payment_status,
            ];
            Session::create($data);
        }
        return redirect()->route('session.index')->with('message','Session created successfully');
    }


    public function show(Session $session)
    {
        $sessions_details = SessionDetails::where('session_id', $session->id)->get();
        return view('sessions.show', compact('session', 'sessions_details'));
    }


    public function edit(Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {    
            $patient = Patient::your_patients()->get();
            return view('sessions.edit', compact('patient', 'session'));
        }
        return redirect('session');        
    }


    public function update(UpdateSessionRequest $request, Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {        
            $session->update($request->validated());
            return redirect()->route('session.index')->with('message','Session updated successfully');
        }
        return redirect('session');
    }


    public function destroy(Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {        
            $session->delete();
            return redirect()->route('session.index')->with('message','Session deleted successfully');
        }
        return redirect('session');   
    }
    
    public function session_today()
    {        
        $session_today = Session::whereDate('date_time', Carbon::today())->get();
        return view('sessions.today', compact('session_today'));
    }
}
