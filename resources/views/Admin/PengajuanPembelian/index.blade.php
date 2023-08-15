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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Data Pengajuan Pembelian Kendaraan</h1>
            <div>
              <a href="{{ route('pengajuanpembelian.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
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
                                <th>ID Pengajuan</th>
                                <th>SPPK</th>
                                <th>Dealer</th>
                                <th>Merk</th>
                                <th>Tipe</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>BBN</th>
                                <th>OTR</th>
                                <th>Karoseri</th>
                                <th>Total</th>
                                <th>Approval</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                <th>No</th>
                                <th>ID Pengajuan</th>
                                <th>SPPK</th>
                                <th>Dealer</th>
                                <th>Merk</th>
                                <th>Tipe</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>BBN</th>
                                <th>OTR</th>
                                <th>Karoseri</th>
                                <th>Total</th>
                                <th>Approval</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($pengajuanpembelians as $pengajuanpembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$pengajuanpembelian['id_pengajuanpembelian']}}</td>
                                    <td>{{$pengajuanpembelian['id_sppk']}}</td>
                                    <td>{{$pengajuanpembelian['dealer']}}</td>
                                    <td>{{$pengajuanpembelian['merk']}}</td>
                                    <td>{{$pengajuanpembelian['tipe']}}</td>
                                    <td>{{$pengajuanpembelian['tahun']}}</td>
                                    <td>{{$pengajuanpembelian['warna']}}</td>
                                    <td>{{$pengajuanpembelian['deskripsi']}}</td>
                                    <td>{{$pengajuanpembelian['harga']}}</td>
                                    <td>{{$pengajuanpembelian['bbn']}}</td>
                                    <td>{{$pengajuanpembelian['otr']}}</td>
                                    <td>{{$pengajuanpembelian['karoseri']}}</td>
                                    <td>{{$pengajuanpembelian['total']}}</td>
                                    <td>{{$pengajuanpembelian['approval']}}</td>
                                    {{-- <td>
                                        <a href="{{route('sppk.edit', $sppk['id_sppk'])}}" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Revisi</span>
                                        </a>
                                    </td> --}}
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