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
            <h1 class="h3 mb-0 text-gray-800">Berita Serah Terima Wahana to Cabang</h1>
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

    <form method="post" action="{{route('stwahanatocabang.store')}}" class="container-fluid">
        @csrf
        <input type="text" name="id_kontraksewa" value="{{$kontraksewa['id_kontraksewa']}}" hidden>
        <input type="text" name="id_penyewa" value="{{$penyewa['id_penyewa']}}" hidden>
        <input type="text" name="id_pemakai" value="{{$pemakai['id_pemakai']}}" hidden>
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. Data Penerima</h4>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Nama PT</label>
            <input type="text" class="form-control" name="nama_pt" value="{{$penyewa['nama_pt']}}" readonly>
            <label for="">Nama Cabang</label>
            <input type="text" class="form-control" name="nama_cabang" value="{{$penyewa['nama_cabang']}}" readonly>
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{$penyewa['alamat']}}" readonly>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Nama Penerima</label>
            <input type="text" class="form-control" name="nama" value="{{$pemakai['nama']}}" readonly>
            <label for="">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="{{$pemakai['jabatan']}}" readonly>
            <label for="">No HP</label>
            <input type="text" class="form-control" name="no_hp" value="{{$pemakai['no_hp']}}" readonly>
          </div>
        </div>

        <h4 class="h4 mb-10 text-gray-800">2. Data Kendaraan</h4>
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
        </div>

        <h4 class="h4 mb-10 text-gray-800">3. Perlengkapan Kendaraan</h4>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Cad Kunci Kontak</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">Radio / Tape</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">Ban Serep</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">Kunci Ban</label>
            <input type="text" class="form-control" name="" readonly>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Dongkrak</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">∆ Pengaman</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">Karpet</label>
            <input type="text" class="form-control" name="" readonly>
            <label for="">Stnk & Kir</label>
            <input type="text" class="form-control" name="" readonly>
          </div>
        </div>
        
        <h4 class="h4 mb-10 text-gray-800">4. Kondisi Kendaraan</h4>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Mesin</label>
            <input type="text" class="form-control" name="mesin" readonly>
            <label for="">Bodi</label>
            <input type="text" class="form-control" name="bodi" readonly>
            <label for="">Lampu</label>
            <input type="text" class="form-control" name="lampu" readonly>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Kaki</label>
            <input type="text" class="form-control" name="kaki" readonly>
            <label for="">Kaca</label>
            <input type="text" class="form-control" name="kaca" readonly>
            <label for="">Lain-Lain</label>
            <input type="text" class="form-control" name="lain-lain" readonly>
          </div>
        </div>

        <h5 class="h4 mb-10 text-gray-800">Data Berita Serah Terima Kendaraan Wahana to Cabang  </h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Tanggal Serah Terima</label>
              <input type="date" class="form-control @error('tgl_st') is-invalid @enderror" name="tgl_st" value="{{ old('tgl_st') }}" required autocomplete="tgl_st" autofocus>
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Nama Yang Menyerahkan</label>
            <input type="text" class="form-control @error('nama_penyerah') is-invalid @enderror" name="nama_penyerah" value="{{ old('nama_penyerah') }}" required autocomplete="nama_penyerah" autofocus>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Nama Yang Menerima</label>
            <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" name="nama_penerima" value="{{ old('nama_penerima') }}" required autocomplete="nama_penerima" autofocus>
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