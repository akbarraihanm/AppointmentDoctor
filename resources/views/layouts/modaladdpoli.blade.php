<div class="modal fade" id="addPoli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h8 class="modal-title" id="exampleModalLabel">Tambah Data Poli</h8>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="container">
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('/addpoli')}}">
            @csrf
            {{ method_field('post') }}
            <div class="form-group">
            </div>
            <div class="form-group">
                <label for="nama_dokter">Nama Poli</label>
              <div >
                <input type="text" id="nama_poli" class="form-control" name="nama_poli" maxlength="45" required="required">
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
