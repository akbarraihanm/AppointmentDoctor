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
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->

        <!-- DataTables Example -->
        <div class="card mb-3 ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Jadwal Dokter</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <a class="btn btn-primary tengah2" data-toggle="modal" data-target="#add" href="#add">Tambah Data</a>
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Poli</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <form action="#" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="#" class="btn-primary btn">Ubah</a>
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
