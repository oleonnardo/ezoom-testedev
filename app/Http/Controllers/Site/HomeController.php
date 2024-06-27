<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class HomeController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(PostRepository $postRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function home()
    {
        $postsByCategory = $this->categoryRepository->withPosts();

        $highlights = $this->postRepository->featuredPosts();

        return view('site.home.index', compact('highlights', 'postsByCategory'));
    }
}
