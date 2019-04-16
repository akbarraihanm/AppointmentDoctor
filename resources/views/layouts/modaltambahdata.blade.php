<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h8 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h8>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="container">
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('/daftar')}}" href="{{url('/pasien')}}">
            @csrf
            {{ method_field('post') }}
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
              <div >
                <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat_pasien">Alamat</label>
              <div>
                <input type="text" id="alamat_pasien" class="form-control"  name="alamat_pasien" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="notelp_pasien">No.Telp</label>
              <div>
                <input type="text" id="notelp_pasien" class="form-control"  name="notelp_pasien" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="norm_pasien">No.Rekam Medis</label>
              <div>
                <input type="text" id="firstName" class="form-control"  name="norm_pasien" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div>
                <input type="password" id="password" class="form-control"  name="password" required="required">
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
