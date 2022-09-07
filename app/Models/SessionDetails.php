<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class SessionDetails extends Model
{
    use HasFactory, Commentable;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    
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
    }
    
    public function patient()
    {
        return $this->belongsToThrough(Patient::class, Session::class);
    }
}
