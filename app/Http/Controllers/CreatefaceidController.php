<?php

namespace App\Http\Controllers;

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
        // $faceid1 = json_encode($request->faceid);
        // $faceid2 = json_encode($request->faceid);

        // create db
        Faceid::create([
            "karyawan_id" => $req_id,
            "faceid1" => $request->faceid,
            "faceid2" => $request->faceid,
        ]);

        return redirect('administrator');
    }
}
