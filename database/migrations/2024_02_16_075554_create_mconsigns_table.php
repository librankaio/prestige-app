<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMconsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mconsigns', function (Blueprint $table) {
            $table->id();
            $table ->string('code', 64);
            $table ->string('name', 128);
            $table ->string('jenis_kelamin',64);
            $table ->string('phone',18);
            $table ->string('socmed', 128)->nullable();
            $table->string('alamat', 256);
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
        Schema::dropIfExists('mconsigns');
    }
}
