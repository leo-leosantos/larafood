<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
    }

    public function index()
    {
        $categories = $this->repository->latest()->paginate();

        return view('admin.pages.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.pages.categories.create');
    }


    public function store(StoreUpdateCategory $request)
    {


        $this->repository->create($request->all());

        return redirect()->route('categories.index')->with('message','Categoria Cadastrada com Sucesso');
    }


    public function show($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back()->with('error', 'item nao localizado');
        }
        return view('admin.pages.categories.show', compact('category'));
    }


    public function edit($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back()->with('error', 'item nao localizado');
        }
        return view('admin.pages.categories.edit', compact('category'));
    }


    public function update(StoreUpdateCategory $request, $id)
    {

        if (!$category = $this->repository->find($id)) {
            return redirect()->back()->with('error', 'item nao localizado');
        }

         $category->update($request->all());

        return redirect()->route('categories.index')->with('message','Categoria Editada com Sucesso');

    }


    public function destroy($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back()->with('error', 'item nao localizado');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('message','Categoria deletada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');


        $categories = $this->repository->where(function ($query) use ($request) {
            if ($request->filter) {
                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                $query->orWhere('name', $request->filter);
            }
        })->latest()->paginate();

        return view('admin.pages.categories.index', compact('categories', 'filters'));
    }
}
