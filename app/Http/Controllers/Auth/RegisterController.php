<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                    => 'nullable',
            'age'                     => 'nullable',
            'side_dominance'          => 'nullable',
            'sex'                     => 'nullable',
            'email'                   => 'nullable|email|unique:users',
            'password'                => 'nullable',
            'mobile'                  => 'nullable|min:8',
            'treatments'              => 'nullable',
            'symptom'                 => 'nullable',
            'function'                => 'nullable',
            'emotions_plan'           => 'nullable',
            'connected_beliefs'       => 'nullable',
            'meta_meaning'            => 'nullable',
            'udin_moment'             => 'nullable',
            'vakogs'                  => 'nullable',
            'symptoms'                => 'nullable',
            'regeneration_trigger'    => 'nullable',
            'regeneration_symptoms_a' => 'nullable',
            'healing_symptoms'        => 'nullable',
            'regeneration_symptoms_b' => 'nullable',
            'meta_practice'           => 'nullable',
            'action'                  => 'nullable',
            'follow_up'               => 'nullable',
            'information'             => 'nullable',
            'associations'            => 'nullable',
            'status'                  => 'nullable',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'gendor' => $data['gendor'],
        //     'mobile' => $data['mobile'],
        //     'age' => $data['age'],
        //     'academic_achievement' => $data['academic_achievement'],
        //     'password' => Hash::make($data['password']),
        // ]);
        
        
        $data['password'] = Hash::make($data['password']);
        unset($data['password_confirmation']);
        // dd($data);
        return User::create($data);
    }
}
