<?php

namespace App\Http\Controllers;

use App\Models\Mconsign;
use App\Models\Mitem;
use App\Models\Mjenisbrg;
use App\Models\Mmerk;
use App\Models\Msatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerMasterDataItem extends Controller
{
    public function index(){
        // $datas = Mitem::all();
        // $consignees = Mconsign::select('id','code','name')->get();
        // $jenis_brgs = Mjenisbrg::select('id','code','name')->get();
        // $satuans = Msatuan::select('id','satuan')->get();
        // $merks = Mmerk::select('id','code','name')->get();
        // dd($datas->no_consign);
        return view('pages.Master.mitem',[
            // 'datas' => $datas,
            // 'consignees' => $consignees,
            // 'jenis_brgs' => $jenis_brgs,
            // 'satuans' => $satuans,
            // 'merks' => $merks,
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
            'note' => $request->note,
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
            'attr1' => $request->ch_boxori,
            'attr2' => $request->ch_oridustbag,
            'attr3' => $request->ch_authcard,
            'attr4' => $request->ch_mirror,
            'attr5' => $request->ch_booklet,
            'attr6' => $request->ch_receipt,
            'attr7' => $request->ch_strap,
            'attr8' => $request->ch_padlock,
            'attr9' => $request->ch_key,
            'attr10' => $request->ch_dustganti,
            'attr11' => $request->ch_hollow,
            'attr12' => $request->ch_paperbag,
            'attr13' => $request->ch_tag,
            'attr14' => $request->ch_raincoat,
            'attr15' => $request->ch_camelia,
            'attr16' => $request->ch_ribbon,
            'attr17' => $request->ch_sampleather,
            'attr18' => $request->ch_copyreceipt,
            'attr19' => $request->ch_lap,
            'atr_lain' => $request->kel_lain,
        ]);
       
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function getedit(Mitem $mitem){
        // dd($mitem);
        return view('pages.Master.mitemedit',[ 'mitem' => $mitem]);
    }

    public function update(Mitem $mitem){
        // dd(request()->all());
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
            // 'pict' => request()->file("upload0")->hashname(),
            'stock' => Request('stock'),
            'status' => Request('status'),
            'attr1' => request('ch_boxori'),
            'attr2' => request('ch_oridustbag'),
            'attr3' => request('ch_authcard'),
            'attr4' => request('ch_mirror'),
            'attr5' => request('ch_booklet'),
            'attr6' => request('ch_receipt'),
            'attr7' => request('ch_strap'),
            'attr8' => request('ch_padlock'),
            'attr9' => request('ch_key'),
            'attr10' => request('ch_dustganti'),
            'attr11' => request('ch_hollow'),
            'attr12' => request('ch_paperbag'),
            'attr13' => request('ch_tag'),
            'attr14' => request('ch_raincoat'),
            'attr15' => request('ch_camelia'),
            'attr16' => request('ch_ribbon'),
            'attr17' => request('ch_sampleather'),
            'attr18' => request('ch_copyreceipt'),
            'attr19' => request('ch_lap'),
            'atr_lain' => request('kel_lain'),
        ]);
        if(request()->file('upload0')!=null){
            if(Storage::exists('images/'.request('upload0'))){
                Storage::delete('images/'.request('hdnupload0'));
                // dd($hdnupload);
            }
            request()->file('upload0')->store('images');
            Mitem::where('id', '=', $mitem->id)->update([
                'pict' => request()->file('upload0')->hashname(),
            ]);
            request()->file("upload0")->store('images');
        }

        return redirect()->route('mitem');
    }

    public function delete(Mitem $mitem){
        Mitem::find($mitem->id)->delete();
        return redirect()->route('mitem');
    }

    public function  getmitemtag(Request $request){
        $codetag = $request->codetag;
        if($codetag == ''){
            $mitems = Mitem::select('id','no_consign','code_tag','name','type','consignee','phone','tgl_consign','hrg_modalsat','hrg_jualsat','note','qty','sat','brand','warna','size','kurs_modal','nominal_modal','kurs_jual','nominal_jual','pict','stock','status','attr1','attr2','attr3','attr4','attr5','attr6','attr7','attr8','attr9','attr10','attr11','attr12','attr13','attr14','attr15','attr16','attr17','attr18','attr19','atr_lain',)->orderBy('code', 'asc')->limit(20)->get();
        }else{
            $mitems = Mitem::select('id','no_consign','code_tag','name','type','consignee','phone','tgl_consign','hrg_modalsat','hrg_jualsat','note','qty','sat','brand','warna','size','kurs_modal','nominal_modal','kurs_jual','nominal_jual','pict','stock','status','attr1','attr2','attr3','attr4','attr5','attr6','attr7','attr8','attr9','attr10','attr11','attr12','attr13','attr14','attr15','attr16','attr17','attr18','attr19','atr_lain',)->where('code_tag','=',$codetag)->limit(20)->get();
        }
        return json_encode($mitems);
    }
}
