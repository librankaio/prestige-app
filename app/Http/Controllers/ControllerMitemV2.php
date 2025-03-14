<?php

namespace App\Http\Controllers;

use App\Models\MitemPict;
use App\Models\MitemV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ControllerMitemV2 extends Controller
{
    public function index(){
        $owners = DB::table('mconsignee')->select('code', 'name')->where('tstatus','=','1')->get();
        $brands = DB::table('mbrand')->select('code', 'name')->where('tstatus','=','1')->get();
        return view('pages.Master.mitemv2',[
            'owners' => $owners,
            'brands' => $brands,
        ]);
    }

    public function post(Request $request){
        $basenum = DB::select(DB::raw("SELECT TOP 1 no + 1 FROM mitem WHERE tstatus = 1 ORDER BY no DESC"));
        // dd($basenum);
        if($request->file('upload0') != null){
            $originalName = request('upload0')->getClientOriginalName();
            // $path = "images/";
            // request()->file('images')->storeAs($path, $originalName);

            // Get the uploaded image file
            $image = $request->file('upload0');
            
            // Create an instance of the image
            $img = Image::make($image);

            // Compress the image (set the quality to 70)
            $img->encode('jpg', 50); // 70 is the quality (0 to 100)
            
            // Store the compressed image
            Storage::put('images/'.$originalName, $img);
            
            $file_link = 'prestige.swiapps.com/storage/images/'.$originalName;
            // dd($file_link);

            MitemV2::create([
                'basenum' => $basenum,
                'code_mtype' => 'BAG',
                'qty' => 1,
                'qtyconsign' => 1,
                'code_muom' => 'PCS',
                'code_mcurrb' => 'IDR',
                'code_mcurrj' => 'IDR',
                'code_mlocation' => 'LC00001',
                //REQ BARU DIATAS 13032025
                'code' => $request->code_tag,
                'dtconsign' => $request->dt_consign,
                'name' => $request->name,
                'code_mconsign' => $request->owner,
                'code_mbrand' => $request->brand,
                // 'basetype' => $request->jenis,
                'basetype' => 'ITEM',
                'hrgbeli' => (float) str_replace(',', '', $request->hrgjual),
                'hrgjual' => (float) str_replace(',', '', $request->hrgtitip),
                'picLink' => $file_link,
            ]);
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        }else{
            MitemV2::create([
                'basenum' => $basenum,
                'code_mtype' => 'BAG',
                'qty' => 1,
                'qtyconsign' => 1,
                'code_muom' => 'PCS',
                'code_mcurrb' => 'IDR',
                'code_mcurrj' => 'IDR',
                'code_mlocation' => 'LC00001',
                //REQ BARU DIATAS 13032025
                'code' => $request->code_tag,
                'dtconsign' => $request->dt_consign,
                'name' => $request->name,
                'code_mconsign' => $request->owner,
                'code_mbrand' => $request->brand,
                // 'basetype' => $request->jenis,
                'basetype' => 'ITEM',
                'hrgbeli' => (float) str_replace(',', '', $request->hrgjual),
                'hrgjual' => (float) str_replace(',', '', $request->hrgtitip),
            ]);
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        }
    }
}
