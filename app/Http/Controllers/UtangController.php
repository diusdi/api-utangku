<?php

namespace App\Http\Controllers;

use App\Models\Utang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.utang.list', [
            'title' => 'Daftar Utang'
        ]);
    }

    public function dataUtang()
    {
        $daftarUtang = DB::table('utang')
                        ->select('utang.id', 'id_teman', 'nominal', 'keterangan_lunas', 'teman.nama')
                        ->join('teman', 'teman.id', '=', 'utang.id_teman')
                        ->get();
        // $daftarUtang = Utang::all(['id', 'id_teman', 'nominal', 'keterangan_lunas']);
        $data = [];
        foreach ($daftarUtang as $key => $utang) {
            $btn_detail = "<a class='btn btn-success mr-3' href='#'> Detail </a>";
            $data[] = array(
                "id" => $key + 1,
                "nama" => $utang->nama,
                "nominal" => $utang->nominal,
                "keterangan" => $utang->keterangan_lunas,
                'action' => $btn_detail,
            );
        }
        $hasil = array(
            "data" => $data
        );
        return response()->json($hasil);
    }
}
