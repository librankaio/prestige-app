<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTretursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treturs', function (Blueprint $table) {
            $table->id();
            $table ->string('no_retur', 64)->charset('latin1')->collate('latin1_swedish_ci');
            $table ->date('tgl_retur1');
            $table ->string('jenis_retur', 64);
            $table ->string('sales', 64);
            $table ->string('customer', 64);
            $table ->string('no_invoice', 128);
            $table ->string('jenis_brg', 128);
            $table ->date('tgl_retur2');
            $table ->string('nama_brg', 128);
            $table ->string('desc_brg', 256)->nullable();
            $table ->decimal('qty', $precision = 19, $scale = 6);
            $table ->string('satuan',64);
            $table ->string('merk',128);
            $table ->string('warna',128);
            $table ->string('size',128);
            $table ->string('material',128);
            $table ->string('kursbeli1',64);
            $table ->string('kursbeli2',64);
            $table ->decimal('total', $precision = 19, $scale = 6);
            $table ->decimal('profit', $precision = 19, $scale = 6);
            $table ->string('pict',256);
            $table ->string('alasan_retur', 128);
            $table ->string('note_retur', 256)->nullable();
            $table ->string('jenis_bayar',128);
            $table ->string('info_rek',128);
            $table ->date('tgl_bayar');
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
        Schema::dropIfExists('treturs');
    }
}
