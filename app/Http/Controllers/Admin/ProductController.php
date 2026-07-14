<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')
                    ->latest()
                    ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status',1)->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_id'=>'required',

            'name'=>'required',

            'price'=>'required|numeric',

            'stock'=>'required|integer',

            'thumbnail'=>'required|image'

        ]);

        $thumbnail = null;

        if($request->hasFile('thumbnail')){

            $thumbnail=time().'.'.$request->thumbnail->extension();

            $request->thumbnail->move(public_path('uploads/products'),$thumbnail);

        }

        $product=Product::create([

            'category_id'=>$request->category_id,

            'name'=>$request->name,

            'slug'=>Str::slug($request->name),

            'sku'=>$request->sku,

            'barcode'=>$request->barcode,

            'price'=>$request->price,

            'sale_price'=>$request->sale_price,

            'stock'=>$request->stock,

            'thumbnail'=>$thumbnail,

            'description'=>$request->description,

            'featured'=>$request->featured ?? 0,

            'trending'=>$request->trending ?? 0,

            'best_seller'=>$request->best_seller ?? 0,

            'status'=>$request->status,

            'meta_title'=>$request->meta_title,

            'meta_description'=>$request->meta_description

        ]);

        if($request->hasFile('images')){

            foreach($request->images as $img){

                $name=time().rand().'.'.$img->extension();

                $img->move(public_path('uploads/products'),$name);

                ProductImage::create([

                    'product_id'=>$product->id,

                    'image'=>$name

                ]);

            }

        }

        return redirect()->route('admin.products.index')
            ->with('success','Product Added Successfully');

    }

    public function edit($id)
{
    $product = Product::findOrFail($id);

    $categories = Category::where('status', 1)->get();

    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $thumbnail = $product->thumbnail;

    if ($request->hasFile('thumbnail')) {

        if ($thumbnail && file_exists(public_path('uploads/products/' . $thumbnail))) {
            unlink(public_path('uploads/products/' . $thumbnail));
        }

        $thumbnail = time() . '.' . $request->thumbnail->extension();

        $request->thumbnail->move(public_path('uploads/products'), $thumbnail);
    }

    $product->update([

        'category_id' => $request->category_id,
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'sku' => $request->sku,
        'barcode' => $request->barcode,
        'price' => $request->price,
        'sale_price' => $request->sale_price,
        'stock' => $request->stock,
        'thumbnail' => $thumbnail,
        'description' => $request->description,
        'featured' => $request->featured ?? 0,
        'trending' => $request->trending ?? 0,
        'best_seller' => $request->best_seller ?? 0,
        'status' => $request->status,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
    ]);

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product Updated Successfully');
}
public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->thumbnail && file_exists(public_path('uploads/products/' . $product->thumbnail))) {
        unlink(public_path('uploads/products/' . $product->thumbnail));
    }

    $product->delete();

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product Deleted Successfully');
}
public function show($id)
{
    $product = Product::findOrFail($id);

    return view('admin.products.show', compact('product'));
}

}