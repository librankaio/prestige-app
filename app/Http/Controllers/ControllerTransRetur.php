<?php

namespace App\Http\Controllers;

use App\Models\Tretur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerTransRetur extends Controller
{
    public function index(){
        return view('pages.Transaksi.tretur');
    }

    public function post(Request $request){
        // dd($request->all());
        
        Tretur::create([
            'no_retur' => $request->no,
            'tgl_retur1'=> $request->dt_retur,
            'jenis_retur' => $request->jenis_retur,
            'sales' => $request->sales,
            // -------------
            'no_invoice' => $request->no_invoice,
            'customer' => $request->customer ,
            'tgl_retur2'=> $request->dt_retur2,
            'jenis_brg' => $request->jenis_brg,
            'nama_brg' => $request->nama_barang,
            'desc_brg' => $request->desc_brg,
            'qty' => $request->quantity,
            'satuan' => $request->satuan,
            'merk' => $request->merk_barang,
            'warna' => $request->warna,
            'kurs_modal' => $request->kurs1,
            'nominal_modal' => $request->hrgmodal,
            'kurs_jual' => $request->curr_type2,
            'nominal_jual' => $request->hrgjual,
            'size' => $request->size,
            'material' => $request->material,
            'kursbeli1' => $request->kurs1,
            'kursbeli2' => $request->kurs2,
            'nominal_beli1' => $request->nominal_beli1,
            'nominal_beli2' => $request->nominal_beli2,
            'total' => $request->total,
            'profit' => $request->profit,
            // --------------
            'pict' => $request->upload0,
            // ---------------
            'alasan_retur' => $request->alasan_retur,
            'note_retur' => $request->phone,
            'jenis_bayar' => $request->jenis_byr,
            'info_rek' => $request->info_rek,
            'tgl_bayar' => $request->dt_bayar
        ]);

        $request->file("upload0")->store('images');
        
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Tretur $tretur){
        return view('pages.Transaksi.treturedit',[ 'tretur' => $tretur]);
    }

    public function list(){
        $treturs = Tretur::select('id','no_retur','tgl_retur1','jenis_retur','sales','customer','no_invoice','jenis_brg','tgl_retur2','nama_brg','desc_brg','qty','satuan','merk','warna','size','material','nominal_beli1','nominal_beli2','kursbeli1','kursbeli2','total','profit','pict','alasan_retur','note_retur','jenis_bayar','info_rek','tgl_bayar',)->orderBy('created_at', 'asc')->get();
        return view('pages.Transaksi.treturlist',[
            'treturs' => $treturs,
        ]);
    }
}
