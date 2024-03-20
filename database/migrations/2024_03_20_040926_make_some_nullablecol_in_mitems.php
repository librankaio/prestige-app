<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSomeNullablecolInMitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mitems', function (Blueprint $table) {
            //
            $table->string('phone',18)->nullable()->change();
            $table ->string('warna',128)->nullable()->change();
            $table ->string('size',128)->nullable()->change();
            $table ->string('kurs_modal',64)->nullable()->change();
            $table ->decimal('nominal_modal', $precision = 19, $scale = 6)->nullable()->change();
            $table ->string('kurs_jual',64)->nullable()->change();
            $table ->decimal('nominal_jual', $precision = 19, $scale = 6)->nullable()->change();
            $table ->string('pict',256)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mitems', function (Blueprint $table) {
            //
        });
    }
}
