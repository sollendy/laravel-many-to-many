<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['PHP', 'HTML', 'CSS', 'JS', 'BOOTSTRAP', 'VUE', 'VITE', 'LARAVEL'];

        foreach($technologies as $technology ) {
            
            $newTechnology = new Technology();

            $newTechnology->name = $technology;

            $newTechnology->save();
        }
    }
}
