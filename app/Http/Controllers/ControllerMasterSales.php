<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMasterSales extends Controller
{
    public function index(){
        return view('pages.Master.msales');
    }
}
