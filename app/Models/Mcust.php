<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcust extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'jenis_kelamin',
        'phone1',
        'phone2',
        'alamat',
        'email',
        'socmed',
        'rekening',
        'note',
    ];
}
