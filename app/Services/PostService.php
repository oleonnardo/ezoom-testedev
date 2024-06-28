<?php

namespace App\Services;

use App\Models\Posts;
use App\Repositories\PostRepository;

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
}
