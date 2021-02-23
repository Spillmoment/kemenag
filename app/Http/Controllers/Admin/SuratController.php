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

        $data = $request->all();

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->move('storage/file', $name);
        }

        $data['file'] = $name;
        $surat =  Surat::create($data);

        $user = User::with('surat')->where('id', $id)->update([
            'surat_id' => $surat->id
        ]);

        session()->flash('status', 'Surat berhasil diupload');
        return redirect()->back();
    }
}
