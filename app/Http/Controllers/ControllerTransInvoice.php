<?php

namespace App\Http\Controllers;

use App\Models\Tinvoice;
use Illuminate\Http\Request;

class ControllerTransInvoice extends Controller
{
    public function index(){
        return view('pages.Transaksi.tinvoice');
    }

    public function post(Request $request){
        dd($request->all());
        
        Tinvoice::create([
            'no_invoice' => $request->no,
            'jenis_trans' => $request->jenis_trans,
            'tgl_invoice' => $request->dt,
            'admin' => $request->admin,
            'customer' => $request->customer,
            'tgl_consign' => $request->nohp1,
            'no_tag' => $request->notag,
            'jenis_brg' => $request->jenis_brg,
            'consignee' => $request->consignee,
            'note' => $request->nohp,
            'nama_brg' => $request->nama_barang,
            'desc_brg' => $request->desc_barang,
            'qty' => $request->quantity,
            'merk' => $request->merk_barang,
            'kursbeli1' => $request->kurs1,
            'warna' => $request->warna,
            'size' => $request->size,
            'total' => $request->total,
            'profit_prestige' => $request->profit_prestige,
            'profit_consignee' => $request->profit_consignee,
            'pict' => $request->upload0,
            'stock' => $request->price_total,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Tinvoice $tinvoice){
        return view('pages.Transaksi.tinvoiceedit',[ 'tinvoice' => $tinvoice]);
    }
}
