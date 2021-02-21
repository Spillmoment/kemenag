<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Lembaga;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'lembaga_id' => Lembaga::where('id', 1)->get(),
            'nama_lembaga' => 'TPA Konohagakure',
            'alamat' => 'Jalan Daun Tersembunyi',
            'no_telp' => '08523663957',
            'email' => 'konoha@gmail.com',
            'nama_pimpinan' => 'Hashirama Senju',
            // 'tahun_berdiri' => date(time()),
            'susunan_pengurus' => 'Susunan.pdf',
            'nama_pendiri' => 'Madara Uchiha',
            'jumlah_guru' => 10,
            'jumlah_santri' => 100,
            'tempat_kbm' => 'Gua Myobokuzan',
            'jadwal_kegiatan' => 'jadwal.pdf',
            'foto_kegiatan' => 'foto.jpg',
            'link_fb' => 'https://www.facebook.com/tpa_konoha',
            'link_website' => 'tpakonoha.com',
            'password' => bcrypt("123")
        ]);
    }
}
