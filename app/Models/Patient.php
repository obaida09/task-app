<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function your_patients()
    {
        if(auth()->user()->is_admin == 1) {
            return Patient::first();
        }
        // return Patient::where('user_id', auth()->user()->id);
        return auth()->user()->patients();
    }
    
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
