<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionDetailsFiles extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function session_details()
    {
        return $this->belongsTo(SessionDetails::class);
    }
    
    public function accept()
    {
        return $query->whereAccept(true);
    }
}
