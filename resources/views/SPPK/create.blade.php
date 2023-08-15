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
            <h1 class="h3 mb-0 text-gray-800">Surat Pemesanan Penyewaan Kendaraan</h1>
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

    <form method="post" action="{{ route('sppk.store') }}" class="container-fluid">
        @csrf
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. Data Penyewa</h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt" value="{{ old('nama_pt') }}" required autocomplete="nama_pt" autofocus>
            </div>
            <div class="col-sm-6">
              <label for="">Nama Cabang</label>
              <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror" name="nama_cabang" value="{{ old('nama_cabang') }}" required autocomplete="nama_cabang" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">2. Data Kendaraan</h4>
        <div class="col-sm-12 mb-3 mb-sm-0">
            <label for="kategori">Kategori Kendaraan</label>
            <div class="d-flex justify-content-center">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label>
                  <input type="radio" name="kategori" value="Passanger" class="@error('kategori') is-invalid @enderror" required autocomplete="kategori" autofocus>
                  Passanger
                </label>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label>
                  <input type="radio" name="kategori" value="Komersil" class="@error('kategori') is-invalid @enderror" required autocomplete="kategori" autofocus>
                  Komersil
                </label>
              </div>
            </div>
          </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" required autocomplete="merkr" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Tipe</label>
              <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe') }}" required autocomplete="tipe" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Tahun</label>
              <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Warna</label>
              <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" required autocomplete="warna" autofocus>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Data Pemakai</h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Jabatan</label>
              <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">No HP</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">4 Data Sewa</h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Tanggal Pemesanan</label>
              <input type="date" class="form-control @error('tgl_sppk') is-invalid @enderror" name="tgl_sppk" value="{{ old('tgl_sppk') }}" required autocomplete="tgl_sppk" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="biaya_sewa">Biaya Sewa</label>
                <input type="text" class="form-control @error('biaya_sewa') is-invalid @enderror" name="biaya_sewa" value="{{ old('biaya_sewa') }}" required autocomplete="biaya_sewa" autofocus>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="periode_sewa">Periode Sewa</label>
                <div class="form-inline">
                    <input type="date" class="form-control col-sm-5 @error('tgl_awal') is-invalid @enderror" name="tgl_awal" value="{{ old('tgl_awal') }}" required autocomplete="tgl_awal" autofocus>
                    <div class="mx-2"></div>
                    <input type="date" class="form-control col-sm-5 @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" value="{{ old('tgl_akhir') }}" required autocomplete="tgl_akhir" autofocus>
                </div>                
            </div>
        </div>
        <div class="form-group row col-sm-6 mb-3 mb-sm-0">
            <input type="submit" class="btn btn-lg btn-primary shadow-sm" value="Submit">
        </div>
        
    </b>    
      </form>
            
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