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
            'code' => request('code'),
            'name' => request('name'),
            'jenis_kelamin' => request('gender'),
            'phone' => request('phone1'),
            'rekening' => request('rekening'),
            'alamat' => request('alamat'),
        ]);

        return redirect()->route('mconsign')->with('success', 'Data berhasil diupdate');
    }

    public function  getconsign(Request $request){
        $kode = $request->kode;
        if($kode == ''){
            $consignees = Mconsign::select('id','code','name','jenis_kelamin','phone','rekening','alamat')->orderBy('code', 'asc')->limit(20)->get();
        }else{
            $consignees = Mconsign::select('id','code','name','jenis_kelamin','phone','rekening','alamat')->where('code','=',$kode)->limit(20)->get();
        }
        return json_encode($consignees);
    }

    public function delete(Mconsign $mconsign){
        Mconsign::find($mconsign->id)->delete();
        return redirect()->route('mconsign')->with('success', 'Data berhasil dihapus');
    }
}
