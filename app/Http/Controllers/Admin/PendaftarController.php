<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lembaga;
use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class PendaftarController extends Controller
{

    public function baru()
    {
        $users = User::with('lembaga')
            ->where('roles', 'user')
            ->whereNull('lembaga_id')
            ->get();
        return view('admin.pendaftar.baru', compact('users'));
    }

    public function tpa()
    {
        $users = User::with('lembaga')
            ->where('lembaga_id', 1)
            ->where('roles', 'user')
            ->get();
        return view('admin.pendaftar.tpa', compact('users'));
    }

    public function tpq()
    {
        $users = User::with('lembaga')
            ->where('lembaga_id', 2)
            ->where('roles', 'user')
            ->get();
        return view('admin.pendaftar.tpq', compact('users'));
    }

    public function madin()
    {
        $users = User::with('lembaga')
            ->where('lembaga_id', 3)
            ->where('roles', 'user')
            ->get();
        return view('admin.pendaftar.madin', compact('users'));
    }

    public function detail($id)
    {
        $user = User::with('lembaga')->findOrFail($id);
        return view('admin.pendaftar.detail', compact('user'));
    }

    public function confirm($id)
    {
        try {
            User::findOrFail($id)->update(['status' => '1']);
            session()->flash('status', 'Pendaftar berhasil dikonfirmasi');
            return redirect()->back($id);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('status', 'User ' . $user->name . ' Berhasil dihapus');
        return redirect()->back();
    }
}
