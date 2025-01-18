<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('web.admin.category.index_category', compact('category'));
    }


    public function create()
    {

        return view('web.admin.category.create_category');
    }


    public function store(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        'name_category' => 'required|string|max:255',
        'sub_categories' => 'nullable|array',
        'sub_categories.*' => 'string|max:255',
    ]);

    // Buat kategori utama
    $category = Category::create([
        'name_category' => $validated['name_category'],
    ]);

    // Jika ada subkategori, simpan subkategori ke tabel sub_category
    if (!empty($validated['sub_categories'])) {
        foreach ($validated['sub_categories'] as $subCategory) {
            SubCategory::create([
                'name_category' => $subCategory,
                'id_category' => $category->id_category, // Tambahkan foreign key ke tabel sub_category
            ]);
        }
    }

    return redirect()->back()->with('success', 'Category and subcategories created successfully.');
}


    public function show(string $id)
    {

    }

    public function edit(Category $category)
    {

        return view('web.admin.category.edit_category', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
      
        $validated = $request->validate([
            'name_category' => 'required|string|max:255',
            'sub_categories' => 'nullable|array',
            'sub_categories.*' => 'string|max:255',
            'new_sub_categories' => 'nullable|array',
            'new_sub_categories.*' => 'string|max:255',
            'deleted_sub_categories' => 'nullable|array',
            'deleted_sub_categories.*' => 'integer|exists:sub_category,id_sub_category',
        ]);


        $category->update([
            'name_category' => $validated['name_category'],
        ]);


        if (!empty($validated['sub_categories'])) {
            foreach ($validated['sub_categories'] as $id_sub_category => $name) {
                $subCategory = SubCategory::find($id_sub_category);
                if ($subCategory) {
                    $subCategory->update([
                        'name_category' => $name,
                    ]);
                }
            }
        }


        if (!empty($validated['deleted_sub_categories'])) {
            SubCategory::whereIn('id_sub_category', $validated['deleted_sub_categories'])->delete();
        }


        if (!empty($validated['new_sub_categories'])) {
            foreach ($validated['new_sub_categories'] as $name) {
                SubCategory::create([
                    'id_category' => $category->id_category,
                    'name_category' => $name,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Category and subcategories updated successfully.');
    }




    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
