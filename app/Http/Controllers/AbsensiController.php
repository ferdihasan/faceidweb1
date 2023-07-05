<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Faceid;

class AbsensiController extends Controller
{

    public function index(){
        $today = date('Y-m-d');
        $absensi = Absensi::All();
        return view('absensi', [
            "title" => "Absensi",
            "faceid" => Faceid::All(),
            "karyawan" => Karyawan::All(),
            "absensi" => Absensi::where('tanggal_absen', $today)->get(),
            "jumlah_absensi" => $absensi->count(),
            "angka" => 1,
        ]);
    }

    public function daftarAbsensi(){
        return view ('daftar-absensi', [
            "title" => "Daftar Absensi",
            "angka" => 1,
            "absensi" => Absensi::All()->reverse(),
        ]);
    }

    public function hapusAbsensi(Request $request){
        $req_id = $request->id;

        $absen = Absensi::find($req_id);
        $delete = $absen->delete();
        if($delete) {
            Session::flash('message', 'Data absensi berhasil di hapus!');
            return redirect('daftar-absensi');
        }
        else {
            Session::flash('errorMessage', 'Data absensi gagal di hapus!');
            return redirect('daftar-absensi');
            
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
        $req_waktu_absen = $request->waktu_absen;

        $absen = Absensi::find($req_id);
        $update = $absen->update([
            'tanggal_absen' => $req_tanggal_absen,
            'waktu_absen' => $req_waktu_absen,
        ]);
        Session::flash('message', 'Data absensi berhasil di ubah!');
        return redirect('daftar-absensi');
        if($update) {
            Session::flash('message', 'Data absensi berhasil di edit!');
            return redirect('daftar-absensi');
        }
        else {
            Session::flash('errorMessage', 'Data absensi gagal di edit!');
            return redirect('daftar-absensi');
            
        }
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
            'absensi' => Absensi::All()->where('tanggal_absen', $tanggal),
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
