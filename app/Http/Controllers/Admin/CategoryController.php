<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $image = null;
        $banner = null;

        if ($request->hasFile('image')) {

            $image = time() . '_' . $request->image->getClientOriginalName();

            $request->image->move(public_path('uploads/categories'), $image);
        }

        if ($request->hasFile('banner')) {

            $banner = time() . '_banner_' . $request->banner->getClientOriginalName();

            $request->banner->move(public_path('uploads/categories'), $banner);
        }

        Category::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'image' => $image,

            'banner' => $banner,

            'description' => $request->description,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'status' => $request->status,

            'show_home' => $request->show_home,

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $image = $category->image;
        $banner = $category->banner;

        if ($request->hasFile('image')) {

            if ($image && File::exists(public_path('uploads/categories/' . $image))) {
                File::delete(public_path('uploads/categories/' . $image));
            }

            $image = time() . '_' . $request->image->getClientOriginalName();

            $request->image->move(public_path('uploads/categories'), $image);
        }

        if ($request->hasFile('banner')) {

            if ($banner && File::exists(public_path('uploads/categories/' . $banner))) {
                File::delete(public_path('uploads/categories/' . $banner));
            }

            $banner = time() . '_' . $request->banner->getClientOriginalName();

            $request->banner->move(public_path('uploads/categories'), $banner);
        }

        $category->update([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'image' => $image,

            'banner' => $banner,

            'description' => $request->description,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'status' => $request->status,

            'show_home' => $request->show_home,

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {

            File::delete(public_path('uploads/categories/' . $category->image));
        }

        if ($category->banner) {

            File::delete(public_path('uploads/categories/' . $category->banner));
        }

        $category->delete();

        return back()->with('success', 'Category Deleted');
    }
}
