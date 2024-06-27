<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategoryRepository implements RepositoryInterface
{
    public function all(array $filter = [])
    {
        return Category::filter($filter)->paginate();
    }

    public function getById(int $id)
    {
        return Category::with('posts')->find($id);
    }

    public function save(array $attributes): Model
    {
        $attributes['slug'] = now()->format('His') . Str::slug($attributes['title']);
        return Category::create($attributes);
    }

    public function update(int $id, array $attributes): Model
    {
        $model = Category::find($id);
        $model->update($attributes);
        return $model;
    }

    public function delete(int $id): bool
    {
        return Category::destroy($id) === 1;
    }
}
