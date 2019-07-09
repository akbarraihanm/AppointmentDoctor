<?php

namespace App\Http\Controllers;

use App\Pimpinan;
use App\Dokter;
use App\Poli;
use App\Jadwal;
use App\Pasien;
use App\Appointment;
use App\HistoryAppo;
use App\Bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PimpinanController extends Controller
{
    //Pimpinan
    public function loginPage(){
        return view('pimpinan.login');
    }
    
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        
        $pimpinan = Pimpinan::where('username',$username)->where('password',$password)->first();
        if(@count($pimpinan) > 0){
            Session::put('usernamePimpinan',$pimpinan->username);
            Session::put('loginPimpinan',TRUE);
            return redirect('/progress');
        }
        else{
            return redirect('/masuk-pimpinan');
        }
    }
    
    public function logout(){
        Session::flush();
        return redirect('/masuk-pimpinan');
    }    
    
    //Progress Dokter
    public function dataDokter(){
        if(!Session::get('loginPimpinan')){
            return redirect('/masuk-pimpinan');
        }else{
          $dokter = Dokter::join('polis','dokters.poli_id','polis.id')
          ->select('dokters.*','polis.nama_poli')
          ->get();
          if($dokter){
            return view('pimpinan.progress',['dokter'=>$dokter]);
          }            
        }        
    }
    
    public function progress($id, $month){
        if(!Session::get('loginPimpinan')){
            return redirect('/masuk-pimpinan');
        }else{
            $appo = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('dokters','history_appos.dokter_id','dokters.id')
            ->join('polis','history_appos.poli_id','polis.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->selectRaw("Month(jadwals.tanggal) as month")
            ->where('dokters.id',$id)
            ->whereMonth('jadwals.tanggal',$month)
            // ->whereRaw('bulan',$month)
            ->get();
            
            $diterima = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('dokters','history_appos.dokter_id','dokters.id')
            ->join('polis','history_appos.poli_id','polis.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->selectRaw("Month(jadwals.tanggal) as month")
            ->where('dokters.id',$id)
            ->whereMonth('jadwals.tanggal',$month)
            ->where('history_appos.status_appo',"Diterima")
            // ->whereRaw('bulan',$month)
            ->get();
            
            $dibatalkan = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('dokters','history_appos.dokter_id','dokters.id')
            ->join('polis','history_appos.poli_id','polis.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->selectRaw("Month(jadwals.tanggal) as month")
            ->where('dokters.id',$id)
            ->whereMonth('jadwals.tanggal',$month)
            ->where('history_appos.status_appo',"Dibatalkan")
            // ->whereRaw('bulan',$month)
            ->get();
            
            $norespon = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('dokters','history_appos.dokter_id','dokters.id')
            ->join('polis','history_appos.poli_id','polis.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            ->selectRaw("Month(jadwals.tanggal) as month")
            ->where('dokters.id',$id)
            ->whereMonth('jadwals.tanggal',$month)
            ->where('history_appos.status_appo',"Menunggu")
            // ->whereRaw('bulan',$month)
            ->get();             
            
            $arrayBulan = Bulan::all();
            $bulanTerpilih = Bulan::find($month);
            $namaDokter = Dokter::find($id);
            return view('pimpinan.detailprogress', [
                'appo'=>$appo,
                'nadok'=>$namaDokter,
                'diterima'=>$diterima,
                'batal'=>$dibatalkan,
                'bulan'=>$arrayBulan,
                'bln'=>$bulanTerpilih,
                'norespon'=>$norespon
            ]);            
        }        
    }
    
    //KunjunganPasien
    public function kunjungan($month){
        if(!Session::get('loginPimpinan')){
            return redirect('/masuk-pimpinan');
        }else{
            // $appo = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            // ->join('dokters','history_appos.dokter_id','dokters.id')
            // ->join('polis','history_appos.poli_id','polis.id')
            // ->join('jadwals','history_appos.jadwal_id','jadwals.id')
            // ->select('history_appos.*','pasiens.nama_pasien','pasiens.norm_pasien',
            // 'dokters.nama_dokter','polis.nama_poli','jadwals.tanggal')
            // ->whereMonth('jadwals.tanggal',$month)            
            // ->get();
            
            $appo = HistoryAppo::join('pasiens','history_appos.pasien_id','pasiens.id')
            ->join('jadwals','history_appos.jadwal_id','jadwals.id')            
            ->select('history_appos.pasien_id')
            ->whereMonth('jadwals.tanggal',$month)            
            ->get();            
            
            $arrayBulan = Bulan::all();
            $bulanTerpilih = Bulan::find($month);
            
            return view('pimpinan.kunjunganpasien', [
                'appo'=>$appo,
                'bulan'=>$arrayBulan,
                'bln'=>$bulanTerpilih,
            ]);
        }        
    }
}
