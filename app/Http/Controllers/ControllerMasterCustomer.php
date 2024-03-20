<?php

namespace App\Http\Controllers;

use App\Models\Mcust;
use Illuminate\Http\Request;

class ControllerMasterCustomer extends Controller
{
    public function index(){

        $datas = Mcust::all();
        
        return view('pages.Master.mcust',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        Mcust::create([
            'code' => $request->code,
            'name' => $request->name,
            'jenis_kelamin' => $request->gender,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'socmed' => $request->socmed,
            'rekening' => $request->rekening,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mcust $mcust){
        return view('pages.Master.mcustedit',[ 'mcust' => $mcust]);
    }

    public function update(Mcust $mcust){
        Mcust::where('id', '=', $mcust->id)->update([
            'code' => request('code'),
            'name' => request('name'),
            'jenis_kelamin' => request('gender'),
            'phone1' => request('phone1'),
            'phone2' => request('phone2'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'socmed' => request('socmed'),
            'rekening' => request('rekening'),
            'note' => request('note'),
        ]);

        return redirect()->route('mcust')->with('success', 'Data berhasil di update');
    }

    public function delete(Mcust $mcust){
        Mcust::find($mcust->id)->delete();
        return redirect()->route('mcust')->with('success', 'Data berhasil dihapus');
    }
}
