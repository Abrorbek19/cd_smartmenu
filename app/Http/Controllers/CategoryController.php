<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Client;

class CategoryController extends Controller
{
    public function index()
    {

        $user_id = Client::where('user_id', auth()->id())->first();
        $categories = Category::where('client_id', $user_id->id)->orderBy('id', 'asc')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $clients = Client::with('user')->get();
        return view('admin.category.create', compact("clients"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $client = Client::where('user_id', auth()->id())->first();
//        return $client;
//        return $request->all();
        Category::create([
            'client_id' => $client->id,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'status' => Status::ACTIVE,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.update', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
