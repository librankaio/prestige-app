<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNominalBeliToTretursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treturs', function (Blueprint $table) {
            //
            $table ->decimal('nominal_beli1', $precision = 19, $scale = 6);
            $table ->decimal('nominal_beli2', $precision = 19, $scale = 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treturs', function (Blueprint $table) {
            //
        });
    }
}
