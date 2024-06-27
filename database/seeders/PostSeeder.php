<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    protected $data = [
        'Esportes',
        'Eventos',
        'Serviços',
        'Projetos',
        'Negócios',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    }
}
