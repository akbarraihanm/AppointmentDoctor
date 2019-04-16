<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jadwal = Jadwal::join('dokters','jadwals.dokter_id','dokters.id')
        ->select('jadwals.id','jadwals.dokter_id','jadwals.poli_id',
        'nama_dokter','jadwals.tanggal','jadwals.jam_mulai','jadwals.jam_selesai')
        ->get();
        return response()->json([
          'status'=>'success',
          'data'=>$jadwal
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
          'dokter_id'=>'required',
          'poli_id'=>'required',
          'tanggal'=>'required',
          'jam_mulai'=>'required',
          'jam_selesai'=>'required'
        ]);
        if(Jadwal::create($request->all())){
          return response()->json([
            'status'=>'success',
            'message'=>'Data has been added'
          ], 201);
        }
        else{
          return response()->json([
            'status' => 'error',
            'message' => 'Internal server error'
          ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jadwal = Jadwal::find($id);
        if($jadwal){
          return response()->json([
            'status'=>'success',
            'data'=>$jadwal
            ->join('dokters','jadwals.dokter_id','dokters.id')
            ->select('jadwals.id','jadwals.dokter_id','jadwals.poli_id',
            'nama_dokter','jadwals.tanggal','jadwals.jam_mulai','jadwals.jam_selesai')
            ->where('poli_id',$id)
            ->get()
          ]);
        }
        else{
          return response()->json([
            'status'=>'error',
            'message'=>'Data not found'
          ], 404);
        }
    }

    public function showJadwalDokter($id){
      $findJadwal = Dokter::find($id);
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
