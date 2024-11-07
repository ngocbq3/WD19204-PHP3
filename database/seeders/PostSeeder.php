<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => fake()->text(25),
                'image' => fake()->imageUrl(),
                'description' => fake()->paragraph(1),
                'content' => fake()->paragraph(),
                'view' => rand(1, 1000),
                'category_id' => rand(1, 4),
            ]);
        }
    }
}
