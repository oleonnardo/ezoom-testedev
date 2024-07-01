<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategoryRepository implements RepositoryInterface
{
    public function all(array $filter = [])
    {
        return Category::filter($filter)
            ->withCount('posts')
            ->orderBy('id', Arr::get($filter, 'order', 'asc'))
            ->when(
                Arr::get($filter, 'paginate'),
                function ($query) {
                    return $query->paginate();
                },
                function ($query) {
                    $query->get();
                }
            );
    }

    public function getById(int $id)
    {
        return Category::with('posts')->find($id);
    }

    public function save(array $attributes): Model
    {
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

    public function withPosts($limit_posts = 3)
    {
        return Category::with(
            [
                'posts' => function (HasMany $query) use ($limit_posts) {
                    $query
                        ->take($limit_posts)
                        ->where('active', '=', 1);
                }
            ])
            ->whereHas('posts')
            ->where('highlight', '=', 1)
            ->where('active', '=', 1)
            ->get();
    }
}
