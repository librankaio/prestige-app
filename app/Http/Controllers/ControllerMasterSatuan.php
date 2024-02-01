<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMasterSatuan extends Controller
{
    public function index(){
        return view('pages.Master.msatuan');
    }
}
