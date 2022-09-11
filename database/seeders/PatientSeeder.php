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
            'sex' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'side_dominance' => 'left',
            'mobile' => '077243892',
            'user_id' => 2,
        ]);
        
        Patient::create([
            'name' => 'patient-2',
            'age' => '34',
            'sex' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'side_dominance' => 'left',
            'mobile' => '077243892',
            'user_id' => 2,
        ]);
        
        Patient::create([
            'name' => 'patient-3',
            'age' => '38',
            'sex' => 'famle',
            'address' => 'Iraq-Diyala Gov',
            'side_dominance' => 'left',
            'mobile' => '077243892',
            'user_id' => 3,
        ]);
        
        Patient::create([
            'name' => 'patient-4',
            'age' => '40',
            'sex' => 'male',
            'address' => 'Iraq-Diyala Gov',
            'side_dominance' => 'left',
            'mobile' => '077243892',
            'user_id' => 3,
        ]);
    }
}
