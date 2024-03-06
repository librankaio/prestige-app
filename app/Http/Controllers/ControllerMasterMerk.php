<?php

namespace App\Http\Controllers;

use App\Models\Mmerk;
use Illuminate\Http\Request;

class ControllerMasterMerk extends Controller
{
    public function index(){
        $datas = Mmerk::all();
        
        return view('pages.Master.mmerk',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Mmerk::create([
            'code' => $request->code,
            'name' => $request->name,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mmerk $mmerk){
        return view('pages.Master.mmerkedit',[ 'mmerk' => $mmerk]);
    }

    public function update(Mmerk $mmerk){
        Mmerk::where('id', '=', $mmerk->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'note' => request('note'),
        ]);

        return redirect()->route('mmerk')->with('success', 'Data berhasil di update');
    }

    public function delete(Mmerk $mmerk){
        Mmerk::find($mmerk->id)->delete();
        return redirect()->route('mmerk');
    }
}
