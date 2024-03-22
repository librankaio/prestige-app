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
        'attr1',
        'attr2',
        'attr3',
        'attr4',
        'attr5',
        'attr6',
        'attr7',
        'attr8',
        'attr9',
        'attr10',
        'attr11',
        'attr12',
        'attr13',
        'attr14',
        'attr15',
        'attr16',
        'attr17',
        'attr18',
        'attr19',
        'atr_lain',
    ];
            
}
