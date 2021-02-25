<?php

namespace App\Http\Controllers;

use App\Lembaga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $getdata_lembaga = Lembaga::all();
        return view('user.profile', compact('getdata_lembaga'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // 'nama_lembaga' => 'required|string|max:255',
            'lembaga_id' => 'required|exists:lembagas,id',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'no_telp' => 'required|string|digits:12',
            'nama_pimpinan' => 'required|string|max:255',
            'tahun_berdiri' => 'required|date',
            'nama_pendiri' => 'required|string|max:255',
            'jumlah_guru' => 'required|integer|min:0',
            'jumlah_santri' => 'required|integer|min:0',
            'tempat_kbm' => 'required|string|max:255',
            'link_fb' => 'nullable|string|max:255',
            'link_website' => 'nullable|string|max:255',
            'link_gmap' => 'nullable|string|max:255'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->lembaga_id = $request->input('lembaga_id');
        $user->name = $request->input('name');
        $user->alamat = $request->input('alamat');
        $user->no_telp = $request->input('no_telp');
        $user->email = $request->input('email');
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
        $user->link_gmap = $request->input('link_gmap');
        $user->save();

        return redirect()->route('profile')->with(['status' => 'Profil berhasil diupdate']);
    }

    public function files()
    {
        $id_lembaga = Auth::user()->id;
        $cek_file_user = User::findOrFail($id_lembaga);
        return view('user.file', compact('cek_file_user'));
    }

    public function updateFile(Request $request)
    {
        $id_lembaga = Auth::user()->id;
        $cek_file_user = User::findOrFail($id_lembaga);

        if (empty($cek_file_user->susunan_pengurus) && empty($cek_file_user->jadwal_kegiatan) && empty($cek_file_user->foto_kegiatan)) {
            $request->validate([
                'susunan_pengurus' => 'required|mimes:pdf',
                'jadwal_kegiatan' => 'required|mimes:pdf',
                'foto_kegiatan' => 'required|mimes:pdf',
            ]);

            $fullname_sunpeng = $request->file('susunan_pengurus')->getClientOriginalName();
            $fullname_jadkeg = $request->file('jadwal_kegiatan')->getClientOriginalName();
            $fullname_fotokeg = $request->file('foto_kegiatan')->getClientOriginalName();

            $filename_sunpeng = explode('.', $fullname_sunpeng)[0];
            $filename_jadkeg = explode('.', $fullname_jadkeg)[0];
            $filename_fotokeg = explode('.', $fullname_fotokeg)[0];

            $extension_sunpeng = $request->file('susunan_pengurus')->getClientOriginalExtension();
            $extension_jadkeg = $request->file('jadwal_kegiatan')->getClientOriginalExtension();
            $extension_fotokeg = $request->file('foto_kegiatan')->getClientOriginalExtension();

            $add_filename_sunpeng = $filename_sunpeng . '_' . time() . '.' . $extension_sunpeng;
            $add_filename_jadkeg = $filename_jadkeg . '_' . time() . '.' . $extension_jadkeg;
            $add_filename_fotokeg = $filename_fotokeg . '_' . time() . '.' . $extension_fotokeg;

            $path = $request->file('susunan_pengurus')->storeAs('public/susunanPengurus', $add_filename_sunpeng);
            $path = $request->file('jadwal_kegiatan')->storeAs('public/jadwalKegiatan', $add_filename_jadkeg);
            $path = $request->file('foto_kegiatan')->storeAs('public/fotoKegiatan', $add_filename_fotokeg);

            $user = User::where('id', $id_lembaga)->update([
                'susunan_pengurus' => $add_filename_sunpeng,
                'jadwal_kegiatan' => $add_filename_jadkeg,
                'foto_kegiatan' => $add_filename_fotokeg
            ]);
            session()->flash('status', 'File berhasil diupload');
            return redirect()->back();
        }

        if ($request->file('susunan_pengurus')) {
            $request->validate([
                'susunan_pengurus' => 'mimes:pdf',
            ]);

            $fullname_sunpeng = $request->file('susunan_pengurus')->getClientOriginalName();
            $filename_sunpeng = explode('.', $fullname_sunpeng)[0];
            $extension_sunpeng = $request->file('susunan_pengurus')->getClientOriginalExtension();
            $add_filename_sunpeng = $filename_sunpeng . '_' . time() . '.' . $extension_sunpeng;

            if ($cek_file_user->susunan_pengurus != null) {
                unlink(storage_path('app/public/susunanPengurus/' . $cek_file_user->susunan_pengurus));
            }

            $path = $request->file('susunan_pengurus')->storeAs('public/susunanPengurus', $add_filename_sunpeng);
            User::where('id', $id_lembaga)->update([
                'susunan_pengurus' => $add_filename_sunpeng
            ]);

            session()->flash('status', 'File susunan pengurus berhasil diubah');
            return redirect()->back();
        }

        if ($request->file('jadwal_kegiatan')) {
            $request->validate([
                'jadwal_kegiatan' => 'mimes:pdf',
            ]);

            $fullname_jadkeg = $request->file('jadwal_kegiatan')->getClientOriginalName();
            $filename_jadkeg = explode('.', $fullname_jadkeg)[0];
            $extension_jadkeg = $request->file('jadwal_kegiatan')->getClientOriginalExtension();
            $add_filename_jadkeg = $filename_jadkeg . '_' . time() . '.' . $extension_jadkeg;

            if ($cek_file_user->jadwal_kegiatan != null) {
                unlink(storage_path('app/public/jadwalKegiatan/' . $cek_file_user->jadwal_kegiatan));
            }

            $path = $request->file('jadwal_kegiatan')->storeAs('public/jadwalKegiatan', $add_filename_jadkeg);
            User::where('id', $id_lembaga)->update([
                'jadwal_kegiatan' => $add_filename_jadkeg,
            ]);

            session()->flash('status', 'File jadwal kegiatan berhasil diubah');
            return redirect()->back();
        }

        if ($request->file('foto_kegiatan')) {
            $request->validate([
                'foto_kegiatan' => 'mimes:pdf',
            ]);

            $fullname_fotokeg = $request->file('foto_kegiatan')->getClientOriginalName();
            $filename_fotokeg = explode('.', $fullname_fotokeg)[0];
            $extension_fotokeg = $request->file('foto_kegiatan')->getClientOriginalExtension();
            $add_filename_fotokeg = $filename_fotokeg . '_' . time() . '.' . $extension_fotokeg;

            if ($cek_file_user->foto_kegiatan != null) {
                unlink(storage_path('app/public/fotoKegiatan/' . $cek_file_user->foto_kegiatan));
            }

            $path = $request->file('foto_kegiatan')->storeAs('public/fotoKegiatan', $add_filename_fotokeg);
            User::where('id', $id_lembaga)->update([
                'foto_kegiatan' => $add_filename_fotokeg,
            ]);

            session()->flash('status', 'File foto kegiatan berhasil diubah');
            return redirect()->back();
        }
    }

    public function changePassword()
    {
        return view('user.ubah_password');
    }

    public function setChangePassword(Request $request)
    {
        $request->validate([
            'password_sekarang' => 'nullable|required_with:password_baru',
            'password_baru' => 'nullable|min:8|max:12|required_with:password_sekarang',
            'password_konfirmasi' => 'nullable|min:8|max:12|required_with:password_baru|same:password_baru'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if (!is_null($request->input('password_sekarang'))) {
            if (Hash::check($request->input('password_sekarang'), $user->password)) {
                $user->password = $request->input('password_baru');
            } else {
                return redirect()->back()->withInput();
            }
        } elseif ($request->input('password_sekarang') != $user->password) {
            return redirect()->back()->withInput();;
        }

        $user->save();
        return redirect()->back()->with(['status' => 'Password berhasil diupdate']);
    }
}
