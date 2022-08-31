<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\HealerDatatable;
use App\Http\Requests\StoreHealerRequest;
use App\Http\Requests\UpdateHealerRequest;

class HealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except(['edit', 'update']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HealerDatatable $healer)
    {
        return $healer->render('healers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('healers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHealerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHealerRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('healer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Healer  $healer
     * @return \Illuminate\Http\Response
     */
    public function show(Healer $healer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $healer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $healer)
    {  
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $healer->id)
        {
            return view('healers.edit', compact('healer'));
        }
        return redirect('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHealerRequest  $request
     * @param  \App\Models\User  $healer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHealerRequest $request, User $healer)
    {
    
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $healer->id)
        {
            $data = $request->validated();
            unset($data['password']);
            
            // Add Password to data
            trim($request->password) != '' ? $data['password'] = bcrypt($request->password):'';
            
            $healer->update($data);
            return redirect()->route('healer.index');
        }
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $healer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $healer)
    {
        $healer->delete();
        return redirect()->route('healer.index');
    }
}
