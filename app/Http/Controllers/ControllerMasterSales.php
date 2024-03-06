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

    public function update(Msale $msale){
        Msale::where('id', '=', $msale->id)->update([
            'code' => request('code'),
            'name' => request('name'),
            'phone' => request('phone1'),
            'jenis_kelamin' => request('gender'),
        ]);

        return redirect()->route('msales')->with('success', 'Data berhasil di update');
    }

    public function delete(Msale $msale){
        Msale::find($msale->id)->delete();
        return redirect()->route('msales');
    }
}
