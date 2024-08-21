<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    public function run(): void
    {
        $types = [
        [
            'name' => 'Landing Page'
        ],[
            'name' => 'Web Application'],
        [
            'name' => 'Portfolio/Personal Website'
        ],[
            'name' => 'Blog/News Website'
        ],[
            'name' => 'API Backend'
        ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
