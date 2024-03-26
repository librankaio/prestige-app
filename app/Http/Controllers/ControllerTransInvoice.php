<?php

namespace App\Http\Controllers;

use App\Models\Mitem;
use App\Models\Tinvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerTransInvoice extends Controller
{
    public function index(){
        $mitems = Mitem::select('id','code_tag')->get();
        return view('pages.Transaksi.tinvoice',[
            'mitems' => $mitems,
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        
        $request->file("upload0")->store('images');
        Tinvoice::create([
            'no_invoice' => $request->no,
            'jenis_trans' => $request->jenis_trans,
            'tgl_invoice' => $request->tgl_invoice,
            'admin' => $request->admin,
            'customer' => $request->customer,
            'tgl_consign' => $request->tgl_consign,
            'no_tag' => $request->notag,
            'jenis_brg' => $request->jenis_brg,
            'consignee' => $request->consignee,
            'phone' => $request->nohp,
            'nama_brg' => $request->nama_barang,
            'desc_barang' => $request->desc_barang,
            'qty' => $request->quantity,
            'merk' => $request->merk_barang,
            'warna' => $request->warna,
            'size' => $request->size,
            'nominal_beli1' => $request->nominal_beli1,
            'nominal_beli2' => $request->nominal_beli2,
            'kursbeli1' => $request->kursbeli1,
            'kursbeli2' => $request->kursbeli2,
            'total' => $request->total,            
            'profit_prestige' => $request->profit_prestige,
            'profit_consignee' => $request->profit_consignee,
            'pict' => $request->file("upload0")->hashname(),
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Tinvoice $tinvoice){
        return view('pages.Transaksi.tinvoiceedit',[ 'tinvoice' => $tinvoice]);
    }

    public function list(){
        $tinvoices = Tinvoice::select('id','no_invoice','tgl_invoice','jenis_trans','admin','customer','no_tag','jenis_brg','tgl_consign','consignee','nama_brg','desc_brg','qty','warna','merk','size','kursbeli1','kursbeli2','nominal_beli1','nominal_beli2','total','profit_prestige','profit_consignee','pict')->orderBy('created_at', 'asc')->get();
        return view('pages.Transaksi.tinvoicelist',[
            'tinvoices' => $tinvoices,
        ]);
    }

    public function update(Tinvoice $tinvoice){
        // dd(request()->all());
        Tinvoice::create([
            'no_invoice' => request('no'),
            'jenis_trans' => request('jenis_trans'),
            'tgl_invoice' => request('tgl_invoice'),
            'admin' => request('admin'),
            'customer' => request('customer'),
            'tgl_consign' => request('tgl_consign'),
            'no_tag' => request('notag'),
            'jenis_brg' => request('jenis_brg'),
            'consignee' => request('consignee'),
            'phone' => request('nohp'),
            'nama_brg' => request('nama_barang'),
            'desc_barang' => request('desc_barang'),
            'qty' => request('quantity'),
            'merk' => request('merk_barang'),
            'warna' => request('warna'),
            'size' => request('size'),
            'nominal_beli1' => request('nominal_beli1'),
            'nominal_beli2' => request('nominal_beli2'),
            'kursbeli1' => request('kursbeli1'),
            'kursbeli2' => request('kursbeli2'),
            'total' => request('total'),            
            'profit_prestige' => request('profit_prestige'),
            'profit_consignee' => request('profit_consignee'),
            'pict' => request()->file("upload0")->hashname(),
        ]);
        if(request()->file('upload0')!=null){
            if(Storage::exists('images/'.request('upload0'))){
                Storage::delete('images/'.request('hdnupload0'));
                // dd($hdnupload);
            }
            request()->file('upload0')->store('images');
            Tinvoice::where('id', '=', $tinvoice->id)->update([
                'pict' => request()->file('upload0')->hashname(),
            ]);
            request()->file("upload0")->store('images');
        }

        return redirect()->route('tinvoice');
    }

    public function delete(Tinvoice $tinvoice){
        Tinvoice::find($tinvoice->id)->delete();
        return redirect()->route('tinvoice');
    }
}
