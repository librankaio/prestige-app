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

        MitemV2::create([
            'code' => $request->code_tag,
            'dtconsign' => $request->dt_consign,
            'name' => $request->name,
            'code_mconsign' => $request->owner,
            'code_mbrand' => $request->brand,
            'basetype' => $request->jenis,
            'hrgbeli' => (float) str_replace(',', '', $request->hrgjual),
            'hrgjual' => (float) str_replace(',', '', $request->hrgtitip),
            'picLink' => $file_link,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
