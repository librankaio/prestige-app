<?php

namespace App\Http\Controllers;

use App\Models\Msatuan;
use Illuminate\Http\Request;

class ControllerMasterSatuan extends Controller
{
    public function index(){
        $datas = Msatuan::all();
        
        return view('pages.Master.msatuan',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Msatuan::create([
            'satuan' => $request->satuan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Msatuan $msatuan){
        return view('pages.Master.msatuanedit',[ 'msatuan' => $msatuan]);
    }

    public function update(Msatuan $msatuan){
        Msatuan::where('id', '=', $msatuan->id)->update([
            'satuan' => request('satuan'),
        ]);

        return redirect()->route('msatuan')->with('success', 'Data berhasil di update');
    }

    public function delete(Msatuan $msatuan){
        Msatuan::find($msatuan->id)->delete();
        return redirect()->route('msatuan');
    }
}
