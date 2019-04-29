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
    <form class="form-horizontal" method="POST" action="{{url('/daftar')}}" href="{{url('/pasien')}}">
      @csrf
      {{ method_field('post') }}

      <div class="form-group">
        <div >
          <input type="text" id="dokter_id" class="form-control" name="dokter_id" value="{{$dokterId}}" required="required">
        </div>
      </div>
      <div class="form-group">
        <div >
          <input type="text" id="poli_id" class="form-control" name="poli_id" value="{{$poliId}}" required="required">
        </div>
      </div>

      <div class="form-group">
          <label for="nama_pasien">Tanggal</label>
        <div >
          <input type="date" id="tanggal" class="form-control" name="tanggal" required="required">
        </div>
      </div>
      <div class="form-group">
        <label for="alamat_pasien">Jam Mulai</label>
        <div>
          <input type="text" id="jam_mulai" class="form-control"  name="jam_mulai" required="required">
        </div>
      </div>
      <div class="form-group">
        <label for="alamat_pasien">Jam Selesai</label>
        <div>
          <input type="text" id="jam_selesai" class="form-control"  name="jam_selesai" required="required">
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
