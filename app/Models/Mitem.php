<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_consign',
        'code_tag',
        'name',
        'type',
        'consignee',
        'phone',
        'tgl_consign',
        'hrg_modalsat',
        'hrg_jualsat',
        'note',
        'qty',
        'sat',
        'brand',
        'warna',
        'size',
        'kurs_modal',
        'nominal_modal',
        'kurs_jual',
        'nominal_jual',
        'pict',
        'stock',
        'status',
    ];
            
}
