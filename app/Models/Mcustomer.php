<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcustomer extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $table='mcust';

    protected $fillable = [
        'code',
        'name',
        'phn',
    ];
}
