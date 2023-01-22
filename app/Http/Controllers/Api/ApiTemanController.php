<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TemanResource;
use App\Models\Teman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ApiTemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarTeman = Teman::all();

        return new TemanResource(true, 'Daftar Teman', $daftarTeman);
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
            'nama'     => 'required',
            'alamat'     => 'required',
            'pekerjaan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $teman = Teman::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
        ]);

        //return response
        return new TemanResource(true, 'Data Teman Berhasil Ditambahkan!', $teman);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teman $teman)
    {
        return new TemanResource(true, 'Data Teman Ditemukan!', $teman);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teman $teman)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'alamat'     => 'required',
            'pekerjaan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $teman->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
        ]);

        //return response
        return new TemanResource(true, 'Data Teman Berhasil Diubah!', $teman);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teman $teman)
    {
        $teman->delete();

        return new TemanResource(true, 'Data Teman Berhasil Dihapus!', null);
    }

    public function search($nama)
    {
        $teman = DB::table('teman')
                ->select('*')
                ->where('nama','like',"%".$nama."%")
                ->get();
        
        if($teman->isEmpty()){
            return new TemanResource(false, 'Data Teman Tidak Ditemukan Ditemukan!', $teman);
        }
        return new TemanResource(true, 'Data Teman Ditemukan!', $teman);

    }
}
