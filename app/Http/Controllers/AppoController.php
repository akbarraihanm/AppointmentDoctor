<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Dokter;
use App\Appointment;
use App\Poli;
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
        ->join('polis','appointments.poli_id','polis.id')
        ->select('appointments.*','pasiens.nama_pasien','pasiens.norm_pasien',
        'dokters.nama_dokter','polis.nama_poli')
        ->get();
        return response()->json([
          'status'=>'success',
          'data'=>$appo
        ]);
    }

    public function indexWeb()
    {
        //
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->join('dokters','appointments.dokter_id','dokters.id')
        ->join('polis','appointments.poli_id','polis.id')
        ->select('appointments.*','pasiens.nama_pasien','pasiens.norm_pasien',
        'dokters.nama_dokter','polis.nama_poli')
        ->get();
        return view('index',['appo'=>$appo]);
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
          'poli_id'=>'required',
          'tanggal'=>'required'
        ]);
        if(Appointment::create([
          'pasien_id'=>$request->pasien_id,
          'dokter_id'=>$request->dokter_id,
          'poli_id'=>$request->poli_id,
          'tanggal'=>$request->tanggal,
          'status_appo'=>'Menunggu',
          'keterangan'=>''
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
    public function showByPasienId(Request $request)
    {
        //
        $id = $request->query('id');
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->join('dokters','appointments.dokter_id','dokters.id')
        ->join('polis','appointments.poli_id','polis.id')
        ->select('appointments.*','pasiens.nama_pasien','pasiens.norm_pasien',
        'dokters.nama_dokter','polis.nama_poli')
        ->where('pasiens.id',$id)
        ->get();
        if($appo){
          return response()->json([
            'status'=>'sukses',
            'data'=>$appo
          ]);
        }
    }
    public function showByDokterId(Request $request)
    {
        //
        $id = $request->query('id');
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->join('dokters','appointments.dokter_id','dokters.id')
        ->join('polis','appointments.poli_id','polis.id')
        ->select('appointments.*','pasiens.nama_pasien')
        ->where('dokters.id',$id)
        ->get();
        if($appo){
          return response()->json([
            'status'=>'sukses',
            'data'=>$appo
          ]);
        }
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
    public function update(Request $request)
    {
        //
        $id = $request->query('id');
        $appo = Appointment::where('id',$id)->first();
        if($appo){
          $appo->update($request->all());
          return response()->json([
            'status'=>'sukses',
            'pesan'=>'Berhasil update data'
          ]);
        }
        else{
          return response()->json([
            'status'=>'error',
            'pesan'=>'Tidak dapat update data'
          ]);
        }
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

    public function delete($id){
      $appo = Appointment::find($id);
      $appo->delete();

      return redirect('/');
    }
}
