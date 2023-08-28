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
            <h1 class="h3 mb-0 text-gray-800">Penambahan Data Bengkel</h1>
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

    <form method="post" action="{{ route('bengkel.store') }}" class="container-fluid">
        @csrf
        <b>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="">Nama bengkel</label>
              <input type="text" class="form-control @error('nama_bengkel') is-invalid @enderror" name="nama_bengkel" value="{{ old('nama_bengkel') }}" required autocomplete="nama_bengkel" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Jenis Bengkel</label>
                <select class="form-control @error('jenis_bengkel') is-invalid @enderror" name="jenis_bengkel" required autocomplete="jenis_bengkel" autofocus>
                    <option value="" {{ old('jenis_bengkel') == '' ? 'selected' : '' }}>Pilih Jenis Bengkel</option>
                    <option value="Eksternal" {{ old('jenis_bengkel') == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                    <option value="Internal" {{ old('jenis_bengkel') == 'Internal' ? 'selected' : '' }}>Internal</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="">Alamat Bengkel</label>
              <input type="text" class="form-control @error('alamat_bengkel') is-invalid @enderror" name="alamat_bengkel" value="{{ old('alamat_bengkel') }}" required autocomplete="alamat_bengkel" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="">No Telepon</label>
              <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required autocomplete="nomor_telepon" autofocus>
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