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
            'title' => 'Laravel Documentation',
            'url' => 'https://laravel.com/docs/10.x',
        ]);

        Material::create([
            'title' => 'Laravel Tutorial Series',
            'url' => 'https://laracasts.com/series/laravel-8-from-scratch',
        ]);

        Material::create([
            'title' => 'PHP Best Practices',
            'url' => 'https://www.php.net/manual/en/',
        ]);
    }
}
