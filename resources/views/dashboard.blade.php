@extends('main')
@section('dashboard')
    
<head>
  <!-- Custom styles for this template -->
  
  <audio id="tingtung" src="../tingtung.mp3"></audio>
</head>
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">BPN BANTUL</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3 d-none d-sm-block" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log out</a>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item mb-3">
              <a class="nav-link" aria-current="page" href="javascript:void(0)" onclick="ambilData(this)" value="A">
                <span data-feather="home"></span>
                Loket A
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="B">
                <span data-feather="file"></span>
                Loket B
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="C">
                <span data-feather="shopping-cart"></span>
                Loket C
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="D">
                <span data-feather="users"></span>
                Loket D
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="E">
                <span data-feather="bar-chart-2"></span>
                Loket E
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="F">
                <span data-feather="layers"></span>
                Loket F
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" aria-current="page" href="javascript:void(0)" onclick="ambilData(this)" value="G">
                <span data-feather="home"></span>
                Loket G
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="H">
                <span data-feather="file"></span>
                Loket H
              </a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="ambilData(this)" value="I">
                <span data-feather="shopping-cart"></span>
                Loket I
              </a>
            </li>
            <li class="nav-item mb-3 ">
              <a class="nav-link border-bottom border-3" href="javascript:void(0)" onclick="ambilData(this)" value="J">
                <span data-feather="users"></span>
                Loket J
              </a>
            </li>
            {{-- <li class="nav-item mb-3">
              <a class="nav-link" href="javascript:void(0)" onclick="tanggalLibur()">
                <span data-feather="calendar"></span>
                Tanggal libur
              </a>
            </li> --}}
            <li class="nav-item mb-3">
              <a class="nav-link d-md-none d-lg-none" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log out</a>
              <form id="logoutform" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
              </form>
            </li>

          </ul>

          
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div id="titleDashboard">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h5>Silakan Pilih Loket anda pada Sidebar sebelah kiri</h5>
        </div>
        <div id="tanggalLib" style="display: none" class="mt-3">
          <label>Pilih Tanggal</label>
          <br>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id = "datepicker" >
              <button class="btn btn-primary" type="submit" id="button-addon2" onclick="inputTanggalLibur()">Simpan</button>
            </div>
          </form>
        </div>
        <div id="tabelData" style="display: none">
          <h2 id="judulTabel" class="mt-3"></h2>
          <ul class="nav nav-tabs mt-3">
            <li class="nav-item">
              <a class="nav-link tab active" data-bs-toggle="tab" onclick="dataPanggil()">Panggil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" onclick="selesai()">Selesai</a>
            </li>
          </ul>
          <div class="table-responsive">
            <table class="table display table-hover table-sm" id="dataDisplay" style="width:100%">
              <thead>
                <tr>
                  <th class="col-sm-2">NIK</th>
                  <th class="col-sm-3">Nama</th>
                  <th class="col-sm-1">Loket</th>
                  <th class="col-sm-2">Nomor Antri</th>
                  <th>status</th>
                  <th class="col-sm-4">Aksi</th>
                </tr>
              </thead>
              <tbody id="tbody">
                
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery-ui-1.13.1.custom\jquery-ui.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
@endsection