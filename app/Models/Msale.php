<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msale extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'phone',
        'jenis_kelamin',
    ];
}
