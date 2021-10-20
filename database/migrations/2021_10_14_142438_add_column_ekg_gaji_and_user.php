<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEkgGajiAndUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ekgbs', function (Blueprint $table) {
            $table->text('gaji')->after('status');
            $table->bigInteger('id_user')->after('nip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ekgbs', function (Blueprint $table) {
            $table->dropColumn('gaji');
            $table->dropColumn('id_user');
        });
    }
}
