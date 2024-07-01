<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostRepository implements RepositoryInterface
{
    public function all(array $filter = [])
    {
        return Posts::with('category')
            ->filter($filter)
            ->orderBy('id', Arr::get($filter, 'order', 'asc'))
            ->paginate();
    }

    public function getById(int $id)
    {
        return Posts::with('category')->find($id);
    }

    public function save(array $attributes): Model
    {
        $attributes['slug'] = Str::slug($attributes['title']) . '-' . now()->format('His');
        return Posts::create($attributes);
    }

    public function update(int $id, array $attributes): Model
    {
        $model = Posts::find($id);
        $model->update($attributes);
        return $model;
    }

    public function delete(int $id): bool
    {
        return Posts::destroy($id) === 1;
    }

    public function featuredPosts($limit = 5)
    {
        return Posts::with('category')
            ->where('highlight', '=', 1)
            ->where('active', '=', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', '=', 1);
            })
            ->take($limit)
            ->orderByDesc('id')
            //->latest()
            ->get();
    }
}
