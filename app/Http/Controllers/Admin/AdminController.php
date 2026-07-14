<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.index', [
            'admin' => auth('admin')->user(),
        ]);
    }

    public function profile()
    {
        $admin = auth('admin')->user();

        return view('admin.profile.index', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth('admin')->user();

        $request->validate([
            'name' => 'required|max:255',
            'mobile' => 'nullable|max:15',
        ]);

        $admin->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = auth('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $admin->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
