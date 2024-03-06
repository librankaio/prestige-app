<?php

namespace App\Http\Controllers;

use App\Models\Mconsign;
use Illuminate\Http\Request;

class ControllerMasterConsignee extends Controller
{
    public function index(){
        $datas = Mconsign::all();
        
        return view('pages.Master.mconsignee',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Mconsign::create([
            'code' => $request->code,
            'name' => $request->name,
            'jenis_kelamin' => $request->gender,
            'phone' => $request->phone1,
            'rekening' => $request->rekening,
            'alamat' => $request->alamat,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mconsign $mconsign){
        return view('pages.Master.mconsignedit',[ 'mconsign' => $mconsign]);
    }

    public function update(Mconsign $mconsign){
        Mconsign::where('id', '=', $mconsign->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'jenis_kelamin' => request('gender'),
            'phone' => request('phone1'),
            'rekening' => request('rekening'),
            'alamat' => request('alamat'),
        ]);

        return redirect()->route('mconsign');
    }

    public function delete(Mconsign $mconsign){
        Mconsign::find($mconsign->id)->delete();
        return redirect()->route('mconsign');
    }
}
