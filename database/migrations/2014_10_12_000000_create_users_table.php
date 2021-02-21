<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama_lembaga');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('nama_pimpinan');
            $table->date('tahun_berdiri');
            $table->string('susunan_pengurus');
            $table->string('nama_pendiri');
            $table->integer('jumlah_guru');
            $table->integer('jumlah_santri');
            $table->string('tempat_kbm');
            $table->string('jadwal_kegiatan')->nullable();
            $table->string('foto_kegiatan')->nullable();
            $table->string('link_fb')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
