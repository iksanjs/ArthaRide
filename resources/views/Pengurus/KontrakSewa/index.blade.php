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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Kontrak Sewa</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Kontrak Sewa</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                    <th>No</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Biaya Sewa</th>
                                    <th>No Polisi</th>
                                    <th>ID Penyewa</th>
                                    <th>ID Pemakai</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                    <th>No</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Biaya Sewa</th>
                                    <th>No Polisi</th>
                                    <th>ID Penyewa</th>
                                    <th>ID Pemakai</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Keterangan</th>
                              </tr>
                          </tfoot>
                          <tbody>
                                @foreach ($kontraksewas as $kontraksewa)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kontraksewa['id_kontraksewa']}}</td>
                                    <td>{{$kontraksewa['tgl_sewa']}}</td>
                                    <td>{{$kontraksewa['tgl_akhir']}}</td>
                                    <td>{{$kontraksewa['biaya_sewa']}}</td>
                                    <td>{{$kontraksewa['no_polisi']}}</td>
                                    <td>{{$kontraksewa['id_penyewa']}}</td>
                                    <td>{{$kontraksewa['id_pemakai']}}</td>
                                    <td>{{$kontraksewa['status']}}</td>
                                    <td>{{$kontraksewa['approval']}}</td>
                                    <td>{{$kontraksewa['keterangan']}}</td>
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
                        <h6 class="m-0 font-weight-bold text-primary">Status Transaksi Sewa</h6>
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
                                        <th>Surat Pengajuan Permohonan Sewa</th>
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
                                        <th>Kontrak Sewa</th>
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
                                        <th>Berita Serah Terima Kendaraan</th>
                                        <th>0</th>
                                        
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
                        <h6 class="m-0 font-weight-bold text-primary">Approval Kontrak Sewa</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kontrak Sewa</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($proses_kontraksewas as $proses_kontraksewa)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$proses_kontraksewa['id_kontraksewa']}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{$proses_kontraksewa['id_kontraksewa']}}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Reject</span>
                                            </button>
                                        </td>
                                        <td>
                                        <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{$proses_kontraksewa['id_kontraksewa']}}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check-square"></i>
                                            </span>
                                            <span class="text">Approve</span>
                                        </button>
                                        
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{$proses_kontraksewa['id_kontraksewa']}}">
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
                                <!-- Modal Approve pengajuan_pembelian -->
                                @foreach ($proses_kontraksewas as $proses_kontraksewa)
                                <div class="modal fade" id="approveModal{{$proses_kontraksewa['id_kontraksewa']}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveModalLabel">Approve SPPK</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('kontraksewa.approved', $proses_kontraksewa['id_kontraksewa'])}}" method="POST">
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