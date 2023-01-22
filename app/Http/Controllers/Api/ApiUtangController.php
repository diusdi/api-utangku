<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UtangResource;
use App\Models\Utang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiUtangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarUtang = Utang::all();

        return new UtangResource(true, 'Daftar Teman', $daftarUtang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_teman'     => 'required',
            'nominal'   => 'required',
            'alasan'   => 'required',
            'tanggal_peminjaman'   => 'required',
            'tanggal_lunas'   => 'required',
            'keterangan_lunas'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $utang = Utang::create([
            'id_teman'     => $request->id_teman,
            'nominal'   => $request->nominal,
            'alasan'   => $request->alasan,
            'tanggal_peminjaman'   => $request->tanggal_peminjaman,
            'tanggal_lunas'   => $request->tanggal_lunas,
            'keterangan_lunas'   => $request->keterangan_lunas,
        ]);

        //return response
        return new UtangResource(true, 'Data Teman Berhasil Ditambahkan!', $utang);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($utang)
    {
        $teman = DB::table('utang')
            ->select('*')
            ->where('id', 'like', "%" . $utang . "%")
            ->get();
        if ($teman->isEmpty()) {
            return new UtangResource(false, 'Data Utang Tidak Ditemukan!', $teman);
        }
        return new UtangResource(true, 'Data Utang Ditemukan!', $teman);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utang $utang)
    {
        $validator = Validator::make($request->all(), [
            'id_teman'     => 'required',
            'nominal'   => 'required',
            'alasan'   => 'required',
            'tanggal_peminjaman'   => 'required',
            'tanggal_lunas'   => 'required',
            'keterangan_lunas'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $utang->update([
            'id_teman'     => $request->id_teman,
            'nominal'   => $request->nominal,
            'alasan'   => $request->alasan,
            'tanggal_peminjaman'   => $request->tanggal_peminjaman,
            'tanggal_lunas'   => $request->tanggal_lunas,
            'keterangan_lunas'   => $request->keterangan_lunas,
        ]);

        //return response
        return new UtangResource(true, 'Data Utang Berhasil Diubah!', $utang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utang $utang)
    {
        $utang->delete();

        return new UtangResource(true, 'Data Utang Berhasil Dihapus!', null);
    }

    public function search($id)
    {
        $teman = DB::table('utang')
            ->select('*')
            ->where('id_teman', 'like', "%" . $id . "%")
            ->get();
        if ($teman->isEmpty()) {
            return new UtangResource(false, 'Data Teman Tidak Ditemukan!', $teman);
        }
        return new UtangResource(true, 'Data Teman Ditemukan!', $teman);
    }
}
