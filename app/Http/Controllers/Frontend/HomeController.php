<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $banners = Banner::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $categories = Category::where('status', 1)
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();

        $featuredProducts = Product::where('status', 1)
            ->where('featured', 1)
            ->latest()
            ->take(8)
            ->get();

        // Add this part
        $bestSellerProducts = Product::where('best_seller', 1)
            ->where('status', 1)
            ->take(8)
            ->get();
            
        $trendingProducts = Product::where('trending', 1)
            ->where('status', 1)
            ->take(8)
            ->get();

        $latestProducts = Product::where('status', 1)
            ->latest()
            ->take(8)
            ->get();
        return view('frontend.home.index', compact(
            'setting',
            'banners',
            'categories',
            'featuredProducts',
            'bestSellerProducts',
            'trendingProducts',
            'latestProducts'
        ));
    }
}
