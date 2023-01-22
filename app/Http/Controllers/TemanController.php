<?php

namespace App\Http\Controllers;

use App\Models\Teman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TemanController extends Controller
{
    public function index()
    {
        return view('pages.teman.list', [
            'title' => 'Daftar Teman'
        ]);
    }

    public function dataTeman()
    {
        $daftarTeman = Teman::all(['id', 'nama', 'alamat', 'pekerjaan']);
        $data = [];
        foreach ($daftarTeman as $key => $teman) {
            $btn_detail = "<a class='btn btn-success mr-3' href='#'> Detail </a>";
            $btn_edit = "<button class='btn btn-warning' type='button'> Edit </butt>";
            $data[] = array(
                "id" => $key + 1,
                "nama" => $teman->nama,
                "pekerjaan" => $teman->pekerjaan,
                "alamat" => $teman->alamat,
                'action' => $btn_detail . $btn_edit,
            );
        }
        $hasil = array(
            "data" => $data
        );
        return response()->json($hasil);
    }
}
