<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class AdministratorController extends Controller
{
    public function index() {
        return view('administrator', [
            "title" => "Daftar Karyawan",
            "karyawan" => Karyawan::All(),
            "angka" => 1
        ]);
    }

    public function tambahKaryawan() {
        return view('tambah-karyawan', [
            "title" => "Tambah Karyawan",
            "karyawan" => Karyawan::All()
        ]);
    }

    public function simpanKaryawan(Request $request) {
        // dd($request);
        Session::flash('tambah', 'Berhasil menambahkan data!');
        Karyawan::create([
            "name" => $request->name,
            "email" => $request->email,
            "nik" => $request->nik,
            "departemen" => $request->departemen,
            "alamat" => $request->alamat,
            "tanggal_lahir" => $request->tanggal_lahir,
            "tanggal_join" => $request->tanggal_join,
        ]);

        return redirect('administrator');
    }

    public function hapusKaryawan(Request $request) {
        $req_id = $request->id;
        $user = Karyawan::find($req_id);
        $name = $user->name;
        $user->delete();
        Session::flash('hapus','Data berhasil di hapus!');
        return redirect()->back();

    }

    public function editKaryawan(Request $request) {
        $req_id = $request->id;
        
        return view('edit-karyawan', [
            "title" => "Daftar Karyawan",
            "karyawan" => Karyawan::find($req_id),
        ]);
    }

    public function simpanUpdateKaryawan(Request $request) {
        $req_id = $request->id;
        $req_name = $request->name;
        $req_email = $request->email;
        $req_nik = $request->nik;
        $req_alamat = $request->alamat;
        $req_departemen = $request->departemen;
        $req_tanggal_lahir = $request->tanggal_lahir;
        $req_tanggal_join = $request->tanggal_join;

        $absen = Karyawan::find($req_id);
        $absen->update([
            'name' => $req_name,
            'email' => $req_email,
            'nik' => $req_nik,
            'alamat' => $req_alamat,
            'departemen' => $req_departemen,
            'tanggal_lahir' => $req_tanggal_lahir,
            'tanggal_join' => $req_tanggal_join,
        ]);
        Session::flash('update', 'Data berhasil di ubah!');
        return redirect('administrator');
    }
}
