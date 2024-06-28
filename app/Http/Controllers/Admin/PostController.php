<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SavePost;
use App\Models\Posts;
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

        $this->toastrSuccess('Post salvo com sucesso.');

        return redirect()->route('adm.posts.index');
    }

    public function edit(Posts $post)
    {
        if (empty($post)) {
            $this->toastrError('Post não encontrado.');
            return redirect()->route('adm.posts.index');
        }

        $categories = $this->categoryRepository->all()->pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Posts $post, SavePost $request)
    {
        if (empty($post)) {
            $this->toastrError('Post não encontrado.');
            return redirect()->route('adm.posts.index');
        }

        $this->postService->update($post, $request->validated());

        $this->toastrSuccess('Post modificado com sucesso.');

        return redirect()->route('adm.posts.edit', $post->id);
    }

    public function destroy(Posts $post)
    {
        if (empty($post)) {
            $this->toastrError('Post não encontrado.');
            return redirect()->route('adm.posts.index');
        }

        $this->postService->delete($post);

        $this->toastrSuccess('Post removido com sucesso.');

        return redirect()->route('adm.posts.index');
    }

    public function activeToggle(Posts $post)
    {
        if (empty($post)) {
            $this->toastrError('Post não encontrado.');
            return redirect()->route('adm.posts.index');
        }

        $this->postRepository->update($post->id, [
            'active' => ! $post->active
        ]);

        $this->toastrSuccess('Status do post modificado com sucesso.');

        return redirect()->route('adm.posts.index');
    }
}
