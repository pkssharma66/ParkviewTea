<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('frontend.cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){

            $cart[$id]['quantity']++;

        }else{

            $cart[$id]=[
                'id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->thumbnail,
                'quantity'=>1
            ];
        }

        session()->put('cart',$cart);

        return redirect()->back()->with('success','Product added to cart.');
    }

    public function update(Request $request,$id)
    {
        $cart=session()->get('cart',[]);

        if(isset($cart[$id])){

            $cart[$id]['quantity']=$request->quantity;

            session()->put('cart',$cart);

        }

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart=session()->get('cart',[]);

        unset($cart[$id]);

        session()->put('cart',$cart);

        return redirect()->back();
    }
}