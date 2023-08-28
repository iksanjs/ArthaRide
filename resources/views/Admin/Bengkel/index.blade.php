<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="pTipe-top">

  <!-- PTipe Wrapper -->
  <div id="wrapper">

  @include('layout.admin_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin PTipe Content -->
        <div class="container-fluid">

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Kelola Data Bengkel</h1>
            <div>
              <a href="{{ route('bengkel.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
              </a>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Bengkel</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                    <th>No</th>
                                    <th>ID Bengkel</th>
                                    <th>Nama Bengkel</th>
                                    <th>Jenis Bengkel</th>
                                    <th>Alamat Bengkel</th>
                                    <th>No Telepon</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                    <th>No</th>
                                    <th>ID Bengkel</th>
                                    <th>Nama Bengkel</th>
                                    <th>Jenis Bengkel</th>
                                    <th>Alamat Bengkel</th>
                                    <th>No Telepon</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($bengkels as $bengkel)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$bengkel['id_bengkel']}}</td>
                                <td>{{$bengkel['nama_bengkel']}}</td>
                                <td>{{$bengkel['jenis_bengkel']}}</td>
                                <td>{{$bengkel['alamat_bengkel']}}</td>
                                <td>{{$bengkel['nomor_telepon']}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of PTipe Wrapper -->


  @include('layout.footer')
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
  } );
  </script>
</body>

</html>