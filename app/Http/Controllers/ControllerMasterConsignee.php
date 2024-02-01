<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMasterConsignee extends Controller
{
    public function index(){
        return view('pages.Master.mconsignee');
    }
}
