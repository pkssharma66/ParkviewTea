<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('status', 1);

        // Search
        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Category
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // Price
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        switch ($request->sort) {

            case 'price_low':
                $query->orderBy('price');
                break;

            case 'price_high':
                $query->orderByDesc('price');
                break;

            case 'name':
                $query->orderBy('name');
                break;

            default:
                $query->latest();
        }

        $products = $query->paginate(12);

        $categories = Category::where('status', 1)->get();

        return view('frontend.shop.index', compact(
            'products',
            'categories'
        ));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->paginate(12);

        $categories = Category::where('status', 1)->get();

        return view('frontend.shop.index', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function show($slug)
    {
        $product = Product::with('images', 'category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('frontend.shop.details', compact(
            'product',
            'relatedProducts'
        ));
    }
}
