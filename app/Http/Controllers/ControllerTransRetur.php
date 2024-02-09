<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTransRetur extends Controller
{
    public function index(){
        return view('pages.Transaksi.tretur');
    }
}
