<?php

namespace App\Http\Controllers;

use App\Models\SessionDetails;
use App\Models\Session;
use App\Models\SessionDetailsFiles;
use Illuminate\Support\Facades\File;
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
        $dataFiles = $data['files'];
        unset($data['files']);
        $data['marital_status'] == 'public' ? $data['posted_at'] = Carbon::now() : '';

        $id = SessionDetails::create($data);
        
        if($request->hasFile('files')) {
            foreach ($dataFiles as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $file->move('assets/files/session_details/' , $fileName); 
                SessionDetailsFiles::create([
                    'name' => $fileName,
                    'user_id' => auth()->user()->id,
                    'session_details_id' => $id->id,
                  ]);
            }
        }
        return redirect()->route('session_details.index')->with('message','Session Details created successfully');
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
        $session_details = $session_details->with('sessionDetailsFiles')->first();
        $session = Session::your_sessions()->get();
        return view('sessions_details.edit', compact('session', 'session_details'));
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
        $dataFiles = $data['files'];
        unset($data['files']);
        $data['marital_status'] == 'public' ? $data['posted_at'] = Carbon::now() : '';
        
        $sessionDetails->update($data);
        
        if($request->hasFile('files')) {
            foreach ($dataFiles as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $file->move('assets/files/session_details/' , $fileName); 
                SessionDetailsFiles::create([
                    'name' => $fileName,
                    'user_id' => auth()->user()->id,
                    'session_details_id' => $sessionDetails->first()->id,
                  ]);
            }
        }
        
        return redirect()->route('session_details.index')->with('message','Session Details updated successfully');
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
        return redirect()->route('session_details.index')->with('message','Session Details deleted successfully');
    }
    
    public function remove_file($id)
    {
        $item = SessionDetailsFiles::find($id);
        if (File::exists('assets/files/session_details/'. $item->name)) {
            unlink('assets/files/session_details/'. $item->name);
        }
        $item->delete();
        return redirect()->back()->with(['message' => 'Deleted file successfully']);
    }
}
