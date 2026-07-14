<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index',compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if(!$setting){
            $setting=new Setting();
        }

        $setting->site_name=$request->site_name;
        $setting->email=$request->email;
        $setting->phone=$request->phone;
        $setting->whatsapp=$request->whatsapp;
        $setting->address=$request->address;
        $setting->facebook=$request->facebook;
        $setting->instagram=$request->instagram;
        $setting->youtube=$request->youtube;
        $setting->linkedin=$request->linkedin;
        $setting->twitter=$request->twitter;
        $setting->footer_about=$request->footer_about;
        $setting->meta_description=$request->meta_description;
        $setting->meta_keywords=$request->meta_keywords;

        if($request->hasFile('logo')){

            $logo=time().'_logo.'.$request->logo->extension();

            $request->logo->move(public_path('uploads/settings'),$logo);

            $setting->logo=$logo;

        }

        if($request->hasFile('favicon')){

            $fav=time().'_favicon.'.$request->favicon->extension();

            $request->favicon->move(public_path('uploads/settings'),$fav);

            $setting->favicon=$fav;

        }

        $setting->save();

        return back()->with('success','Settings Updated Successfully');
    }
}