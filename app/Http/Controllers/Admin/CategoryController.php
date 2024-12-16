<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::with('parent')->get();
        return view('web.admin.category.index_category', compact('category'));
    }


    public function create()
    {
        $parentCategory = Category::all(); // To populate parent category options
        return view('web.admin.category.create_category', compact('parentCategory'));
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function show(string $id)
    {

    }

    public function edit(Category $category)
    {
        $parentCategory = Category::where('id_category', '!=', $category->id_category)->get();
        return view('web.admin.category.edit_category', compact('category', 'parentCategory'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->back()->with('success', 'Category updated successfully.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
