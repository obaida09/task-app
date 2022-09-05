<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
     
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function status()
    {
        return $this->status ? 'Active' : 'inActive';
    }
    
    public function healers()
    {
        return User::where('is_admin', false);
    }
    
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    public function sessions()
    {
        return $this->hasManyThrough(Session::class, Patient::class, 'user_id', 'patient_id', 'id', 'id');
    }
}
