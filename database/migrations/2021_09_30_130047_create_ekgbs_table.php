<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekgbs', function (Blueprint $table) {
            $table->id();
            $table->text('nip');
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->string('pangkat');
            $table->date('kgb_terakhir');
            $table->string('status');
            $table->text('pendukung')->nullable();
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
        Schema::dropIfExists('ekgbs');
    }
}
