<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class HomeController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        $postsByCategory = [];

        $highlights = $this->postRepository->featuredPosts();

        return view('site.home.index', compact('highlights', 'postsByCategory'));
    }
}
