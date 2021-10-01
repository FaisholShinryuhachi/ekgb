<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kgbs', function (Blueprint $table) {
            $table->id();
            $table->text('nip');
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->string('pangkat');
            $table->date('kgb_terakhir');
            $table->string('status');
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
        Schema::dropIfExists('kgbs');
    }
}
