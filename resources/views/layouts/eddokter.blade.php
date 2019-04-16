@include('layouts.header')
<br>
<style type="text/css">
.tengah {
    margin: 50px auto;
    margin-top: 10px auto;
    /* width: 800px; */
    /* padding: 10px; */
    /* border: 1px solid #ccc; */
    /* background: lightblue; */
}
    .tengah2 {
        /* margin-top: 5px; */
        margin-bottom: 20px;
    }
</style>
<div class="container">
  <div class="card card-body col-md-6 tengah">
    <form class="form-horizontal" method="POST" action="{{url('/updateData',$editData->id)}}" href="{{url('/dokter')}}">
      @csrf
      {{ method_field('PUT') }}
      <div class="form-group">
        <div>
          <label for="dropdown">Pilih Poli</label>
          <select name="poli_id" class="form-control" id="poli">
            @foreach($poli as $p)
            <option value="{{$p->id}}">{{$p->nama_poli}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
          <label for="nama_dokter">Nama Dokter</label>
        <div >
          <input type="text" id="nama_dokter" class="form-control" name="nama_dokter" value="{{$editData->nama_dokter}}">
        </div>
      </div>
      <div class="form-group">
        <label for="notelp_dokter">No.Telp</label>
        <div>
          <input type="text" id="notelp_dokter" class="form-control"  name="notelp_dokter" value="{{$editData->notelp_dokter}}">
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Ubah</button>
      </div>
    </form>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
