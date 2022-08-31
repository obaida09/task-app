<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Patient;
use App\DataTables\SessionsDatatable;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SessionsDatatable $session)
    {
        return $session->render('sessions.index');
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
        return redirect()->route('session.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $patient = Patient::your_patients()->get();
        return view('sessions.edit', compact('patient', 'session'));
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
        $session->update($request->validated());
        return redirect()->route('session.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('session.index');
    }
}
