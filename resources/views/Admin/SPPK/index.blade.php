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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Data Surat Pemesanan Penyewaan Kendaraan</h1>
            <div>
              <a href="{{ route('sppk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
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
                        <h6 class="m-0 font-weight-bold text-primary">Status Pembelian Kendaraan</h6>
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
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Revisi SPPK</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>ID SPPK</th>
                                    <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID SPPK</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($sppks[1] as $sppk)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sppk['id_sppk']}}</td>
                                        <td>
                                          <a href="{{route('sppk.edit', $sppk['id_sppk'])}}" class="btn btn-primary btn-icon-split btn-sm">
                                              <span class="icon text-white-50">
                                                  <i class="fas fa-edit"></i>
                                              </span>
                                              <span class="text">Revisi</span>
                                          </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{$sppk['id_sppk']}}">
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

                            @foreach ($sppks[1] as $sppk)
                            <div class="modal fade" id="detailModal{{$sppk['id_sppk']}}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
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
                                            <td><b>{{$sppk['id_sppk']}}</b></td>
                                            <td><b>Tanggal SPPK</b></td>
                                            <td>{{$sppk['tgl_sppk']}}</td>
                                            </tr>
                                            </tr>
                                            <tr>
                                            <td colspan="4"><h5><b>Data Penyewa</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>Nama PT</b></td>
                                            <td>{{$sppk['nama_pt']}}</td>
                                            <td><b>Nama Cabang</b></td>
                                            <td>{{$sppk['nama_cabang']}}</td>
                                            </tr>
                                            <tr>
                                            <td><b>Alamat</b></td>
                                            <td>{{$sppk['alamat']}}</td>
                                            </tr>
                                            <tr>
                                            <td colspan="4"><h5><b>Data Kendaraan</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>Kategori</b></td>
                                            <td>{{$sppk['kategori']}}</td>
                                            <td><b>Tipe</b></td>
                                            <td>{{$sppk['tipe']}}</td>
                                            </tr>
                                            <tr>
                                            <td><b>Merk</b></td>
                                            <td>{{$sppk['merk']}}</td>
                                            <td><b>Tahun</b></td>
                                            <td>{{$sppk['tahun']}}</td>
                                            </tr>
                                            <tr>
                                            <td><b>Warna</b></td>
                                            <td>{{$sppk['warna']}}</td>
                                            </tr>
                                            <tr>
                                            <td colspan="4"><h5><b>Data Pemakai</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>Nama</b></td>
                                            <td>{{$sppk['nama']}}</td>
                                            <td><b>Jabatan</b></td>
                                            <td>{{$sppk['jabatan']}}</td>
                                            </tr>
                                            <tr>
                                            <td><b>No HP</b></td>
                                            <td>{{$sppk['no_hp']}}</td>
                                            </tr>
                                            <tr>
                                            <td colspan="4"><h5><b>Data Sewa</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>Biaya Sewa</b></td>
                                            <td>{{$sppk['biaya_sewa']}}</td>
                                            <td><b>Periode Sewa</b></td>
                                            <td>{{$sppk['tgl_awal']}} s/d {{$sppk['tgl_akhir']}}</td>
                                            </tr>
                                            <tr>
                                              <td><b>Keterangan</b></td>
                                              <td colspan="3">{{$sppk['keterangan']}}</td>
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