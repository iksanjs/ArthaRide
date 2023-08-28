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
            <h1 class="h3 mb-0 text-gray-800">Penambahan Data Service</h1>
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

    <form method="post" action="{{ route('service.store') }}" class="container-fluid">
        @csrf
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. Data Kendaraan</h4>
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
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-1">
            <label for="">Warna</label>
            <input type="text" class="form-control" name="warna" id="warna" readonly>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">2. Data Cabang</h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-3">
            <label for="">Nama Pemakai</label>
            <input type="text" class="form-control" name="nama" id="nama" readonly>
            </div>
            <div class="col-sm-6">
            <label for="">Nama Cabang</label>
            <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-3">
            <label for="">Nama PT</label>
            <input type="text" class="form-control" name="nama_pt" id="nama_pt" readonly>
            </div>
            <div class="col-sm-6">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" readonly>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Data Bengkel</h4>
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="">Bengkel</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="id_bengkel" id="selectedBengkel" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#bengkelModal">Pilih Bengkel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-3">
            <label for="">Nama Bengkel</label>
            <input type="text" class="form-control" name="nama_bengkel" id="nama_bengkel" readonly>
            </div>
            <div class="col-sm-4">
            <label for="">Jenis Bengkel</label>
            <input type="text" class="form-control" name="jenis_bengkel" id="jenis_bengkel" readonly>
            </div>
            <div class="col-sm-4">
            <label for="">Alamat bengkel</label>
            <input type="text" class="form-control" name="alamat_bengkel" id="alamat_bengkel" readonly>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">4. Data Service</h4>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="jenis_service">Jenis Service</label>
                <div class="d-flex justify-content-center">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                        <input type="radio" name="jenis_service" value="Rutin/Berkala" class="@error('jenis_service') is-invalid @enderror" required autocomplete="jenis_service" autofocus>
                        Rutin/Berkala
                        </label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                        <input type="radio" name="jenis_service" value="Non Rutin" class="@error('jenis_service') is-invalid @enderror" required autocomplete="jenis_service" autofocus>
                        Non Rutin
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-3">
                <label for="">KM Kendaraan</label>
                <input type="text" class="form-control @error('km') is-invalid @enderror" name="km" id="km" value="{{ old('km') }}" required autocomplete="km" autofocus>
            </div>
            <div class="col-sm-6">
                <label for="">KM Service Selanjutnya</label>
                <input type="text" class="form-control @error('km_selanjutnya') is-invalid @enderror" name="km_selanjutnya" id="km_selanjutnya" value="{{ old('km_selanjutnya') }}" required autocomplete="km_selanjutnya" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-3">
            <label for="">Tanggal Masuk Service</label>
            <input type="date" class="form-control @error('tanggal_penerima_service') is-invalid @enderror" name="tanggal_penerima_service" value="{{ old('tanggal_penerima_service') }}" required autocomplete="tanggal_penerima_service" autofocus>
            </div>
            <div class="col-sm-6">
            <label for="">Tanggal Keluar Service</label>
            <input type="date" class="form-control @error('tanggal_penyerahan_service') is-invalid @enderror" name="tanggal_penyerahan_service" value="{{ old('tanggal_penyerahan_service') }}" required autocomplete="tanggal_penyerahan_service" autofocus>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">5. Perbaikan</h4>
        <div class="form-group" id="dynamicInputs">
            <div class="input-group">
                <div class="col-sm-3 mb-3 mb-sm-3">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" name="sparepart[]" id="sparepart">
                </div>
                <div class="col-sm-2">
                    <label for="">QTY</label>
                    <input type="text" class="form-control" name="qty[]" id="qty">
                </div>
                <div class="col-sm-3">
                    <label for="">Harga (Satuan)</label>
                    <input type="text" class="form-control" name="harga[]" id="harga">
                </div>
                <div class="col-sm-3">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan_sparepart[]" id="keterangan_sparepart">
                </div>
                <div class="col-sm-1">
                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-6 mb-3 mb-sm-0">
        <button type="button" class="btn btn-success btn-add">Tambah</button>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-3">
            <label for="">Pembayaran Jasa</label>
            <input type="text" class="form-control @error('harga_jasa') is-invalid @enderror" name="harga_jasa" value="{{ old('harga_jasa') }}" required autocomplete="harga_jasa" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-3">
                <label for="">Total Pembayaran Service</label>
                <input type="text" class="form-control @error('total_harga_service') is-invalid @enderror" name="total_harga_service" id="total_harga_service" value="{{ old('total_harga_service') }}" required autocomplete="total_harga_service" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required autocomplete="keterangan" autofocus>{{ old('keterangan') }}</textarea>
            </div>
        </div>
        <div class="form-group row col-sm-6 mb-3 mb-sm-0">
            <input type="submit" class="btn btn-lg btn-primary shadow-sm" value="Submit">
        </div>
        
    </b>    
      </form>
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
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kendaraan['no_polisi']}}</td>
                                            <td>{{$kendaraan['merk']}}</td>
                                            <td>{{$kendaraan['tipe']}}</td>
                                            <td>{{$kendaraan['kategori']}}</td>
                                            <td>{{$kendaraan['lokasi']}}</td>
                                            <td>
                                            <button class="btn btn-success btn-icon-split btn-sm"
                                                onclick="selectKendaraan('{{ $kendaraan['no_polisi'] }}', '{{ $kendaraan['merk'] }}',
                                                '{{ $kendaraan['kategori'] }}', '{{ $kendaraan['tipe'] }}', '{{ $kendaraan['tahun'] }}',
                                                '{{ $kendaraan['warna'] }}', '{{ $kendaraan['no_rangka'] }}', '{{ $kendaraan['no_mesin'] }}',
                                                '{{ $kendaraan['lokasi'] }}')">
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
            <div class="modal fade" id="bengkelModal" tabindex="-1" role="dialog" aria-labelledby="bengkelModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bengkelModalLabel">Pilih Bengkel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Bengkel</th>
                                        <th>Nama Bengkel</th>
                                        <th>Jenis Bengkel</th>
                                        <th>Alamat Bengkel</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Bengkel</th>
                                        <th>Nama Bengkel</th>
                                        <th>Jenis Bengkel</th>
                                        <th>Alamat Bengkel</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($bengkels as $bengkel)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$bengkel['id_bengkel']}}</td>
                                            <td>{{$bengkel['nama_bengkel']}}</td>
                                            <td>{{$bengkel['jenis_bengkel']}}</td>
                                            <td>{{$bengkel['alamat_bengkel']}}</td>
                                            <td>{{$bengkel['nomor_telepon']}}</td>
                                            <td>
                                            <button class="btn btn-success btn-icon-split btn-sm"
                                                onclick="selectBengkel('{{ $bengkel['id_bengkel'] }}', '{{ $bengkel['nama_bengkel'] }}', '{{ $bengkel['jenis_bengkel'] }}', '{{ $bengkel['alamat_bengkel'] }}')">
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
        $(document).ready(function () {
        $('#dataTable, #dataTable1').DataTable();
        });
        // Fungsi untuk menangani pemilihan kendaraan dari modal
        function selectKendaraan(noPolisi, merk, kategori, tipe, tahun, warna, noRangka, noMesin, lokasi) {
            document.getElementById('selectedKendaraan').value = noPolisi;
            document.getElementById('merk').value = merk;
            document.getElementById('kategori').value = kategori;
            document.getElementById('tipe').value = tipe;
            document.getElementById('tahun').value = tahun;
            document.getElementById('warna').value = warna;
            document.getElementById('no_rangka').value = noRangka;
            document.getElementById('no_mesin').value = noMesin;
            document.getElementById('lokasi').value = lokasi;
            // Tutup modal
            $('#kendaraanModal').modal('hide');
        }

        function selectBengkel(idBengkel, namaBengkel, jenisBengkel, alamatBengkel) {
            document.getElementById('selectedBengkel').value = idBengkel;
            document.getElementById('nama_bengkel').value = namaBengkel;
            document.getElementById('jenis_bengkel').value = jenisBengkel;
            document.getElementById('alamat_bengkel').value = alamatBengkel;
            $('#bengkelModal').modal('hide');
        }

        document.addEventListener('DOMContentLoaded', function () {
        const dynamicInputs = document.getElementById('dynamicInputs');
        const btnAdd = document.querySelector('.btn-add');
        const hargaJasaInput = document.querySelector('input[name="harga_jasa"]');
        const totalHargaServiceInput = document.querySelector('input[name="total_harga_service"]');

        btnAdd.addEventListener('click', function () {
            const inputGroup = dynamicInputs.firstElementChild.cloneNode(true);
            inputGroup.querySelectorAll('input').forEach(input => input.value = '');
            dynamicInputs.appendChild(inputGroup);
            calculateTotal();
        });

        dynamicInputs.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-remove')) {
                event.target.closest('.input-group').remove();
                calculateTotal();
            }
        });

        hargaJasaInput.addEventListener('input', calculateTotal);
        dynamicInputs.addEventListener('input', calculateTotal);

        function calculateTotal() {
            let total = parseFloat(hargaJasaInput.value) || 0;
            dynamicInputs.querySelectorAll('.input-group').forEach(inputGroup => {
                const hargaInput = inputGroup.querySelector('input[name="harga[]"]');
                const qtyInput = inputGroup.querySelector('input[name="qty[]"]');
                const harga = parseFloat(hargaInput.value) || 0;
                const qty = parseFloat(qtyInput.value) || 0;
                total += harga * qty;
            });
            totalHargaServiceInput.value = total;
        }
    });

        document.addEventListener('DOMContentLoaded', function() {
            var kmInput = document.getElementById('km');
            var kmSelanjutnyaInput = document.getElementById('km_selanjutnya');

            kmInput.addEventListener('input', function() {
                var kmValue = parseInt(kmInput.value);
                var kmSelanjutnyaValue = kmValue ? kmValue + 5000 : 0;
                kmSelanjutnyaInput.value = kmSelanjutnyaValue;
            });
        });
    </script>

</body>

</html>