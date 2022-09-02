<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main Ctegory
        // Category::create(['name' => 'Circulatory system']);
        // Category::create(['name' => 'Digestive system']);
        // Category::create(['name' => 'Endocrine system']);
        // Category::create(['name' => 'Integmenatry system']);
        // Category::create(['name' => 'Immune system']);
        // Category::create(['name' => 'Muscular system']);
        // Category::create(['name' => 'Renal system']);
        // Category::create(['name' => 'Erproductive system']);
        Category::create(['name' => 'Nervous system']);
        Category::create(['name' => 'Respiratory system']);
        // Category::create(['name' => 'Skeletal system']);
        
        
        // Sub Ctegory for Nervous system
        Category::create(['name' => 'Nose and nasal cavity', 'parent_id' => '1']);
        Category::create(['name' => 'Mouth', 'parent_id' => '1']);
        Category::create(['name' => 'Sinuses', 'parent_id' => '1']);
        Category::create(['name' => 'Throat (pharynx)', 'parent_id' => '1']);
        
        // Sub Ctegory for Respiratory system
        Category::create(['name' => 'Nose and nasal cavity', 'parent_id' => '2']);
        Category::create(['name' => 'Mouth', 'parent_id' => '2']);
        Category::create(['name' => 'Sinuses', 'parent_id' => '2']);
        Category::create(['name' => 'Throat (pharynx)', 'parent_id' => '2']);
    }
}
