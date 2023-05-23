<?php

namespace App\Http\Controllers;

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

    public function daftarAbsensi() {
        return view('daftar-absensi', [
            "title" => "Daftar Absensi",
            "karyawan" => Karyawan::All()
        ]);
    }

    public function hapusKaryawan(Request $request) {
        $req_id = $request->id;
        $user = Karyawan::find($req_id);
        $name = $user->name;
        if ($user->delete() == true) {
            echo 'Karyawan ' , $name , ' has been deleted';
            // return redirect('administrator', [
            //     "result_delete" => true
            // ]);
            return redirect('administrator');
        }
        else {
            return redirect('administrator', [
                "result_delete" => false
            ]);
        }

    }
}
