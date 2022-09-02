<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionDetails extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    
    public function your_sessions_details()
    {
        if(auth()->user()->is_admin == 1) {
            return SessionDetails::first();
        }
        return SessionDetails::where('session_id', auth()->user()->sessions()->first()->id);
        return auth()->user()->sessions();
    }
}
