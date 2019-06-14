@include('layouts.header')
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item active">
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
    <li class="nav-item">
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

<!--Page Source !-->
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->

        <!-- Icon Cards-->

        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Permintaan Appointment</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>No. Rekam Medis</th>
                    <th>Dokter Tujuan</th>
                    <th>Poli Tujuan</th>
                    <th>Tanggal</t>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($appo as $a)
                  <tr>
                    <td>{{$a->nama_pasien}}</td>
                    <td>{{$a->norm_pasien}}</td>
                    <td>{{$a->nama_dokter}}</td>
                    <td>{{$a->nama_poli}}</td>
                    <td>{{$a->tanggal}}</td>
                    <td>{{$a->status_appo}}</td>
                    <td>{{$a->keterangan}}</td>
                    <td>
                      <form action="{{ url('/hapus/appo', $a->id) }}" method="post">
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
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    <!-- /.content-wrapper -->
  @include('layouts.footer')
      </div>
    </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
@include('layouts.scrollbutton')


  <!-- Logout Modal-->
@include('layouts.modal')

@include('layouts.script')
</body>

</html>
