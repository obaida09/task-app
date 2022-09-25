<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Session;
use App\DataTables\PatientDatatable;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PatientDatatable $patient)
    {
        return $patient->render('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Patient::create($data);
        return redirect()->route('patient.index')->with('message','Patient created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $patient->user_id)
        {
            $sessions = Session::where('patient_id', $patient->id)->paginate(10);
            return view('patients.show', compact('patient', 'sessions'));
        }
        return redirect('patient');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $patient->user_id)
        {
            return view('patients.edit', compact('patient'));
        }
        return redirect('patient');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $patient->user_id)
        {
            $data = $request->validated();
            $patient->update($data);
            return redirect()->route('patient.index')->with('message','Patient updated successfully');
        }
        return redirect('patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $patient->user_id)
        {
            $patient->delete();
            return redirect()->route('patient.index')->with('message','Patient deleted successfully');
        }
        return redirect('patient');
    }
}
