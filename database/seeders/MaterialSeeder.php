<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([
                'title' => 'pdf 1',
                'url' => 'https://laravel.com/docs/10.x',
                'description' => 'laravel',
                'published_date' => Carbon::parse('2023-02-14'),
                'created_at' => now(),
                'updated_at' => now(),

        ]);

        Material::create([
                'title' => 'pdf 2',
                'url' => 'https://laracasts.com/series/laravel-8-from-scratch',
                'description' => 'test',
                'published_date' => Carbon::parse('2022-11-08'),
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
