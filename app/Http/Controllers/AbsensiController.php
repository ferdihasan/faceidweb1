<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{

    public function index(){
        return view('absensi', [
            "title" => "Absensi",
        ]);
    }

    public function daftarAbsensi(){
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

    public function simpanAbsensi(Request $request) {
        $req_id = $request->id;
        $req_tanggal_absen = $request->tanggal_absen;
        $req_waktu_masuk = $request->waktu_masuk;
        $req_waktu_keluar = $request->waktu_keluar;

        $absen = Absensi::find($req_id);
        $absen->update([
            'tanggal_absen' => $req_tanggal_absen,
            'waktu_masuk' => $req_waktu_masuk,
            'waktu_keluar' => $req_waktu_keluar,
        ]);

        return redirect('daftar-absensi');
    }
}
