<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Dokter;
use App\Appointment;
use Illuminate\Http\Request;

class AppoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->join('dokters','appointments.dokter_id','dokters.id')
        ->select('appointments.id','appointments.dokter_id','appointments.pasien_id','pasiens.nama_pasien',
        'appointments.status_appo','appointments.tanggal_appo')
        ->get();
        return response()->json([
          'status'=>'success',
          'data'=>$appo
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
          'pasien_id'=>'required',
          'dokter_id'=>'required',
          'dokpoli_id'=>'required',
          'tanggal_appo'=>'required'
        ]);
        if(Appointment::create([
          'pasien_id'=>$request->pasien_id,
          'dokter_id'=>$request->dokter_id,
          'dokpoli_id'=>$request->dokpoli_id,
          'status_appo'=>'Menunggu',
          'tanggal_appo'=>$request->tanggal_appo
          ])){
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
        $appo = Appointment::find($id);
        $appo->delete();
        if($appo){
          return response()->json([
            'status'=>'success',
            'message'=>'Data has been deleted'
          ]);
        }
        else{
          return response()->json([
            'status'=>'error',
            'message'=>'Cannot deleting data'
          ], 400);
        }
    }
}
