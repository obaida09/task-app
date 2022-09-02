<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'name' => 'patient-1',
            'age' => '60',
            'gendor' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'domination' => 'left_handed',
            'mobile' => '077243892',
            'user_id' => 2,
        ]);
        
        Patient::create([
            'name' => 'patient-2',
            'age' => '34',
            'gendor' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'domination' => 'left_handed',
            'mobile' => '077243892',
            'user_id' => 2,
        ]);
        
        Patient::create([
            'name' => 'patient-3',
            'age' => '38',
            'gendor' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'domination' => 'left_handed',
            'mobile' => '077243892',
            'user_id' => 3,
        ]);
        
        Patient::create([
            'name' => 'patient-4',
            'age' => '40',
            'gendor' => 'male',
            'address' => 'Iraq-Diyala Gov',
            'domination' => 'left_handed',
            'mobile' => '077243892',
            'user_id' => 3,
        ]);
    }
}
