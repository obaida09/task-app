<?php

namespace App\Http\Controllers;

use App\Models\SessionDetails;
use App\Models\Session;
use App\Models\SessionDetailsFiles;
use App\DataTables\SessionsDetailsDatatable;
use App\Http\Requests\StoreSessionDetailsRequest;
use App\Http\Requests\UpdateSessionDetailsRequest;
use Carbon\Carbon;

class SessionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SessionsDetailsDatatable $sessionDetails)
    {
        return $sessionDetails->render('sessions_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session = Session::your_sessions()->get();
        return view('sessions_details.create', compact('session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionDetailsRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('files')) {
            foreach ($data['files'] as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $file->move('assets/files/session_details/' . auth()->user()->name . '/' , $fileName);
                
                // SessionDetailsFiles::create([
                //     'session_details_id' => $product->id,
                //     'name' => $newName,
                // ]);
            }
        }
        dd(rand(125, 2322));
        if($data['marital_status'] == 'public')
        {         
            $data['posted_at'] = Carbon::now();
        }
        SessionDetails::create($data);
        return redirect()->route('session_details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SessionDetails  $sessionDetails
     * @return \Illuminate\Http\Response
     */
    public function show(SessionDetails $sessionDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionDetails  $sessionDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionDetails $session_details)
    {
    // dd($session_details->first()->session_id);
    $session_details = $session_details->first();
    //     if(auth()->user()->is_admin == 1 or auth()->user()->sessions()->first()->id == $session->patient()->first()->user_id)
    //     {     
            $session = Session::your_sessions()->get();
            return view('sessions_details.edit', compact('session', 'session_details'));
        // }
        // return redirect('session');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionDetailsRequest  $request
     * @param  \App\Models\SessionDetails  $sessionDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionDetailsRequest $request, SessionDetails $sessionDetails)
    {
        $data = $request->validated();
        if($data['marital_status'] == 'public')
        {         
            $data['posted_at'] = Carbon::now();
        }
        $sessionDetails->update($data);
        return redirect()->route('session_details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SessionDetails  $sessionDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(SessionDetails $session_detailss)
    {
        dd($session_detailss->first()->offer);
        $session_details->delete();
        return redirect()->route('session_details.index');
    }
}
