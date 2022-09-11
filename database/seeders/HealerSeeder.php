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
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'status' => 1,
            'is_admin' => 1,
            'password' => bcrypt('admin200'),
        ]);
    
        User::create([
            'name' => 'Healer-1',
            'email' => 'healer@gmail.com',
            'email_verified_at' => now(),
            'status' => 1,
            'password' => bcrypt('admin200'),
        ]);
        
        User::create([
            'name' => 'Healer-2',
            'email' => 'healer2@gmail.com',
            'email_verified_at' => now(),
            'status' => 1,
            'password' => bcrypt('admin200'),
        ]);
    }
}
