<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcusts', function (Blueprint $table) {
            $table->id();
            $table ->string('code', 64);
            $table ->string('name', 128);
            $table ->string('jenis_kelamin',64);
            $table ->string('phone1',18);
            $table ->string('phone2',18);
            $table ->string('alamat', 256)->nullable();
            $table ->string('email', 128)->nullable();
            $table ->string('socmed', 64)->nullable();
            $table ->string('rekening', 128)->nullable();
            $table->string('note', 256)->nullable();
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
        Schema::dropIfExists('mcusts');
    }
}
