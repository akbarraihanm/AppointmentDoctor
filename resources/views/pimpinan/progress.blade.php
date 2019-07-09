@include('layouts.headerpimpinan')

<style type="text/css">
.tengah {
    margin: 50px auto;
    margin-top: 10px auto;
    /* width: 800px; */
    /* padding: 10px; */
    border: 1px solid #ccc;
    /* background: lightblue; */
}
    .tengah2 {
        /* margin-top: 5px; */
        margin-bottom: 20px;
    }
</style>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/progress">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Progress Dokter</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/kunjungan/1">
          <i class="fas fa-fw fa-table"></i>
          <span>Kunjungan Pasien</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->

        <!-- DataTables Example -->

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Dokter</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Poli</th>
                    <th>No.Telp</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dokter as $d)
                  <tr>
                    <td>{{$d->nama_dokter}}</td>
                    <td>{{$d->nama_poli}}</td>
                    <td>{{$d->notelp}}</td>
                    <td>
                      <!--<form action="#" method="post">-->
                      <!--  {{ csrf_field() }}-->

                      <!--  <a class="btn btn-secondary" href="{{url('/jadwal',$d->id)}}">Lihat Progress</a>-->
                      <!--</form>-->
                      <a class="btn btn-secondary" href="{{url('/progress/dokter/'.$d->id.'/1')}}">Lihat Progress</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
@include('layouts.footer')
@include('layouts.modaltambahdata')
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
@include('layouts.scrollbutton')

  <!-- Logout Modal-->
@include('layouts.script')
</body>

</html>
