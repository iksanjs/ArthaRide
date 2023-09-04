<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('layout.admin_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">pengembalian Kendaraan Sewa</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            @if ($errors->any())
        <div class="allert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <form method="post" action="{{route('pengembalian.store')}}" class="container-fluid">
        @csrf
        <h4 class="h4 mb-10 text-gray-800">1. Kontrak Sewa</h4>
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="">ID Kontrak Sewa</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="id_kontraksewa" id="selectedKontrakSewa" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#kontraksewaModal">Pilih Kontrak Sewa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-3">
            <label for="">ID Penyewa</label>
            <input type="text" class="form-control" name="id_penyewa" id="id_penyewa" readonly>
            </div>
            <div class="col-sm-6">
            <label for="">No Polisi</label>
            <input type="text" class="form-control" name="no_polisi" id="no_polisi" readonly>
            </div>
        </div>

        {{-- <h4 class="h4 mb-10 text-gray-800">1. Data Kendaraan Yang Dikembalikan</h4>
        <div class="form-group row">
            
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="kategori">Kategori Kendaraan</label>
              <input type="text" class="form-control" name="kategori" value="{{$kendaraan[0]['kategori']}}" readonly>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control" name="merk" value="{{$kendaraan[0]['merk']}}" readonly>
              <label for="">Type</label>
              <input type="text" class="form-control" name="type" value="{{$kendaraan[0]['tipe']}}" readonly>
              <label for="">Tahun</label>
              <input type="text" class="form-control" name="tahun" value="{{$kendaraan[0]['tahun']}}" readonly>
              <label for="">Warna</label>
              <input type="text" class="form-control" name="warna" value="{{$kendaraan[0]['warna']}}" readonly>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Nomor Mesin</label>
              <input type="text" class="form-control" name="no_mesin" value="{{$kendaraan[0]['no_mesin']}}" readonly>
              <label for="">Nomor Rangka</label>
              <input type="text" class="form-control" name="no_rangka" value="{{$kendaraan[0]['no_rangka']}}" readonly>
              <label for="">Nomor Polisi</label>
              <input type="text" class="form-control" name="no_polisi" value="{{$kendaraan[0]['no_polisi']}}" readonly>
              <label for="">Lokasi</label>
              <input type="text" class="form-control" name="lokasi" value="{{$kendaraan[0]['lokasi']}}" readonly>
            </div>
        </div> --}}

        <h5 class="h4 mb-10 text-gray-800">Data Pengembalian Kendaraan Sewa  </h4>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="">Tanggal Pengembalian</label>
              <input type="date" class="form-control @error('tgl_pengembalian') is-invalid @enderror" name="tgl_pengembalian" value="{{ old('tgl_pengembalian') }}" required autocomplete="tgl_pengembalian" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Alasan</label>
                <input type="text" class="form-control @error('alasan') is-invalid @enderror" name="alasan" value="{{ old('alasan') }}" required autocomplete="alasan" autofocus>
            </div>
        </div>
        <div class="form-group row col-sm-6 mb-3 mb-sm-0">
            <input type="submit" class="btn btn-lg btn-primary shadow-sm" value="Submit">
        </div>
        
    </b>    
      </form>
            

      <div class="modal fade" id="kontraksewaModal" tabindex="-1" role="dialog" aria-labelledby="kontraksewaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kontraksewaModalLabel">Pilih Kontrak Sewa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Polisi</th>
                                <th>ID Penyewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No Polisi</th>
                                <th>ID Penyewa</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($kontraksewas as $kontraksewa)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $kontraksewa['no_polisi'] }}</td>
                                  <td>{{ $kontraksewa['id_penyewa'] }}</td>
                                  <td>
                                    <button class="btn btn-success btn-icon-split btn-sm"
                                        onclick="selectKendaraan('{{ $kontraksewa['no_polisi'] }}', '{{ $kontraksewa['id_penyewa'] }}')">
                                        <span class="text">Pilih</span>
                                    </button>
                                  </td>
                              </tr>
                          @endforeach
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  @include('layout.footer')

</body>

</html>