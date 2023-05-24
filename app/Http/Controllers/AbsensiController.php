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
}
