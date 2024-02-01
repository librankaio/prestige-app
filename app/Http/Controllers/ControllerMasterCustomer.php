<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMasterCustomer extends Controller
{
    public function index(){
        return view('pages.Master.mcust');
    }
}
