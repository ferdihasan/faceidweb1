<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Faceid;

class AbsensiController extends Controller
{

    public function index(){
        return view('absensi', [
            "title" => "Absensi",
            "faceid" => Faceid::All(),
            "karyawan" => Karyawan::All(),
            "absensi" => Absensi::All(),
            "angka" => 1,
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

    public function tambahAbsensi(){
        return view('tambah-absensi', [
            'title' => 'Tambah Absensi',
            'karyawan' => Karyawan::All()
        ]);
    }

    public function submitAbsensiFaceId(Request $request){
        $req_id = $request->karyawan_id;
        $name = $request->name;
        $tanggal = date('Y-m-d');
        $time = date('H:i:s');
        Absensi::create([
            "karyawan_id" => $req_id,
            "tanggal_absen" => $tanggal,
            "waktu_absen" => $time,
        ]);
        return response()->json([
            'success' => true,
            'name' => $name,
            'tanggal' => $tanggal,
            'waktu' => $time,
        ]);
    }

    public function submitTambahAbsensi(Request $request){
        $name = $request->name;
        $tanggal_absen = $request->tanggal_absen;
        $waktu_absen = $request->waktu_absen;
        $karyawans = Karyawan::All();
        // $karyawan = $karyawans->where('name', $name);
        $karyawan_id = $karyawans->where('name', $name)->first()->id;
        Absensi::create([
            'karyawan_id' => $karyawan_id,
            'tanggal_absen' => $tanggal_absen,
            'waktu_absen' => $waktu_absen,
        ]);

        return redirect('daftar-absensi');
    }
}
