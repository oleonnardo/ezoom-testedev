<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\PostService;

class HomeController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function home()
    {
        $posts = [];

        $categories = [];

        return view('site.home.index', compact('categories'));
    }
}
