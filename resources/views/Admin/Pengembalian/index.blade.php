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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Pengembalian Kendaraan Sewa</h1>
            <div>
              <a href="{{route('pengembalian.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
              </a>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengembalian Kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>ID Pengembalian</th>
                              <th>Tanggal Pengembalian</th>
                              <th>Alasan</th>
                              <th>ID Kontrak Sewa</th>
                              <th>Status</th>
                              <th>Approval</th>
                              <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>ID Pengembalian</th>
                              <th>Tanggal Pengembalian</th>
                              <th>Alasan</th>
                              <th>ID Kontrak Sewa</th>
                              <th>Status</th>
                              <th>Approval</th>
                              <th>Keterangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($pengembalians as $pengembalian)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$pengembalian['id_pengembalian']}}</td>
                                  <td>{{$pengembalian['tgl_pengembalian']}}</td>
                                  <td>{{$pengembalian['alasan']}}</td>
                                  <td>{{$pengembalian['id_kontraksewa']}}</td>
                                  <td>{{$pengembalian['status']}}</td>
                                  <td>{{$pengembalian['approval']}}</td>
                                  <td>{{$pengembalian['keterangan']}}</td>
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
              <h6 class="m-0 font-weight-bold text-primary">Status Sewa Kendaraan</h6>
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
                              <th>Pengajuan Pembelian</th>
                              <th></th>
                          </tr>
                          <tr>
                              <td>Proses Approval</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Reject</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Approved</td>
                              <td></td>
                          </tr>
                          <tr>
                              <th>Transaksi Pembelian</th>
                              <th></th>
                          </tr>
                          <tr>
                            <td>Proses Approval</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td></td>
                        </tr>
                          <tr>
                              <th>Serah Terima Dealer ke Wahana</th>
                              <th></th>
                              
                          <tr>
                            <td>Proses Approval</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td></td>
                        </tr>
                          </tr>
                      </tbody>
                  </table>
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