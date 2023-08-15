<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-car"></i>
      </div>
      <div class="sidebar-brand-text mx-3">ArthaRide</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Kendaraan
    </div>
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-sw fa-taxi"></i>
        <span>Pembelian Kendaraan</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelola Pembelian</h6>
          <a class="collapse-item" href="{{ url('/pengajuanpembelian') }}">Pengajuan Pembelian</a>
          <a class="collapse-item" href="{{ url('/transaksipembelian') }}">Transaksi Pembelian</a>
          <a class="collapse-item" href="{{ url('/stdealertowahana') }}">Serah Terima Kendaraan</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-sw fa-taxi"></i>
        <span>Kelola Kendaraan</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelola Kendaraan</h6>
          <a class="collapse-item" href="{{ url('/kendaraan') }}">Data Kendaraan</a>
        </div>
      </div>
    </li>
    
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-id-card"></i>
        <span>Surat Kendaraan</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelola Surat Kendaraan</h6>
          <a class="collapse-item" href="#">Approval Data BPKB</a>
          <a class="collapse-item" href="#">Approval Data STNK</a>
          <a class="collapse-item" href="#">Approvak Data KIR</a>
        </div>
      </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Sewa Kendaraan
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/sppk') }}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>SPPK</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/kontraksewa') }}">
        <i class="fas fa-fw fa-address-book"></i>
        <span>Kontrak Sewa</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/stwahanatocabang') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Serah Terima Kendaraan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/stwahanatocabang') }}">
        <i class="fas fa-fw fa-unlink"></i>
        <span>Penggantian Kendaraan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/stwahanatocabang') }}">
        <i class="fas fa-fw fa-undo"></i>
        <span>Pengembalian Kendaraan</span>
      </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Service Kendaraan
    </div>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      User
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapsePengguna">
        <i class="fas fa-user fa-sm fa-fw"></i>
        <span>User</span>
      </a>
      <div id="collapsePengguna" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelola User:</h6>
          <a class="collapse-item" href="{{ route('register') }}">Tambah User</a>
          <a class="collapse-item" href="#">Data User</a>
        </div>
      </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    </ul>
    <!-- End of Sidebar -->
    