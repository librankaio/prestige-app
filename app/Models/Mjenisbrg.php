<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mjenisbrg extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'note',
    ];
}
