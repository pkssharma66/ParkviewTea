<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        //dd("index");
        $banners=Banner::latest()->get();

        return view('admin.banners.index',compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required',

            'image'=>'required|image'

        ]);

        $image='';

        if($request->hasFile('image'))
        {
            $image=time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/banners'),$image);
        }

        Banner::create([

            'title'=>$request->title,

            'subtitle'=>$request->subtitle,

            'image'=>$image,

            'button_text'=>$request->button_text,

            'button_link'=>$request->button_link,

            'sort_order'=>$request->sort_order,

            'status'=>$request->status

        ]);

        return redirect()
        ->route('admin.banners.index')
        ->with('success','Banner Added Successfully');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    public function update(Request $request,Banner $banner)
    {

        $image=$banner->image;

        if($request->hasFile('image'))
        {

            if(file_exists(public_path('uploads/banners/'.$banner->image)))
            {
                unlink(public_path('uploads/banners/'.$banner->image));
            }

            $image=time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/banners'),$image);

        }

        $banner->update([

            'title'=>$request->title,

            'subtitle'=>$request->subtitle,

            'image'=>$image,

            'button_text'=>$request->button_text,

            'button_link'=>$request->button_link,

            'sort_order'=>$request->sort_order,

            'status'=>$request->status

        ]);

        return redirect()
        ->route('admin.banners.index')
        ->with('success','Banner Updated');
    }

    public function destroy(Banner $banner)
    {

        if(file_exists(public_path('uploads/banners/'.$banner->image)))
        {
            unlink(public_path('uploads/banners/'.$banner->image));
        }

        $banner->delete();

        return back()->with('success','Deleted');
    }
}