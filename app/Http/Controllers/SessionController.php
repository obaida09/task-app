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
        return $session->render('sessions.index');
    }


    public function create()
    {
        $patient = Patient::your_patients()->get();
        return view('sessions.create', compact('patient'));
    }


    public function store(StoreSessionRequest $request)
    {
    // dd($request->all());
        foreach ($request->date_time as $item) {
            $data = [
                'date_time'      => $item,
                'patient_id'     => $request->patient_id,
                'session_status' => $request->session_status,
                'payment_status' => $request->payment_status,
            ];
            $session = Session::create($data);
            $patient = Patient::where('id' , $session->patient_id)->first();
            $patient->update(['patient_debts' => $request->patient_debts]);
        }
        if($request->is_print == 'on') {
            $data = [
                'healer_name'    => $patient->user()->first()->name,
                'session_price'  => $patient->user()->first()->session_price ,
                'patient_name'   => $patient->name,
                'patient_mobile' => $patient->mobile,
                'date'           => Carbon::now()->format('Y/m/d'),
                'sessions_num'   => $request->sessions_num,
                'priceBefore'    => $request->priceBefore,
                'discount'       => $request->discount,
                'priceAfter'     => $request->priceAfter,
                'notes'          => $request->notes,
            ];
            return view('sessions.pdf', compact('data'));
        }
        return redirect()->route('session.index')->with('message','Session created successfully');
    }


    public function show(Session $session)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session->patient()->first()->user_id)
        {  
            $patient = $session->patient()->first();
            $sessions_details = SessionDetails::where('session_id', $session->id)->paginate(10);
            return view('sessions.show', compact('patient', 'session', 'sessions_details'));
        }
        return redirect('session');

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
