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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SessionsDatatable $session)
    {
        $date = 'sdgf';
        return $session->with('date', $date)->render('sessions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = Patient::your_patients()->get();
        return view('sessions.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
        Session::create($request->validated());
        return redirect()->route('session.index')->with('message','Session created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        $sessions_details = SessionDetails::where('session_id', $session->id)->get();
        return view('sessions.show', compact('session', 'sessions_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {    
            $patient = Patient::your_patients()->get();
            return view('sessions.edit', compact('patient', 'session'));
        }
        return redirect('session');        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {        
            $session->update($request->validated());
            return redirect()->route('session.index')->with('message','Session updated successfully');
        }
        return redirect('session');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
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
