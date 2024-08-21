<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = [
            [
                'name' => 'html-css-spotifyweb',
                'project_created_at' => Carbon::create(2024, 3, 15),
                'note' => 'Pagina di spotify web, senza js',
            ],[
                'name' => 'js-fizzbuzz',
                'project_created_at' => Carbon::create(2024, 4, 10),
                'note' => 'Cosina mooooolto carina.',
            ],[
                'name' => 'js-campominato-dom',
                'project_created_at' => Carbon::create(2024, 4, 20),
                'note' => 'Gioco del campominato, se trovi la bomba perdi.',
            ],[
                'name' => 'proj-html-vuejs',
                'project_created_at' => Carbon::create(2024, 5, 04),
                'note' => 'Bellissimo Lavoro di gruppo.',
            ],[
                'name' => 'vite-comics',
                'project_created_at' => Carbon::create(2024, 5, 8),
                'note' => 'Sito fatto con framework Vite.',
            ],[
                'name' => 'vue-boolzapp',
                'project_created_at' => Carbon::create(2024, 5, 10),
                'note' => 'Replica di whatsapp.',
            ],[
                'name' => 'laravel-comics',
                'project_created_at' => Carbon::create(2024, 7, 10),
                'note' => 'Cambiamento da Vite a Laravel.',
            ],[
                'name' => 'laravel-base-crud',
                'project_created_at' => Carbon::create(2024, 7, 25),
                'note' => 'Lavoro su laravel sulle CRUD fatto a dovere.',
            ],

        ];

        $types = Type::all()->pluck('id')->toArray();



        foreach ($projects as $project) {
            $project['type_id'] = $faker->randomElement($types);
            Project::create($project);
        }

        // Devo prendere i miei progetti e seedarli nel db.
        // for ($i=0; $i < 20; $i++) {
        //     $newProject = new Project();
        //     $newProject->name = $faker->firstName();
        //     $newProject->project_created_at = $faker->date();
        //     $newProject->languages_programming_used = implode(' ', $faker->words(3));
        //     $newProject->image_url = $faker->imageUrl(640, 480);
        //     $newProject->note = $faker->realText(200);
        //     $newProject->save();
        // }

    }
}
