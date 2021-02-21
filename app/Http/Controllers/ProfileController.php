<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'alamat' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'no_telp' => 'required|string',
            'nama_pimpinan' => 'required|string|max:255',
            'tahun_berdiri' => 'required|date',
            'susunan_pengurus' => 'required|string',
            'nama_pendiri' => 'required|string|max:255',
            'jumlah_guru' => 'required|integer',
            'jumlah_santri' => 'required|integer',
            'tempat_kbm' => 'required|string|max:255',
            'jadwal_kegiatan' => 'required|string',
            'foto_kegiatan' => 'required|string',
            'link_fb' => 'required|string|max:255',
            'link_website' => 'nullable|string|max:255',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->nama_lembaga = $request->input('nama_lembaga');
        $user->email = $request->input('email');
        $user->no_telp = $request->input('no_telp');
        $user->nama_pimpinan = $request->input('nama_pimpinan');
        $user->tahun_berdiri = $request->input('tahun_berdiri');
        $user->susunan_pengurus = $request->input('susunan_pengurus');
        $user->nama_pendiri = $request->input('nama_pendiri');
        $user->jumlah_guru = $request->input('jumlah_guru');
        $user->jumlah_santri = $request->input('jumlah_santri');
        $user->tempat_kbm = $request->input('tempat_kbm');
        $user->jadwal_kegiatan = $request->input('jadwal_kegiatan');
        $user->foto_kegiatan = $request->input('foto_kegiatan');
        $user->link_fb = $request->input('link_fb');
        $user->link_website = $request->input('link_website');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->with(['status' => 'Profil berhasil diupdate']);
    }
}
