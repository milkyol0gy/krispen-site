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
            'title' => 'pdf1',
            'url' => 'https://www.w3schools.com/html/html_responsive.asp',
        ]);

        Material::create([
            'title' => 'pdf2',
            'url' => 'https://www.w3schools.com/html/html_responsive.asp',
        ]);
    }
}
