<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SessionDetails;

class SessionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SessionDetails::factory()->times(100)->create();
    }
}
