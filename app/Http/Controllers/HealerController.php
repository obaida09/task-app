<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\DataTables\HealerDatatable;
use App\Http\Requests\StoreHealerRequest;
use App\Http\Requests\UpdateHealerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\HealerActivatedNotification;
use App\Notifications\HealerNotfy;

class HealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except(['edit', 'update']); 
    }


    public function index(HealerDatatable $healer)
    {
        return $healer->render('healers.index');
    }


    public function create()
    {
        return view('healers.create');
    }


    public function store(StoreHealerRequest $request)
    {
        $data = $request->validated();
        // Add Hash Password
        $data['password'] = Hash::make($request->password);
        $newHealer = User::create($data);
        
        // Send Email To Healer when i Created his account
        $newHealer->notify(new HealerActivatedNotification($newHealer));
        return redirect()->route('healer.index')->with('message','Healer created successfully');
    }


    public function show(User $healer)
    {
        $patients = Patient::where('user_id', $healer->id)->paginate(10);
        return view('healers.show', compact('healer', 'patients'));
    }


    public function edit(User $healer)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $healer->id)
        {     
            return view('healers.edit', compact('healer'));
        }
        return redirect('healer');
    }


    public function update(UpdateHealerRequest $request, User $healer)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $healer->id)
        {
            $data = $request->validated();
            unset($data['password']);
            // Add Password to data
            trim($request->password) != '' ? $data['password'] = Hash::make($request->password) : '';
            $healerStatus = $healer->status;
            
            $healer->update($data);

            // Send Email To Healer when i Activated his account
            if(auth()->user()->is_admin == 1) {
                $data['status'] == 1 and $healerStatus == 0 ? $healer->notify(new HealerActivatedNotification($healer)) : '';
            }
            return redirect()->back()->with('message','Healer updated successfully!');
        }
        return redirect('healer');
    }


    public function destroy(User $healer)
    {
        if(auth()->user()->is_admin == 1 or auth()->user()->id == $healer->id)
        {    
            $healer->delete();
            return redirect()->route('healer.index')->with('message','Healer deleted successfully');
        }
        return redirect('healer');
    }
}
