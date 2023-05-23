<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class CreatefaceidController extends Controller
{
    public function index () {
        return view ('createfaceid', [
            "title" => "Create Face ID",
            "karyawan" => Karyawan::All()
        ]);
    }
}
