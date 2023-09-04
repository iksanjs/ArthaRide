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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Berita Acara Serah Terima Kendaraan Wahana to Cabang</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Berita Acara Serah Terima Kendaraan</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                    <th>No</th>
                                    <th>ID Serah Terima</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th>No Polisi</th>
                                    <th>Tanggal Serah terima</th>
                                    <th>Nama Penyerah</th>
                                    <th>Nama Penerima</th>
                                    <th>Approval</th>
                                    <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                    <th>No</th>
                                    <th>ID Serah Terima</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th>No Polisi</th>
                                    <th>Tanggal Serah terima</th>
                                    <th>Nama Penyerah</th>
                                    <th>Nama Penerima</th>
                                    <th>Approval</th>
                                    <th>Keterangan</th>
                              </tr>
                          </tfoot>
                          <tbody>
                                @foreach ($stwahanatocabangs as $stwahanatocabang)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$stwahanatocabang['id_stwahanatocabang']}}</td>
                                    <td>{{$stwahanatocabang['id_kontraksewa']}}</td>
                                    <td>{{$stwahanatocabang['no_polisi']}}</td>
                                    <td>{{$stwahanatocabang['tgl_st']}}</td>
                                    <td>{{$stwahanatocabang['nama_penyerah']}}</td>
                                    <td>{{$stwahanatocabang['nama_penerima']}}</td>
                                    <td>{{$stwahanatocabang['approval']}}</td>
                                    <td>{{$stwahanatocabang['keterangan']}}</td>
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
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Antrian BATSK (Kontrak Sewa)</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kontrak Sewa</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kontrak Sewa</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($antrian_kontraksewas as $antrian_kontraksewa)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$antrian_kontraksewa['id_kontraksewa']}}</td>
                                        <td>
                                          <a href="{{ route('stwahanatocabang.create', ['id_kontraksewa' => $antrian_kontraksewa['id_kontraksewa']]) }}" class="btn btn-success btn-icon-split btn-sm">
                                              <span class="icon text-white-50">
                                                  <i class="fas fa-credit-card"></i>
                                              </span>
                                              <span class="text">Buat</span>
                                          </a>
                                          
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
          
                              <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="detailModalLabel">Detail Kontrak Sewa</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <td colspan="4"><h5><b>Data Transaksi Pembelian</b></h5></td>
                                            </tr>
                                            <tr>
                                              <td><b>Id kontraksewa</b></td>
                                              <td><b></b></td>
                                              <td><b>Tanggal kontraksewa</b></td>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Revisi BASTK</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>ID Serah Terima</th>
                                    <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Serah Terima</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                          <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                                              <span class="icon text-white-50">
                                                  <i class="fas fa-edit"></i>
                                              </span>
                                              <span class="text">Revisi</span>
                                          </a>
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
                                </tbody>
                            </table>
                            @foreach ($stwahanatocabangs as $stwahanatocabang)
                            <div class="modal fade" id="detailModal{{$stwahanatocabang['id_stwahanatocabang']}}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="detailModalLabel">Detail stwahanatocabang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                        <table class="table">
                                        <tbody>
                                            <tr>
                                            <td colspan="4"><h5><b>Data stwahanatocabang</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>ID stwahanatocabang</b></td>
                                            <td><b>{{$stwahanatocabang['id_stwahanatocabang']}}</b></td>
                                            <td><b>Tanggal stwahanatocabang</b></td>
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
                                            <td><b>Periode Sewa</b></td>
                                            <td></td>
                                            </tr>
                                            <tr>
                                              <td><b>Keterangan</b></td>
                                              <td colspan="3"></td>
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