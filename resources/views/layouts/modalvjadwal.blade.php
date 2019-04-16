<div class="modal fade" id="viewjadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h8 class="modal-title" id="exampleModalLabel">Lihat Jadwal Dokter</h8>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="container">
        <div class="card-body">
          <form class="form-horizontal" method="GET" action="" href="#">
            @csrf
            {{ method_field('get') }}
            <div class="form-group">
              <div>
                <label for="dropdown">Pilih Poli</label>
                <select name="id" class="form-control" id="poli">
                  @foreach($poli as $p)
                  <option value="{{$p->id}}">{{$p->nama_poli}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Lihat</button>
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
