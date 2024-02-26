<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mconsign extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'jenis_kelamin',
        'phone',
        'rekening',
        'alamat',
    ];
}
