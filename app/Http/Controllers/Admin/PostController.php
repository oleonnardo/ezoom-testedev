<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SavePost;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    protected $postRepository;

    protected $categoryRepository;

    public function __construct(PostService $postService,
                                PostRepository $postRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->postService = $postService;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all(['order' => 'desc']);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all()->pluck('name', 'id');

        return view('admin.posts.create', compact('categories'));
    }

    public function store(SavePost $request)
    {
        $this->postService->create($request->validated());

        toastr()->success(__('Post salvo com sucesso.'));

        return redirect()->route('adm.posts.index');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
