<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        // IMPORTANTE
        // logica criada aqui apenas para seguir o template (deixar igual)

        // criando 3 posts para categoria EVENTOS
        foreach (range(1, 3) as $key) {
            Posts::factory()->withCategory(2, $key)->create();
            sleep(1);
        }

        // criando 4 posts para categoria NEGÓCIOS
        foreach (range(1, 4) as $key) {
            Posts::factory()->withCategory(5, $key)->setHighlight($key == 4)->create();
            sleep(1);
        }

        // criando 4 posts para categoria PROJETOS
        foreach (range(1, 4) as $key) {
            Posts::factory()->withCategory(4, $key)->setHighlight($key == 4)->create();
            sleep(1);
        }

        // criando 3 posts para categoria ESPORTES
        foreach (range(1, 3) as $key) {
            Posts::factory()->withCategory(1, $key)->setHighlight($key == 1)->create();
            sleep(1);
        }

        // criando 4 posts para categoria SERVIÇOS
        foreach (range(1, 4) as $key) {
            Posts::factory()->withCategory(3, $key)->setHighlight($key == 4)->create();
            sleep(1);
        }

        // criando 3 posts de destaque para categoria ESPORTES
        Posts::factory()->withCategory(1, 4)->setHighlight()->create();
    }
}
