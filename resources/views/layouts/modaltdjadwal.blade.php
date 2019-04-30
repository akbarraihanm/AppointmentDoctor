<div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h8 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h8>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="container">
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('/tambah-jadwal')}}">
            @csrf
            {{ method_field('post') }}
            <div class="form-group">
              <div >
                <input type="hidden" id="dokter_id" class="form-control" name="dokter_id" value="{{$dokterId}}" required="required">
              </div>
            </div>
            <div class="form-group">
              <div >
                <input type="hidden" id="poli_id" class="form-control" name="poli_id" value="{{$poliId}}" required="required">
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
                <input type="time" id="jam_mulai" class="form-control"  name="jam_mulai" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat_pasien">Jam Selesai</label>
              <div>
                <input type="time" id="jam_selesai" class="form-control"  name="jam_selesai" required="required">
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

    </div>
  </div>
</div>
