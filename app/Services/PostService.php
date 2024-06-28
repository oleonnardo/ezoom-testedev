<?php

namespace App\Services;

use App\Models\Posts;
use App\Repositories\PostRepository;
use Illuminate\Support\Arr;

class PostService
{
    protected $repository;

    protected $fileService;

    public function __construct(PostRepository $repository,
                                FileService $fileService)
    {
        $this->repository = $repository;
        $this->fileService = $fileService;
    }

    public function create(array $attributes)
    {
        $attributes['image'] = $this->fileService->save($attributes['image'], Posts::$imageFolder);

        return $this->repository->save($attributes);
    }

    public function update(Posts $post, array $attributes)
    {
        if (Arr::exists($attributes, 'image')) {
            $attributes['image'] = $this->fileService->save($attributes['image'], Posts::$imageFolder);
            $this->fileService->delete($post->image);
        }

        return $this->repository->update($post->id, $attributes);
    }

    public function delete(Posts $post)
    {
        $this->fileService->delete($post->image);

        return $this->repository->delete($post->id);
    }
}
