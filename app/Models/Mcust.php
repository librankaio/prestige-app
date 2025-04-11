<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcust extends Model
{
    use HasFactory;

    protected $table='mcust';

    protected $fillable = [
        'code',
        'name',
        'jenis_kelamin',
        'hp1',
        'hp2',
        'alamat',
        'email',
        'socmed',
        'rekening',
        'note',
    ];
}
