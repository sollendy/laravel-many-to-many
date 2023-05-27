<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['PHP', 'HTML', 'CSS', 'JS', 'BOOTSTRAP', 'VUE', 'VITE', 'LARAVEL'];

        foreach($technologies as $technology ) {
            
            $newTechnology = new Technology();

            $newTechnology->name = $technology;

            // $newTechnology->color = $faker->colorName();

            $newTechnology->slug = Str::slug($newTechnology->name, '-');

            $newTechnology->save();
        }
    }
}
