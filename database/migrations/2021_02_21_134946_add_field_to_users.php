<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('lembaga_id')->after('id')->nullable();
            $table->foreign('lembaga_id')->references('id')->on('lembagas')->onDelete('cascade');

            $table->foreignId('surat_id')->after('lembaga_id')->nullable();
            $table->foreign('surat_id')->references('id')->on('surats')->onDelete('cascade');

            $table->string('link_website')->nullable();
            $table->enum('status', ['0', '1'])->after('link_website')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
