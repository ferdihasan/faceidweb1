<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Faceid;


class CreatefaceidController extends Controller
{
    public function index () {
        return view ('createfaceid', [
            "title" => "Create Face ID",
            "karyawan" => Karyawan::All()
        ]);
    }

    public function saveFaceId(Request $request) {
        $req_id = $request->id;
        // create db
        Faceid::create([
            "karyawan_id" => $req_id,
            "faceid1" => $request->faceid,
            "faceid2" => $request->faceid,
        ]);
        Session::flash('save_faceid', 'Berhasil menambahkan faceid');
        return redirect('administrator');
    }

    public function hapusFaceid(Request $request){
        $req_id = $request->id;
        $faceid = Faceid::where('karyawan_id', $req_id)->first();
        $delete = $faceid->delete();
        if ($delete) {
            Session::flash('hapusFaceId', 'Face ID berhasil di hapus!');
            return redirect()->back();
        }
        return back()->with([
            'errorHapusFaceId' => 'Face ID gagal di hapus',
        ]);
    }
}
