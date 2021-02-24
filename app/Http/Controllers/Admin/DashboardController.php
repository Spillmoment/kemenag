<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $tpa = User::with('lembaga')
            ->where('lembaga_id', 1)
            ->count();
        $tpq = User::with('lembaga')
            ->where('lembaga_id', 2)
            ->count();
        $madin = User::with('lembaga')
            ->where('lembaga_id', 3)
            ->count();

        $widget = [
            'users' => $users,
            'tpa' => $tpa,
            'tpq' => $tpq,
            'madin' => $madin
        ];

        return view('admin.dashboard.index', compact('widget'));
    }

    public function profile()
    {
        return view('admin.dashboard.profile');
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('admin.profile')->with(['status' => 'Profil berhasil diupdate']);
    }
}
