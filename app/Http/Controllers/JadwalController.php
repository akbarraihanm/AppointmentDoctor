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
        ->select('jadwals.*','dokters.nama_dokter')
        ->get();
        return response()->json([
          'status'=>'success',
          'data'=>$jadwal
        ]);

    }

    public function showAllData(){
      $jadwal = Jadwal::join('dokters','jadwals.dokter_id','dokters.id')
        ->select('jadwals.*','dokters.nama_dokter')
      ->get();
      return view('datajadwal',['jadwal'=>$jadwal]);
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
        $this->validate($request, [
          'dokter_id'=>'required',
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

    public function storeData(Request $request){
      $this->validate($request, [
        'dokter_id'=>'required',
        'tanggal'=>'required',
        'jam_mulai'=>'required',
        'jam_selesai'=>'required'
      ]);
      Jadwal::create($request->all());
      $id = $request->dokter_id;
      // $test = Jadwal::where('id',$id)->first();
      return redirect()->route('jadwal',['id'=>$id]);
    }

    public function show(Request $request){
      $id = $request->query('id');
      $jadwal = Jadwal::join('dokters','dokters.id','=','jadwals.dokter_id')
        ->select('jadwals.*','dokters.nama_dokter')
      ->where('jadwals.id',$id)
      ->get();
      if($jadwal){
        return response()->json([
          'status'=>'success',
          'data'=>$jadwal
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByDokterId(Request $request)
    {
        //
        $id = $request->query('id');
        $jadwal = Jadwal::join('dokters','dokters.id','=','jadwals.dokter_id')
        ->select('jadwals.*','dokters.nama_dokter')
        ->where('dokter_id',$id)
        ->orderBy('jadwals.tanggal','DESC')
        ->get();
        if($jadwal){
          return response()->json([
            'status'=>'success',
            'data'=>$jadwal
          ]);
        }
        else{
          return response()->json([
            'status'=>'error',
            'message'=>'Data not found'
          ], 404);
        }
    }
    
    public function showByJadwal(Request $request){
        $tgl = $request->query('tanggal');
        $id = $request->query('dokter_id');
        $jadwal = Jadwal::join('dokters','dokters.id','=','jadwals.dokter_id')
        ->select('jadwals.*','dokters.nama_dokter')
        ->where('tanggal',$tgl)
        ->where('dokter_id',$id)
        ->get();   
        if($jadwal){
          return response()->json([
            'status'=>'success',
            'data'=>$jadwal
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
      $findJadwal = Jadwal::join('dokters','dokters.id','=','jadwals.dokter_id')
        ->select('jadwals.*','dokters.nama_dokter')
      ->where('dokter_id',$id)
      ->get();
      if($findJadwal){
        $findPoli = Dokter::select('poli_id','nama_dokter')
        ->where('id',$id)
        ->get();
        $findIdPoli = $findPoli[0]->poli_id;
        $namaDokter = $findPoli[0]->nama_dokter;
        return view('datajadwal',['findJadwal'=>$findJadwal
              ,'dokterId'=>$id
              ,'poliId'=>$findIdPoli
              ,'namaDokter'=>$namaDokter]);
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
    public function destroy(Request $request)
    {
        //
        $id = $request->query('id');
        $deleteJadwal = Jadwal::find($id);
        if($deleteJadwal){
          $deleteJadwal->delete();
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

    public function deleteData($id){
      $join = Jadwal::join('dokters','jadwals.dokter_id','dokters.id');
      $getIdDok = $join->select('dokters.id')->where('jadwals.id',$id)->first();
      $delete = Jadwal::find($id);
      $delete->delete();
      return redirect()->route('jadwal',['id'=>$getIdDok]);
    }
}
