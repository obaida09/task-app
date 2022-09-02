<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class HealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Obaida',
            'academic_achievement' => 'doctor',
            'age' => '30',
            'gendor' => 'famle',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'mobile' => '07724389401',
            'status' => 1,
            'is_admin' => 1,
            'password' => bcrypt('admin200'),
        ]);
    
        User::create([
            'name' => 'Healer-1',
            'academic_achievement' => 'doctor',
            'age' => '30',
            'gendor' => 'famle',
            'email' => 'healer@gmail.com',
            'email_verified_at' => now(),
            'mobile' => '077243892',
            'status' => 1,
            'password' => bcrypt('healer123'),
        ]);
        
        User::create([
            'name' => 'Healer-2',
            'academic_achievement' => 'doctor',
            'age' => '30',
            'gendor' => 'male',
            'email' => 'healer2@gmail.com',
            'email_verified_at' => now(),
            'mobile' => '077243894',
            'status' => 1,
            'password' => bcrypt('healer123'),
        ]);
    }
}
