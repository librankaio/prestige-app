<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitemV2 extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $table='mitem';

    protected $fillable = [
        'basenum',
        'code_mtype',
        'qty',
        'qtyconsign',
        'code_muom',
        'code_mcurrb',
        'code_mcurrj',
        'code_mlocation',
         //REQ BARU DIATAS 13032025
        'code',
        'dtconsign',
        'name',
        'code_mconsign',
        'code_mbrand',
        'basetype',
        'hrgbeli',
        'hrgjual',
        'picLink',
    ];
}
