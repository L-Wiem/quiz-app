<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Software Engineering'],
            ['name' => 'Programming Languages'],
            ['name' => 'Operating Systems'],
            ['name' => 'Web Development'],
            ['name' => 'AI and Machine Learning'],
            ['name' => 'Database Systems'],
     ]);
    }
}
