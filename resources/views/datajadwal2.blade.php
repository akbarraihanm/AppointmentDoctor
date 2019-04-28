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
    .tengah3 {
        /* margin-top: 5px; */
        margin-left: 10px;
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

        <!-- Breadcru@include('layouts.header')
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
    .tengah3 {
        /* margin-top: 5px; */
        margin-left: 10px;
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

                <a class="btn btn-primary tengah2" href="#">Tambah Data</a>
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$findJadwal[0]->tanggal}}</td>
                    <td>{{$findJadwal[0]->jam_mulai}}</td>
                    <td>{{$findJadwal[0]->jam_selesai}}</td>
                    <td>
                      <form action="{{url('/deleteData',$findJadwal[0]->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{url('/edit',$findJadwal[0]->id)}}" class="btn-primary btn">Ubah</a>
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
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
mbs-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Dokter</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <a class="btn btn-primary tengah2" href="{{url('/jadwal/tambah',$findJadwal[0]->dokter_id)}}">Tambah Data</a>
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($findJadwal as $f)
                  <tr>
                    <td>{{$f->tanggal}}</td>
                    <td>{{$f->jam_mulai}}</td>
                    <td>{{$f->jam_selesai}}</td>
                    <td>
                      <form action="{{url('/deleteData',$f->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{url('/edit',$f->id)}}" class="btn-primary btn">Ubah</a>
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