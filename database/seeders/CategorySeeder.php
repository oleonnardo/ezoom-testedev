<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Category::factory()->withData('Esportes', '#42B073')->create();
        Category::factory()->withData('Eventos', '#9B836B')->create();
        Category::factory()->withData('Serviços', '#24BEFF')->create();
        Category::factory()->withData('Projetos', '#FF632D')->create();
        Category::factory()->withData('Negócios', '#FFD400', true)->create();
    }
}
