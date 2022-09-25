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
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class SessionDetailsController extends Controller
{

    public function index(SessionsDetailsDatatable $sessionDetails)
    {
        return $sessionDetails->render('sessions_details.index');
    }


    public function create()
    {
        $session = Session::your_sessions()->get();
        return view('sessions_details.create', compact('session'));
    }


    public function store(StoreSessionDetailsRequest $request)
    {
        $data = $request->validated();
        if(isset( $data['files'])){
            $dataFiles = $data['files'];
        }
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


    public function show($id)
    {
        $session_details = SessionDetails::find($id);
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session_details->patient()->first()->user_id)
        {
            return view('sessions_details.show', compact('session_details'));
        }
        return redirect('session_details');
    }


    public function edit($id)
    {
        $session_details = SessionDetails::whereId($id)->with('sessionDetailsFiles')->first();
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session_details->patient()->first()->user_id)
        {    
            $session = Session::your_sessions()->get();
            return view('sessions_details.edit', compact('session', 'session_details'));
        }
        return redirect('session_details');
    }


    public function update(UpdateSessionDetailsRequest $request, $id)
    {
        $session_details = SessionDetails::find($id);
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session_details->patient()->first()->user_id)
        {   
            $data = $request->validated();
            if(isset( $data['files'])){
                $dataFiles = $data['files'];
            }
            unset($data['files']);
            $data['marital_status'] == 'public' ? $data['posted_at'] = Carbon::now() : '';

            $session_details->update($data);

            if($request->hasFile('files')) {
                foreach ($dataFiles as $file) {
                    $fileName = time() . $file->getClientOriginalName();
                    $file->move('assets/files/session_details/' , $fileName); 
                    SessionDetailsFiles::create([
                        'name' => $fileName,
                        'user_id' => auth()->user()->id,
                        'session_details_id' => $session_details->id,
                      ]);
                }
            }
            
            return redirect()->route('session_details.index')->with('message','Session Details updated successfully');
        }
        return redirect('session_details');
    }


    public function destroy($id)
    {
        $session_details = SessionDetails::find($id);
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $session_details->patient()->first()->user_id)
        {   
            $session_details->delete();
            return redirect()->route('session_details.index')->with('message','Session Details deleted successfully');
        }
        return redirect('session_details');
    }
    
    public function pdf($id)
    {
        $session_details = SessionDetails::whereId($id)->with('patient', 'session')->first();
        $date_time = str_replace('-', '/', strtok($session_details->session['date_time'], ' '));
        return view('sessions_details.pdf', compact('session_details', 'date_time'));
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
