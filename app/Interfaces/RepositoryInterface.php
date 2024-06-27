<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(array $filter = []);

    public function getById(int $id);

    public function save(array $attributes): Model;

    public function update(int $id, array $attributes): Model;

    public function delete(int $id): bool;
}
