<?php

namespace App\Http\Controllers;

use App\Models\Msale;
use Illuminate\Http\Request;

class ControllerMasterSales extends Controller
{
    public function index(){
        $datas = Msale::all();

        return view('pages.Master.msales',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Msale::create([
            'code' => $request->code,
            'name' => $request->name,
            'phone' => $request->phone1,
            'jenis_kelamin' => $request->gender,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Msale $msale){
        return view('pages.Master.msalesedit',[ 'msale' => $msale]);
    }
}
