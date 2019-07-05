<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Poli;
use App\Jadwal;
use App\Pasien;
use App\Appointment;
use App\HistoryAppo;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //Admin
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        
        $admin = Admin::where('username',$username)->where('password',$password)->first();
        if(@count($admin) > 0){
            Session::put('username', $admin->username);
            Session::put('login', TRUE);
            return redirect('/appointment');
        }
        else{
            return redirect('/masuk-admin');
        }
    }
    
    public function loginPage(){
        return view('login');
    }
    
    public function logout(){
        Session::flush();
        return redirect('/masuk-admin');
    }
    
    //Appointment
    public function indexWebAppo()
    {
        //
        if(!Session::get('login')){
            return redirect('/masuk-admin');
        }
        else{
            $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
            ->join('dokters','appointments.dokter_id','dokters.id')
            ->join('polis','appointments.poli_id','polis.id')
            ->join('jadwals','appointments.jadwal_id','jadwals.id')
            ->select('appointments.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->get();
            return view('index',['appo'=>$appo]);
        }
    }
    
    public function deleteAppo($id){
      $appo = Appointment::find($id);
      $appo->delete();

      return redirect('/appointment');
    }
    
    //HistoryAppo
        public function indexHistoryAppo()
    {
        //
        if(!Session::get('login')){
            return redirect('/masuk-admin');
        }else{
            $appo = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('dokters','history_appos.dokter_id','dokters.id')
            ->join('polis','history_appos.poli_id','polis.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->get();
            return view('history',['appo'=>$appo]);            
        }
    }
    
    //Pasien
    public function dataPasien(){
        if(!Session::get('login')){
            return redirect('/masuk-admin');
        }else{
          $pasien = Pasien::all();
          return view('datapasien',['pasien'=>$pasien]);            
        }        
    }
    
    public function tambahDataPasien(Request $request){
      $this->validate($request, [
        'nama_pasien'=>'required|max:50',
        'alamat_pasien'=>'required',
        'norm_pasien'=>'required|unique:pasiens|max:6',
        'password'=>'required|max:15'
      ]);
      Pasien::create([
        'nama_pasien'=>$request->nama_pasien,
        'alamat_pasien'=>$request->alamat_pasien,
        'norm_pasien'=>$request->norm_pasien,
        'password'=>$request->password,
        'token_notif'=>'' 
      ]);
      return redirect('/pasien');
    } 
    
    public function deleteDataPasien($id){
      $pasien = Pasien::find($id);
      if($pasien){
        $appo = Appointment::join('pasiens','appointments.pasien_id','pasiens.id')
        ->where('pasien_id',$id)->delete();
      }
      $pasien->delete();
      return redirect('/pasien');
    }    
    
    //Dokter
    public function dataDokter(){
        if(!Session::get('login')){
            return redirect('/masuk-admin');
        }else{
          $dokter = Dokter::join('polis','dokters.poli_id','polis.id')
          ->select('dokters.*','polis.nama_poli')
          ->get();
          if($dokter){
            $poli = Poli::all();
            // edit($id)->editData;
            return view('datadokter',['dokter'=>$dokter,'poli'=>$poli]);
          }            
        }        
    }
    
    public function storeDataDokter(Request $request){
      $this->validate($request, [
        'poli_id'=>'required',
        'nama_dokter'=>'required',
        'notelp'=>'required|unique:dokters|max:12',
        'password'=>'required|min:4|max:15'
      ]);
      Dokter::create([
        'poli_id'=>$request->poli_id,
        'nama_dokter'=>$request->nama_dokter,
        'notelp'=>$request->notelp,
        'password'=>$request->password,
        'token_notif'=>''
      ]);
      return redirect('/dokter');
    }
    
    public function editDokter($id)
    {
        //
        $join = Dokter::join('polis','polis.id','=','dokters.poli_id');
        $editData = Dokter::find($id);
        $poli = Poli::all();
        $idPol = $join->select('dokters.poli_id')->where('dokters.id',$id)->get();
        $naPol = $join->select('polis.nama_poli')->where('dokters.id',$id)->get();
        return view('layouts.eddokter',['editData'=>$editData,'poli'=>$poli,'idPol'=>$idPol,'naPol'=>$naPol[0]->nama_poli]);
    }    
    
    public function updateDataDokter(Request $request, $id){
      $dokter = Dokter::find($id);
      if($dokter){
        $dokter->update($request->all());
        return redirect('/dokter');
      }

    }
    
    public function deleteDataDokter($id){
      $dokter = Dokter::find($id);
      if($dokter){
        $jadwal = Jadwal::join('dokters','jadwals.dokter_id','dokters.id')
        ->where('dokter_id',$id)->delete();
      }
      $dokter->delete();
      return redirect('/dokter');
    }
    
    //JadwalDokter
    public function showAllDataJadwal(){
        if(!Session::get('login')){
            return redirect('/masuk-admin');
        }else{
          $jadwal = Jadwal::join('dokters','jadwals.dokter_id','dokters.id')
          ->select('jadwals.*','dokters.nama_dokter')
          ->get();
          return view('datajadwal',['jadwal'=>$jadwal]);            
        }        
    }    
    
    public function storeDataJadwal(Request $request){
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
    
    public function deleteDataJadwal($id){
      $join = Jadwal::join('dokters','jadwals.dokter_id','dokters.id');
      $getIdDok = $join->select('dokters.id')->where('jadwals.id',$id)->first();
      $delete = Jadwal::find($id);
      $delete->delete();
      return redirect()->route('jadwal',['id'=>$getIdDok]);
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }
}
