<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Surat;
use Illuminate\Support\Facades\File;

class SuratController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'keterangan' => 'required'
        ]);

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->move('storage/file', $name);
        }

        $data['file'] = $name;
        $data['keterangan'] = $request->keterangan;
        $surat =  Surat::create($data);

        $user = User::with('surat')->where('id', $id)->update([
            'surat_id' => $surat->id
        ]);

        session()->flash('status', 'Surat berhasil diupload');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $get_name_surat = Surat::findOrFail($user->surat_id);

        if ($file = $request->file('file')) {
            // unlink(storage_path('app/public/file/'.$cek_file_user->susunan_pengurus));
            File::delete(storage_path('app/public/file/' . $get_name_surat->file));
            $name = $file->getClientOriginalName();
            $file->move('storage/file', $name);
        }

        Surat::where('id', $get_name_surat->id)->update([
            'file' => $name,
            'keterangan' => $request->keterangan
        ]);

        session()->flash('status', 'Surat berhasil diupdate');
        return redirect()->back();
    }
}
