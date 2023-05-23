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
}
