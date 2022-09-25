<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    
    protected $guarded = [];
    
    public function your_sessions()
    {
        if(auth()->user()->is_admin == 1) {
            return Session::first();
        }
        return auth()->user()->sessions();
    }
    
    public function user()
    {
        return $this->belongsToThrough(User::class, Patient::class);
    }
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
    public function sessionDetails()
    {
        return $this->hasMany(SessionDetails::class);
    }
}
