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
