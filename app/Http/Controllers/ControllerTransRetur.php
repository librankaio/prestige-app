<?php

namespace App\Http\Controllers;

use App\Models\Tretur;
use Illuminate\Http\Request;

class ControllerTransRetur extends Controller
{
    public function index(){
        return view('pages.Transaksi.tretur');
    }

    public function post(Request $request){
        // dd($request->all());
        
        Tretur::create([
            'no_retur' => $request->no,
            'tgl_retur1'=> $request->dt,
            'no_consign' => $request->no_consign,
            'jenis_retur' => $request->jenis_retur,
            'sales' => $request->sales,
            'code_tag' => $request->tag,
            'name' => $request->name,
            'consignee' => $request->consignee,
            'phone' => $request->phone,
            'tgl_consign' => $request->dt,
            'hrg_modalsat' => $request->hrgmodal,
            'hrg_jualsat' => $request->hrgjual,
            'note' => $request->satuan,
            'qty' => $request->quantity,
            'sat' => $request->satuan,
            'brand' => $request->brand,
            'warna' => $request->warna,
            'size' => $request->size,
            'kurs_modal' => $request->curr_type1,
            'nominal_modal' => $request->hrgmodal,
            'kurs_jual' => $request->curr_type2,
            'nominal_jual' => $request->hrgjual,
            'pict' => $request->upload0,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Tretur $tretur){
        return view('pages.Transaksi.treturedit',[ 'tretur' => $tretur]);
    }
}
