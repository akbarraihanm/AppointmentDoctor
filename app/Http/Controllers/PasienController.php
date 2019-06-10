<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasien = Pasien::all();
        // $pasien = Pasien::all();
        return response()->json([
          'status'=>'success',
          'data'=>$pasien
        ]);
    }

    public function dataPasien(){
      $pasien = Pasien::all();
      return view('datapasien',['pasien'=>$pasien]);
    }

    public function login(Request $request){
      $norm_pasien = $request->norm_pasien;
      $password = $request->password;

      $pasien = Pasien::where('norm_pasien',$norm_pasien)->first();
      if(@count($pasien) > 0){
        $pasien = Pasien::where('password',$password)->first();
        if(@count($pasien) > 0){
          Session::put('id',$pasien->id);
          return response()->json([
            'status'=>'sukses',
            'pesan'=>'Anda berhasil masuk',
            'id_pasien'=>Session::get('id')
          ]);
        }
        else{
          return response()->json([
            'status'=>'gagal',
            'pesan'=>'Password Anda salah'
          ]);
        }
      }
      else{
        return response()->json([
          'status'=>'gagal',
          'pesan'=>'Masukkan email dan password dengan benar'
        ]);
      }
    }

    public function logout(){
        Session::flush();
        return response()->json([
          'status'=>'sukses',
          'pesan'=>'Anda berhasil keluar',
          'login_status'=>Session::flush()
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
        $this->validate($request, [
          'nama_pasien'=>'required|max:50',
          'alamat_pasien'=>'required',
          'norm_pasien'=>'required|unique:pasiens|max:6',
          'password'=>'required|max:15'
        ]);
        if(Pasien::create($request->all())){
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

    public function tambahData(Request $request){
      $this->validate($request, [
        'nama_pasien'=>'required|max:50',
        'alamat_pasien'=>'required',
        'norm_pasien'=>'required|unique:pasiens|max:6',
        'password'=>'required|max:15'
      ]);
      Pasien::create($request->all());
      return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id = $request->query('id');
        $pasien = Pasien::select('pasiens.*')->where('id',$id)->get();
        if($pasien){
          return response()->json([
            'status'=>'success',
            'data'=>$pasien
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
    public function update(Request $request)
    {
        //
        $id = $request->query('id');
        $pasien = Pasien::where('id',$id)->first();
        if($pasien){
          $pasien->update($request->all());
          return response()->json([
            'status'=>'success',
            'message'=>'Data has been updated'
          ]);
        }
        else{
          return response()->json([
            'status'=>'error',
            'message'=>'Cant updating data'
          ], 400);
        }
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
        $pasien = Pasien::find($id);
        if($pasien){
          $pasien->delete();
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
      $pasien = Pasien::find($id);
      if($pasien){
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->where('pasien_id',$id)->delete();
      }
      $pasien->delete();
      return redirect('/pasien');
    }
}
