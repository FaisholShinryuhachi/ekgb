<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPendukung2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ekgbs', function (Blueprint $table) {
            $table->text('pendukung2')->after('pendukung');
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
            $table->dropColumn('pendukung2');
        });
    }
}
