<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitemPict extends Model
{
    use HasFactory;

    protected $table='mitempic';

    protected $fillable = [
        'code',
        'picOrder',
        'picName',
        'picLink',
    ];
}
