<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h8 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h8>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="container">
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('/addData')}}" href="{{url('/dokter')}}">
            @csrf
            {{ method_field('post') }}
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
                <input type="text" id="nama_dokter" class="form-control" name="nama_dokter" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="notelp_dokter">No.Telp</label>
              <div>
                <input type="text" id="notelp_dokter" class="form-control"  name="notelp_dokter" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <div>
                <input type="text" id="username" class="form-control"  name="username" required="required">
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
