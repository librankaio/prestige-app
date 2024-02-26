<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_invoice',
        'tgl_invoice',
        'jenis_trans',
        'admin',
        'customer',
        'no_tag',
        'jenis_brg',
        'tgl_consign',
        'consignee',
        'nama_brg',
        'desc_brg',
        'qty',
        'warna',
        'merk',
        'size',
        'kursbeli1',
        'kursbeli2',
        'nominal_beli1',
        'nominal_beli2',
        'total',
        'profit_prestige',
        'profit_consignee',
        'pict',
    ];
}
