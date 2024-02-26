<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinvoices', function (Blueprint $table) {
            $table->id();
            $table ->string('no_invoice', 64)->charset('latin1')->collate('latin1_swedish_ci');
            $table ->date('tgl_invoice');
            $table ->string('jenis_trans', 64);
            $table ->string('admin', 64);
            $table ->string('customer', 64);
            $table ->string('no_tag', 128);
            $table ->string('jenis_brg', 128);
            $table ->date('tgl_consign');
            $table ->string('consignee', 128);
            $table ->string('phone',18);
            $table ->string('nama_brg', 128);
            $table ->string('desc_brg', 256)->nullable();
            $table ->decimal('qty', $precision = 19, $scale = 6);
            $table ->string('warna',128);
            $table ->string('merk',128);
            $table ->string('size',128);
            $table ->string('kursbeli1',64);
            $table ->string('kursbeli2',64);
            $table ->decimal('nominal_beli1', $precision = 19, $scale = 6);
            $table ->decimal('nominal_beli2', $precision = 19, $scale = 6);
            $table ->decimal('total', $precision = 19, $scale = 6);
            $table ->decimal('profit_prestige', $precision = 19, $scale = 6);
            $table ->decimal('profit_consignee', $precision = 19, $scale = 6);
            $table ->string('pict',256);
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
        Schema::dropIfExists('tinvoices');
    }
}
