<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnInMitems extends Migration
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
            $table->string('attr1', 1);
            $table->string('attr2', 1);
            $table->string('attr3', 1);
            $table->string('attr4', 1);
            $table->string('attr5', 1);
            $table->string('attr6', 1);
            $table->string('attr7', 1);
            $table->string('attr8', 1);
            $table->string('attr9', 1);
            $table->string('attr10', 1);
            $table->string('attr11', 1);
            $table->string('attr12', 1);
            $table->string('attr13', 1);
            $table->string('attr14', 1);
            $table->string('attr15', 1);
            $table->string('attr16', 1);
            $table->string('attr17', 1);
            $table->string('attr18', 1);
            $table->string('attr19', 1);
            $table->string('atr_lain', 256);
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
