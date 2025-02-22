<?php

namespace App\Http\Controllers;

use App\Models\Mjenisbrg;
use Illuminate\Http\Request;

class ControllerMasterJenisBarang extends Controller
{
    public function index(){
        $datas = Mjenisbrg::all();
        
        return view('pages.Master.mjenisbrg',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Mjenisbrg::create([
            'code' => $request->code,
            'name' => $request->name,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mjenisbrg $mjenisbrg){
        return view('pages.Master.mjenisbrgedit',[ 'mjenisbrg' => $mjenisbrg]);
    }

    public function update(Mjenisbrg $mjenisbrg){
        Mjenisbrg::where('id', '=', $mjenisbrg->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'note' => request('note'),
        ]);

        return redirect()->route('mjenisbrg')->with('success', 'Data berhasil di update');
    }

    public function delete(Mjenisbrg $mjenisbrg){
        Mjenisbrg::find($mjenisbrg->id)->delete();
        return redirect()->route('mjenisbrg');
    }
}
