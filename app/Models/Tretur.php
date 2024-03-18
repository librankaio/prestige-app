<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tretur extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_retur',
        'tgl_retur1',
        'jenis_retur',
        'sales',
        'customer',
        'no_invoice',
        'jenis_brg',
        'tgl_retur2',
        'nama_brg',
        'desc_brg',
        'qty',
        'satuan',
        'merk',
        'warna',
        'size',
        'material',
        'nominal_beli1',
        'nominal_beli2',
        'kursbeli1',
        'kursbeli2',
        'total',
        'profit',
        'pict',
        'alasan_retur',
        'note_retur',
        'jenis_bayar',
        'info_rek',
        'tgl_bayar',
    ];
}
