<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="pTipe-top">

  <!-- PTipe Wrapper -->
  <div id="wrapper">

  @include('layout.pengurus_sidebar')

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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Approval Data Bengkel</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Data Bengkel</h6>
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
                                  <th>Status Approval</th>
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
                                  <th>Status Approval</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($hasil as $bengkel)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$bengkel['id_bengkel']}}</td>
                              <td>{{$bengkel['nama_bengkel']}}</td>
                              <td>{{$bengkel['jenis_bengkel']}}</td>
                              <td>{{$bengkel['alamat_bengkel']}}</td>
                              <td>{{$bengkel['nomor_telepon']}}</td>
                              <td>{{$bengkel['approval']}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Status Service Kendaraan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Data Service</th>
                                        <th>0</th>
                                    </tr>
                                    <tr>
                                        <td>Proses Approval</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Reject</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Approved</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th>Data Bengkel</th>
                                        <th>0</th>
                                    </tr>
                                    <tr>
                                    <td>Proses Approval</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Reject</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Approved</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Approval Data Bengkel</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>ID Bengkel</th>
                                    <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Bengkel</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($prosesbengkels as $bengkel)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$bengkel['id_bengkel']}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{$bengkel['id_bengkel']}}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Reject</span>
                                            </button>
                                        </td>
                                        <td>
                                        <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{$bengkel['id_bengkel']}}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check-square"></i>
                                            </span>
                                            <span class="text">Approve</span>
                                        </button>
                                        
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{$bengkel['id_bengkel']}}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                @foreach ($prosesbengkels as $bengkel)
                                <!-- Modal Approve pengajuan_pembelian -->
                                <div class="modal fade" id="approveModal{{$bengkel['id_bengkel']}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveModalLabel">Approve Data Bengkel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('bengkel.approved', $bengkel['id_bengkel'])}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span> Setuju
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
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