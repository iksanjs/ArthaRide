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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Approval Data Service</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Data Service</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                  <th>No</th>
                                  <th>ID Service</th>
                                  <th>No Polisi</th>
                                  <th>ID Kontrak Sewa</th>
                                  <th>ID Bengkel</th>
                                  <th>KM</th>
                                  <th>KM Selanjutnya</th>
                                  <th>Jenis Service</th>
                                  <th>Harga Jasa</th>
                                  <th>Total Harga</th>
                                  <th>Status Approval</th>
                                  <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                  <th>No</th>
                                  <th>ID Service</th>
                                  <th>No Polisi</th>
                                  <th>ID Kontrak Sewa</th>
                                  <th>ID Bengkel</th>
                                  <th>KM</th>
                                  <th>KM Selanjutnya</th>
                                  <th>Jenis Service</th>
                                  <th>Harga Jasa</th>
                                  <th>Total Harga</th>
                                  <th>Status Approval</th>
                                  <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($hasil as $service)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$service['id_service']}}</td>
                              <td>{{$service['no_polisi']}}</td>
                              <td>{{$service['id_kontraksewa']}}</td>
                              <td>{{$service['id_bengkel']}}</td>
                              <td>{{$service['km']}}</td>
                              <td>{{$service['km_selanjutnya']}}</td>
                              <td>{{$service['jenis_service']}}</td>
                              <td>{{$service['harga_jasa']}}</td>
                              <td>{{$service['total_harga_service']}}</td>
                              <td>{{$service['approval']}}</td>
                              <td>
                                <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{$service['id_service']}}">
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
                        <h6 class="m-0 font-weight-bold text-primary">Approval Data Service</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>ID Service</th>
                                    <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Service</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($prosesservices as $service)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$service['id_service']}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{$service['id_service']}}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Reject</span>
                                            </button>
                                        </td>
                                        <td>
                                        <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{$service['id_service']}}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check-square"></i>
                                            </span>
                                            <span class="text">Approve</span>
                                        </button>
                                        
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{$service['id_service']}}">
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
                                @foreach ($prosesservices as $service)
                                <!-- Modal Approve pengajuan_pembelian -->
                                <div class="modal fade" id="approveModal{{$service['id_service']}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveModalLabel">Approve Data Service</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('service.approved', $service['id_service'])}}" method="POST">
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
                                
                                @foreach ($hasil as $service)
                            <div class="modal fade" id="detailModal{{$service['id_service']}}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="detailModalLabel">Detail Service</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4"><h5><b>Data service</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>ID service</b></td>
                                                            <td><b>{{$service['id_service']}}</b></td>
                                                            <td><b>No Polisi</b></td>
                                                            <td>{{$service['no_polisi']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Jenis Service</b></td>
                                                            <td>{{$service['jenis_service']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>KM Kendaraan</b></td>
                                                            <td>{{$service['km']}}</td>
                                                            <td><b>KM Service Selanjutnya</b></td>
                                                            <td>{{$service['km_selanjutnya']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Tanggal Masuk Service</b></td>
                                                            <td>{{$service['tanggal_penerima_service']}}</td>
                                                            <td><b>Tanggal Keluar Service</b></td>
                                                            <td>{{$service['tanggal_penyerahan_service']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"><h5><b>Data Perbaikan</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Nama Barang</b></td>
                                                            <td><b>QTY</b></td>
                                                            <td><b>Harga</b></td>
                                                            <td><b>Keterangan</b></td>
                                                        </tr>
                                                        @foreach (json_decode($service['sparepart']) as $key => $sparepart)
                                                        <tr>
                                                            <td>{{$sparepart}}</td>
                                                            <td>{{json_decode($service['qty'])[$key]}}</td>
                                                            <td>{{json_decode($service['harga'])[$key]}}</td>
                                                            <td>{{json_decode($service['keterangan_sparepart'])[$key]}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="2"><b>Harga Jasa</b></td>
                                                            <td colspan="2">{{$service['harga_jasa']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><b>Total Service</b></td>
                                                            <td colspan="2">{{$service['total_harga_service']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Keterangan</b></td>
                                                            <td colspan="7">{{$service['keterangan']}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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