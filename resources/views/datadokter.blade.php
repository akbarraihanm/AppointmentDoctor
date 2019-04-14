@include('layouts.header')
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
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Appointment</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pasien">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pasien</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/dokter">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Dokter</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/history">
          <i class="fas fa-fw fa-table"></i>
          <span>History Appointment</span></a>
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
                @include('layouts.modaltddokter')
                <a class="btn btn-primary tengah2" data-toggle="modal" data-target="#add" href="#add">Tambah Data</a>
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
                    <td>{{$d->notelp_dokter}}</td>
                    <td>
                      <form action="{{ url('/hapus', $d->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                      </form>
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

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
@include('layouts.scrollbutton')
  <!-- Logout Modal-->
@include('layouts.modal')

@include('layouts.script')

</body>

</html>
