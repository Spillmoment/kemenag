<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lembaga;
use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use App\Surat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

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

    public function madin()
    {
        $users = User::with('lembaga')
            ->where('lembaga_id', 2)
            ->where('roles', 'user')
            ->get();
        return view('admin.pendaftar.madin', compact('users'));
    }

    public function majelis_taklim()
    {
        $users = User::with('lembaga')
            ->where('lembaga_id', 3)
            ->where('roles', 'user')
            ->get();
        return view('admin.pendaftar.majelis', compact('users'));
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

    public function password($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pendaftar.ubah_password', compact('user'));
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
            'password'              => 'sometimes|nullable|min:8|max:12|',
            'konfirmasi_password'   => 'sometimes|same:password|nullable|min:8|max:12|',
        ]);

        $user = User::findOrFail($id);

        if ($request->input('password')) {
            $user->password = $request->password;
        }

        $user->save();
        return redirect()->back()->with(['status' => 'Password berhasil diupdate']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user->surat->file != null) {
            unlink(storage_path('app/public/file/' . $user->surat->file));
        }

        if ($user->foto_kegiatan != null) {
            unlink(storage_path('app/public/fotoKegiatan/' . $user->foto_kegiatan));
        }

        if ($user->jadwal_kegiatan != null) {
            unlink(storage_path('app/public/jadwalKegiatan/' . $user->jadwal_kegiatan));
        }

        if ($user->susunan_pengurus != null) {
            unlink(storage_path('app/public/susunanPengurus/' . $user->susunanPengurus));
        }

        Surat::where('id', $user->surat_id)->delete();

        session()->flash('status', 'User ' . $user->name . ' Berhasil dihapus');
        return redirect()->back();
    }
}
