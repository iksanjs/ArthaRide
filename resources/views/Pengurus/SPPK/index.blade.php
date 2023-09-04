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
          @if (session('reject'))
            <div class="alert alert-warning alert-dismissible fade show">
                {{ session('reject') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Data Surat Pemesanan Penyewaan Kendaraan</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data SPPK</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID SPPK</th>
                                  <th>Tanggal SPPK</th>
                                  <th>Nama PT</th>
                                  <th>Nama Cabang</th>
                                  <th>Nama Pemakai</th>
                                  <th>Kategori</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Biaya Sewa</th>
                                  <th colspan="2">Periode Sewa</th>
                                  <th>Approval</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>ID SPPK</th>
                                  <th>Tanggal SPPK</th>
                                  <th>Nama PT</th>
                                  <th>Nama Cabang</th>
                                  <th>Nama Pemakai</th>
                                  <th>Kategori</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Biaya Sewa</th>
                                  <th colspan="2">Periode Sewa</th>
                                  <th>Approval</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($sppks[0] as $sppk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$sppk['id_sppk']}}</td>
                                    <td>{{$sppk['tgl_sppk']}}</td>
                                    <td>{{$sppk['nama_pt']}}</td>
                                    <td>{{$sppk['nama_cabang']}}</td>
                                    <td>{{$sppk['nama']}}</td>
                                    <td>{{$sppk['kategori']}}</td>
                                    <td>{{$sppk['merk']}}</td>
                                    <td>{{$sppk['tipe']}}</td>
                                    <td>{{$sppk['biaya_sewa']}}</td>
                                    <td>{{$sppk['tgl_awal']}}</td>
                                    <td>{{$sppk['tgl_akhir']}}</td>
                                    <td>{{$sppk['approval']}}</td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Approval SPPK</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>ID SPPK</th>
                                        <th colspan="3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID SPPK</th>
                                            <th colspan="3">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sppks[2] as $sppk)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sppk['id_sppk']}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">Reject</span>
                                                </button>
                                            </td>
                                            <td>
                                            <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{$sppk['id_sppk']}}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check-square"></i>
                                                </span>
                                                <span class="text">Approve</span>
                                            </button>
                                            
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal">
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
                                @foreach ($sppks[2] as $sppk)
                                <div class="modal fade" id="approveModal{{$sppk['id_sppk']}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveModalLabel">Approve SPPK</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('sppk.approved', $sppk['id_sppk'])}}" method="POST">
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
                                <!-- Modal Reject Pengajuan Sewa -->
                                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rejectModalLabel">Reject SPPK</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <table class="table">
                                                    <tbody>
                                                        <tr>
                                                        <td colspan="4"><h5><b>Data SPPK</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>ID SPPK</b></td>
                                                        <td><b></b></td>
                                                        <td><b>Tanggal SPPK</b></td>
                                                        <td></td>
                                                        </tr>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="4"><h5><b>Data Penyewa</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Nama PT</b></td>
                                                        <td></td>
                                                        <td><b>Nama Cabang</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Alamat</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="4"><h5><b>Data Kendaraan</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Kategori</b></td>
                                                        <td></td>
                                                        <td><b>Tipe</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Merk</b></td>
                                                        <td></td>
                                                        <td><b>Tahun</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Warna</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="4"><h5><b>Data Pemakai</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Nama</b></td>
                                                        <td></td>
                                                        <td><b>Jabatan</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>No HP</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="4"><h5><b>Data Sewa</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Biaya Sewa</b></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                        <td><b>Periode Sewa</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Keterangan</b></td>
                                                            <td colspan="3"><input type="text" class="form-control" name="keterangan"></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger"><span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                        </span> Reject</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="detailModalLabel">Detail SPPK</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <table class="table">
                                            <tbody>
                                                <tr>
                                                <td colspan="4"><h5><b>Data SPPK</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>ID SPPK</b></td>
                                                <td><b></b></td>
                                                <td><b>Tanggal SPPK</b></td>
                                                <td></td>
                                                </tr>
                                                </tr>
                                                <tr>
                                                <td colspan="4"><h5><b>Data Penyewa</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>Nama PT</b></td>
                                                <td></td>
                                                <td><b>Nama Cabang</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td><b>Alamat</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td colspan="4"><h5><b>Data Kendaraan</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>Kategori</b></td>
                                                <td></td>
                                                <td><b>Tipe</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td><b>Merk</b></td>
                                                <td></td>
                                                <td><b>Tahun</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td><b>Warna</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td colspan="4"><h5><b>Data Pemakai</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>Nama</b></td>
                                                <td></td>
                                                <td><b>Jabatan</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td><b>No HP</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td colspan="4"><h5><b>Data Sewa</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>Biaya Sewa</b></td>
                                                <td></td>
                                                </tr>
                                                <tr>
                                                <td><b>Periode Sewa</b></td>
                                                <td></td>
                                                <td></td>
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