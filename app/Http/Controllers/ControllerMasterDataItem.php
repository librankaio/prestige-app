<?php

namespace App\Http\Controllers;

use App\Models\Mitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerMasterDataItem extends Controller
{
    public function index(){
        $datas = Mitem::all();
        // dd($datas->no_consign);
        return view('pages.Master.mitem',[
            'datas' => $datas,
        ]);
    }

    public function post(Request $request){
        // dd($request->file("upload0")->hashname());
        // dd($request->all());
        
        $request->file("upload0")->store('images');
        Mitem::create([
            'no_consign' => $request->no_consign,
            'code_tag' => $request->tag,
            'name' => $request->name,
            'type' => $request->type,
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
            'pict' => $request->file("upload0")->hashname(),
            'stock' => $request->stock,
            'status' => $request->status,
        ]);
       
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mitem $mitem){
        return view('pages.Master.mitemedit',[ 'mitem' => $mitem]);
    }

    public function update(Mitem $mitem){
        Mitem::where('id', '=', $mitem->id)->update([
            'no_consign' => Request('no_consign'),
            'code_tag' => Request('tag'),
            'name' => Request('name'),
            'type' => Request('type'),
            'consignee' => Request('consignee'),
            'phone' => Request('phone'),
            'tgl_consign' => Request('dt'),
            'hrg_modalsat' => Request('hrgmodal'),
            'hrg_jualsat' => Request('hrgjual'),
            'note' => Request('satuan'),
            'qty' => Request('quantity'),
            'sat' => Request('satuan'),
            'brand' => Request('brand'),
            'warna' => Request('warna'),
            'size' => Request('size'),
            'kurs_modal' => Request('curr_type1'),
            'nominal_modal' => Request('hrgmodal'),
            'kurs_jual' => Request('curr_type2'),
            'nominal_jual' => Request('hrgjual'),
            'pict' => request()->file("upload0")->hashname(),
            'stock' => Request('stock'),
            'status' => Request('status'),
        ]);
        if(request()->file('upload0')!=null){
            if(Storage::exists('images/'.request('upload0'))){
                Storage::delete('images/'.request()->$hdnupload);
                // dd($hdnupload);
            }
            request()->file('upload0')->store('images');
            DB::table('twoh_pic')->where('name_mcar','=',request()->platnum)->where('pic','=',request()->$hdnupload)->update(['pic'=>request()->file('upload0')->hashname(), 'note' => request()->$desc]);
        }

        return redirect()->route('mconsign');
    }
}
