<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            Project::create([
                    'title' => $faker->words(rand(2, 10), true),
                    'url_github' => 'https://github.com/GabriellaValentina92?tab=repositories',
                    'project_description' => $faker->paragraphs(rand(2, 10), true),
                    'project_image' => 'https://picsum.photos/id/' . rand(1, 200) . '/300/400',
          
            ]);
        }
    }
}
