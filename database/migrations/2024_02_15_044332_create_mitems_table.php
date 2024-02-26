<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitems', function (Blueprint $table) {
            $table->id();
            $table->string('no_consign', 64)->charset('latin1')->collate('latin1_swedish_ci');
            $table->string('code_tag', 128);
            $table->string('name', 128);
            $table->string('consignee', 128);
            $table->string('phone',18);
            $table->date('tgl_consign');
            $table->decimal('hrg_modalsat', $precision = 19, $scale = 6);
            $table->decimal('hrg_jualsat', $precision = 19, $scale = 6);
            $table->string('note', 256)->nullable();
            $table ->decimal('qty', $precision = 19, $scale = 6);
            $table ->string('sat',128);
            $table ->string('brand',128);
            $table ->string('warna',128);
            $table ->string('size',128);
            $table ->string('kurs_modal',64);
            $table ->decimal('nominal_modal', $precision = 19, $scale = 6);
            $table ->string('kurs_jual',64);
            $table ->decimal('nominal_jual', $precision = 19, $scale = 6);
            $table ->string('pict',256);
            $table ->decimal('stock', $precision = 19, $scale = 6);
            $table ->string('status',64);
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
        Schema::dropIfExists('mitems');
    }
}
