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
    .disabled {
        pointer-events: none;
        cursor: default;
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
        <div class="card card-body col-md-6 tengah">
          <form class="form-horizontal" method="POST" action="{{url('/updateData',$editData->id)}}" href="{{url('/dokter')}}">
            @csrf
            {{ method_field('PUT') }}
            <!-- <div class="form-group">
              <div>
                <label for="dropdown">Pilih Poli</label>
                <select name="poli_id" class="form-control" id="poli">
                  @foreach($poli as $p)
                  <option value="{{$p->id}}">{{$p->nama_poli}}</option>
                  @endforeach
                </select>
              </div>
            </div> -->
            <div class="form-group">
                <label for="nama_dokter">Nama Dokter</label>
              <div >
                <input type="text" id="nama_dokter" class="form-control" name="nama_dokter" value="{{$editData->nama_dokter}}">
              </div>
            </div>
            <div class="form-group">
              <label for="notelp_dokter">No.Telp</label>
              <div>
                <input type="text" id="notelp" class="form-control"  name="notelp" value="{{$editData->notelp}}">
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Ubah</button>
            </div>
          </form>
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
