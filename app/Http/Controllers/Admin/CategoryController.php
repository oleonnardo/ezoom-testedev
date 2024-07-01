<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveCategory;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->all([
            'order' => 'desc',
            'paginate' => true,
            ...$request->all()
        ]);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(SaveCategory $request)
    {
        $this->categoryRepository->save($request->validated());

        $this->toastrSuccess('Categoria salva com sucesso.');

        return redirect()->route('adm.categories.index');
    }

    public function edit(Category $category)
    {
        if (empty($category)) {
            $this->toastrError('Categoria não encontrada.');
            return redirect()->route('adm.categories.index');
        }

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, SaveCategory $request)
    {
        if (empty($category)) {
            $this->toastrError('Categoria não encontrada.');
            return redirect()->route('adm.categories.index');
        }

        $this->categoryRepository->update($category->id, $request->validated());

        $this->toastrSuccess('Categoria modificada com sucesso.');

        return redirect()->route('adm.categories.edit', $category->id);
    }

    public function activeToggle(Category $category)
    {
        if (empty($category)) {
            $this->toastrError('Categoria não encontrada.');
            return redirect()->route('adm.categories.index');
        }

        $category = $this->categoryRepository->update($category->id, [
            'active' => ! $category->active
        ]);

        $this->toastrSuccess('A categoria foi modificada com sucesso.');

        return redirect()->route('adm.categories.index');
    }

    public function highlightToggle(Category $category)
    {
        if (empty($category)) {
            $this->toastrError('Categoria não encontrada.');
            return redirect()->route('adm.categories.index');
        }

        $category = $this->categoryRepository->update($category->id, [
            'highlight' => ! $category->highlight
        ]);

        if ($category->highlight) {
            $this->toastrSuccess('A categoria está destacada na página inicial.');
        } else {
            $this->toastrSuccess('A categoria foi removida da lista de destaques.');
        }

        return redirect()->route('adm.categories.index');
    }
}
