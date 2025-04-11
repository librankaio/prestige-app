<?php

namespace App\Http\Controllers;

use App\Models\Mcustomer;
use Illuminate\Http\Request;

class ControllerMasterDataCustomer extends Controller
{
    //
    public function index(){
        return view('pages.Master.mcustomer');
    }

    public function post(Request $request){
        Mcustomer::create([
            'code' => $request->code,
            'name' => $request->name,
            'hp1' => $request->phone,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
