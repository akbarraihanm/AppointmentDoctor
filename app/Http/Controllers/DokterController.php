<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokter = Dokter::join('polis','dokters.poli_id','=','polis.id')
        ->select('dokters.id','dokters.poli_id','nama_poli','dokters.nama_dokter','dokters.notelp_dokter')
        ->get();
        if($dokter){
          return response()->json([
            'status'=>'success',
            'data'=>$dokter
          ]);
        }
    }

    public function dataDokter(){
      $dokter = Dokter::join('polis','dokters.poli_id','polis.id')
      ->select('dokters.id','nama_poli','dokters.nama_dokter','dokters.notelp_dokter')
      ->get();
      if($dokter){
        $poli = Poli::all();
        return view('datadokter',['dokter'=>$dokter,'poli'=>$poli]);
      }
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
          'poli_id'=>'required',
          'nama_dokter'=>'required',
          'notelp_dokter'=>'required|unique:dokters|max:12',
          'username'=>'required|unique:dokters|max:15',
          'password'=>'required|min:4|max:15'
        ]);
        if(Dokter::create($request->all())){
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
        'poli_id'=>'required',
        'nama_dokter'=>'required',
        'notelp_dokter'=>'required|unique:dokters|max:12',
        'username'=>'required|unique:dokters|max:15',
        'password'=>'required|min:4|max:15'
      ]);
      Dokter::create($request->all());
      return redirect('/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokter = Dokter::find($id);
        if($dokter){
          return response()->json([
            'status'=>'success',
            'data'=>$dokter
            ->join('polis','polis.id','=','dokters.poli_id')
            ->select('dokters.id','dokters.poli_id','nama_poli','dokters.nama_dokter','dokters.notelp_dokter')
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
