<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index(){
        return view ('daftar-absensi', [
            "title" => "Daftar Absensi",
            "angka" => 1,
            "absensi" => Absensi::All(),
        ]);
    }

    public function hapusAbsensi(Request $request){
        $req_id = $request->id;

        $absen = Absensi::find($req_id);

        if($absen->delete() === true) {
            // dd('sudah terhapus');
            return redirect('daftar-absensi');
        }
        else {
            dd('invalid');
            
        }
    }

    public function editAbsensi(Request $request) {
        $req_id = $request->id;
        return view ('edit-absensi', [
            "title" => "Daftar Absensi",
            "absensi" => Absensi::find($req_id),
        ]);
    }
}
