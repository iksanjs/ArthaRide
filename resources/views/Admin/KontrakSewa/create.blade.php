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
            <h1 class="h3 mb-0 text-gray-800">Kontrak Sewa</h1>
          </div>

          <!-- Content Row -->
          <form method="post" action="{{ route('kontraksewa.store') }}" class="container-fluid">
            @csrf
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
        <div class="col-sm-6 mb-3 mb-sm-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SURAT  PEMESANAN PENYEWAAN KENDARAAN</h6>
            </div>
            <input type="text" name="id_sppk" value="{{ $sppk['id_sppk'] }}" hidden>
            <div class="card-body">
                  <table class="table-bordered" width="100%" cellspacing="0">
              <tr>
                <th colspan="6">Data Penyewa</th>
              </tr>
              <tr>
                <th>Nama PT</th>
                <td>:</td>
                <td>{{$sppk['nama_pt']}}</td>
                <th>Nama Cabang</th>
                <td>:</td>
                <td>{{$sppk['nama_cabang']}}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td colspan="4">{{$sppk['alamat']}}</td>
              </tr>
              <tr>
                <th colspan="6">Data Kendaraan</th>
              </tr>
              <tr>
                <th>Kategori</th>
                <td>:</td>
                <td colspan="4">{{$sppk['kategori']}}</td>
              </tr>
              <tr>
                <th>Merk</th>
                <td>:</td>
                <td colspan="4">{{$sppk['merk']}}</td>
              </tr>
              <tr>
                <th>Tipe</th>
                <td>:</td>
                <td colspan="4">{{$sppk['tipe']}}</td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td>:</td>
                <td colspan="4">{{$sppk['tahun']}}</td>
              </tr>
              <tr>
                <th>Warna</th>
                <td>:</td>
                <td colspan="4">{{$sppk['warna']}}</td>
              </tr>
              <tr>
                <th colspan="6">Data Pemakai</th>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{$sppk['nama']}}</td>
                <th>Jabatan</th>
                <td>:</td>
                <td>{{$sppk['jabatan']}}</td>
              </tr>
              <tr>
                <th>No HP</th>
                <td>:</td>
                <td colspan="4">{{$sppk['no_hp']}}</td>
              </tr>
              <tr>
                <th colspan="6">Data Sewa</th>
              </tr>
              <tr>
                <th>Periode Sewa</th>
                <td>:</td>
                <td colspan="4">{{$sppk['tgl_awal']}} - {{$sppk['tgl_akhir']}}</td>
              </tr>
              <tr>
                <th>Biaya Sewa</th>
                <td>:</td>
                <td colspan="4">{{$sppk['biaya_sewa']}}</td>
              </tr>
            </table>
          </div>
          </div>
        </div>
    <div class="col-sm-6">
      <b>
      <h4 class="h4 mb-10 text-gray-800">1. Data Penyewa</h4>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-3">
          <label for="">Nama PT</label>
          <input type="text" class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt" value="{{ old('nama_pt') }}" required autocomplete="nama_pt" autofocus>
        </div>
        <div class="col-sm-6">
          <label for="">Nama Cabang</label>
          <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror" name="nama_cabang" value="{{ old('nama_cabang') }}" required autocomplete="nama_cabang" autofocus>
        </div>
      </div>
      <div class="form-group row-sm-6 mb-3 mb-sm-3">
          <label for="">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
      </div>
      <h4 class="h4 mb-10 text-gray-800">2. Data Pemakai</h4>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-3">
          <label for="">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
        </div>
        <div class="col-sm-6">
          <label for="">Jabatan</label>
          <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan" autofocus>
        </div>
      </div>
      <div class="form-group row-sm-6 mb-3 mb-sm-3">
          <label for="">No HP</label>
          <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
      </div>
    </div>
  </div>
      <h4 class="h4 mb-10 text-gray-800">3. Data Kendaraan</h4>
      <div class="form-group row">
          <div class="col-sm-12">
              <label for="">No Polisi</label>
              <div class="input-group">
                  <input type="text" class="form-control" name="no_polisi" id="selectedKendaraan" readonly>
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#kendaraanModal">Pilih Kendaraan</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-3">
          <label for="">Kategori</label>
          <input type="text" class="form-control" name="kategori" id="kategori" readonly>
        </div>
        <div class="col-sm-6">
          <label for="">No Rangka</label>
          <input type="text" class="form-control" name="no_rangka" id="no_rangka" readonly>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-1">
          <label for="">Merk</label>
          <input type="text" class="form-control" name="merk" id="merk" readonly>
        </div>
        <div class="col-sm-6">
          <label for="">No Mesin</label>
          <input type="text" class="form-control" name="no_mesin" id="no_mesin" readonly>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-1">
          <label for="">Tipe</label>
          <input type="text" class="form-control" name="tipe" id="tipe" readonly>
        </div>
        <div class="col-sm-6">
          <label for="">Lokasi</label>
          <input type="text" class="form-control" name="lokasi" id="lokasi" readonly>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-1">
          <label for="">Tahun</label>
          <input type="text" class="form-control" name="tahun" id="tahun" readonly>
        </div>
        <div class="col-sm-6">
          <label for="">Total</label>
          <input type="text" class="form-control" name="total" id="total" readonly>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-1">
          <label for="">Warna</label>
          <input type="text" class="form-control" name="warna" id="warna" readonly>
        </div>
        <div class="col-sm-6">
          <label for="">Harga Sewa (Perbulan) total*2.5%</label>
          <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" id="harga_sewa" value="{{ old('harga_sewa') }}" required autocomplete="harga_sewa" autofocus>
        </div>
      </div>
      <h4 class="h4 mb-10 text-gray-800">4. Data Sewa</h4>
      <div class="form-group row">
        <div class="col-sm-12">
          <label for="">Tanggal Sewa</label>
          <input type="date" class="form-control @error('tgl_sewa') is-invalid @enderror" name="tgl_sewa" id="tgl_sewa" value="{{ old('tgl_sewa') }}" required autocomplete="tgl_sewa" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="periode_sewa">Periode Sewa</label>
            <div class="form-inline">
                <input type="date" class="form-control col-sm-5 @error('tgl_awal') is-invalid @enderror" name="tgl_awal" id="tgl_awal" value="{{ old('tgl_awal') }}" required autocomplete="tgl_awal" autofocus>
                <div class="mx-2"></div>
                <input type="date" class="form-control col-sm-5 @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" id="tgl_akhir" value="{{ old('tgl_akhir') }}" required autocomplete="tgl_akhir" autofocus>
            </div>                
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="biaya_sewa">Lama Sewa (Terbilang)</label>
          <input type="text" class="form-control @error('lama_sewa') is-invalid @enderror" name="lama_sewa" id="lama_sewa" value="{{ old('lama_sewa') }}" required autocomplete="lama_sewa" autofocus>
        </div>
      </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <label for="">Biaya Sewa</label>
        <input type="text" class="form-control @error('biaya_sewa') is-invalid @enderror" name="biaya_sewa" id="biaya_sewa" value="{{ old('biaya_sewa') }}" required autocomplete="biaya_sewa" autofocus>
      </div>
    </div>
  
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="reset" class="btn btn-lg btn-danger shadow-sm" value="Reset">
          <input type="submit" class="btn btn-lg btn-primary shadow-sm" value="Submit">
      </div>
    </div>
  </form>
    </b>
           
    <div class="modal fade" id="kendaraanModal" tabindex="-1" role="dialog" aria-labelledby="kendaraanModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="kendaraanModalLabel">Pilih Kendaraan</h5>
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
                              <th>Merk</th>
                              <th>Tipe</th>
                              <th>Kategori</th>
                              <th>Lokasi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>No Polisi</th>
                              <th>Merk</th>
                              <th>Tipe</th>
                              <th>Kategori</th>
                              <th>Lokasi</th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($kendaraans[0] as $kendaraan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kendaraan['no_polisi'] }}</td>
                                <td>{{ $kendaraan['merk'] }}</td>
                                <td>{{ $kendaraan['tipe'] }}</td>
                                <td>{{ $kendaraan['kategori'] }}</td>
                                <td>{{ $kendaraan['lokasi'] }}</td>
                                <td>
                                  <button class="btn btn-success btn-icon-split btn-sm"
                                      onclick="selectKendaraan('{{ $kendaraan['no_polisi'] }}', '{{ $kendaraan['merk'] }}',
                                      '{{ $kendaraan['kategori']}}', '{{ $kendaraan['tipe'] }}', '{{ $kendaraan['tahun'] }}',
                                      '{{ $kendaraan['warna'] }}', '{{ $kendaraan['no_rangka'] }}', '{{ $kendaraan['no_mesin'] }}',
                                      '{{ $kendaraan['lokasi'] }}', '{{ $kendaraan['total'] }}')">
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
  <script>
    // Fungsi untuk menangani pemilihan kendaraan dari modal
    function selectKendaraan(noPolisi, merk, kategori, tipe, tahun, warna, noRangka, noMesin, lokasi, total) {
        document.getElementById('selectedKendaraan').value = noPolisi;
        document.getElementById('merk').value = merk;
        document.getElementById('kategori').value = kategori;
        document.getElementById('tipe').value = tipe;
        document.getElementById('tahun').value = tahun;
        document.getElementById('warna').value = warna;
        document.getElementById('no_rangka').value = noRangka;
        document.getElementById('no_mesin').value = noMesin;
        document.getElementById('lokasi').value = lokasi;
        document.getElementById('total').value = total;
        calculateHargaSewa(); // Menghitung harga sewa setelah nilai total diupdate
        // Tutup modal
        $('#kendaraanModal').modal('hide');
    }

    function calculateLamaSewa() {
      var tglAwal = document.getElementById('tgl_awal').value;
      var tglAkhir = document.getElementById('tgl_akhir').value;

      // Check if both inputs have values
      if (tglAwal && tglAkhir) {
        tglAwal = new Date(tglAwal);
        tglAkhir = new Date(tglAkhir);

        // Menghitung selisih bulan antara tanggal awal dan tanggal akhir
        var selisihBulan = (tglAkhir.getFullYear() - tglAwal.getFullYear()) * 12;
        selisihBulan -= tglAwal.getMonth();
        selisihBulan += tglAkhir.getMonth();

        // Memperhitungkan selisih hari dalam bulan terakhir
        if (tglAkhir.getDate() < tglAwal.getDate()) {
          selisihBulan--;
        }

        // Mengisi nilai lama sewa dalam periode bulan pada input
        document.getElementById('lama_sewa').value = selisihBulan + ' bulan';
      } else {
        // Clear the input if either tgl_awal or tgl_akhir is empty
        document.getElementById('lama_sewa').value = '';
      }

      calculateBiayaSewa(); // Trigger the calculateBiayaSewa() function after calculating lama sewa
    }

    // Memanggil fungsi calculateLamaSewa saat nilai tanggal awal atau tanggal akhir berubah
    document.getElementById('tgl_awal').addEventListener('change', calculateLamaSewa);
    document.getElementById('tgl_akhir').addEventListener('change', calculateLamaSewa);

    // Fungsi untuk memformat angka menjadi format ribuan dan rupiah
    function formatRupiah(angka) {
      var bilangan = Math.round(angka); // Bulatkan ke angka bulat terdekat

      var reverse = bilangan.toString().split('').reverse().join('');
      var ribuan = reverse.match(/\d{1,3}/g);
      var hasil = ribuan.join('.').split('').reverse().join('');

      return 'Rp' + hasil;
    }

    // Fungsi untuk menghitung harga sewa
    function calculateHargaSewa() {
      var total = parseFloat(document.getElementById('total').value.replace(/[^0-9]+/g, ''));
      var hargaSewa = Math.round(total * 0.025); // Menghitung harga sewa dengan persentase 2.5% dan membulatkan ke angka bulat terdekat
      document.getElementById('harga_sewa').value = formatRupiah(hargaSewa);
    }

    // Memanggil fungsi calculateHargaSewa saat nilai total berubah
    document.getElementById('total').addEventListener('input', calculateHargaSewa);
    document.getElementById('lama_sewa').addEventListener('input', calculateLamaSewa);

    

    function calculateBiayaSewa() {
  var hargaSewa = parseFloat(document.getElementById('harga_sewa').value.replace(/[^0-9]+/g, ''));
  var lamaSewa = parseFloat(document.getElementById('lama_sewa').value);

  var biayaSewa = hargaSewa * lamaSewa;

  document.getElementById('biaya_sewa').value = formatRupiah(biayaSewa);
}

    // Memanggil fungsi calculateBiayaSewa saat nilai harga berubah
    document.getElementById('harga_sewa').addEventListener('input', calculateBiayaSewa);
  </script>

  
  

</body>

</html>