<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                "name" => "HTML",
                "logo_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png"
            ],[
                "name" => "CSS",
                "logo_url" => "https://1000logos.net/wp-content/uploads/2020/09/CSS-Logo.png"
            ],[
                "name" => "JavaScript",
                "logo_url" => "https://static.vecteezy.com/system/resources/previews/027/127/463/non_2x/javascript-logo-javascript-icon-transparent-free-png.png"
            ],[
                "name" => "Vue.js",
                "logo_url" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR18b4GbU8VzbtJ48KifFLmAVE1VvrkfKi8vA&s"
            ],[
                "name" => "Node.js",
                "logo_url" => "https://cdn.pixabay.com/photo/2015/04/23/17/41/node-js-736399_960_720.png"
            ],[
                "name" => "PHP",
                "logo_url" => "https://www.svgrepo.com/show/303656/php-logo.svg"
            ],[
                "name" => "Laravel",
                "logo_url" => "https://download.logo.wine/logo/Laravel/Laravel-Logo.wine.png"
            ]
        ];

        foreach ($languages as $language) {
            Technology::create($language);
        }
    }
}
