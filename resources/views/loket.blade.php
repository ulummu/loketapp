@extends('main')
@section('loket')

<!-- Custom styles for this template -->
<head>
    <link href="loket.css" rel="stylesheet">
  </head>
  <body>
    
    
    
    <div class="container py-3">
  <div id="dashboardLoket">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <div class="container-fluid">
        {{-- <div class="d-flex flex-column flex-md-row pb-3 mb-4 border-bottom"> --}}
          <a href="/" class="d-flex text-dark text-decoration-none ">
            <img src="/img/bpn.png" alt="ATR/BPN Bantul" style="width: 32px; height:32px;" class="me-2"><title>ATR/BPN Bantul</title>
            <span class="fs-4 d-none d-sm-block">Sistem Antrian&nbsp</span><span class="fs-4">ATR/BPN Bantul</span>
          </a>
          <button id="navToggler" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" >
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
            
            {{-- <i class="bi bi-list"></i> --}}
          </button>
          <div class="collapse navbar-collapse d.flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link panel text-dark fs-6" href="{{route("login")}}">Admin</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link panel text-dark fs-6" href="/panel">Panel</a>
              </li>
            </ul>
          </div>
        {{-- </div> --}}
      </div>
    </nav>
    
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-5 fw-normal">Jumlah Antrian Besok</h1>
      <p class="fs-6 text-muted">Kantor Pertanahan Kabupaten Bantul melayani kepengurusan tanah setiap hari senin-jumat mulai pukul 08.00-16.00. Silakan ambil antrian sesuai dengan perihal yang akan dilakukan pengurusan. Setelah memiliki nomor antrian diharapkan datang 30 menit sebelum antrian anda dipanggil. Anda dapat memantau antrian anda melalui fitur Panel diatas</p>
      <a class="me-3 py-2  text-decoration-none" href="javascript:void(0)" onclick="return tapAntri()">Cek Antrianmu</a>
    </div>
  </header>
  
  <main id="loket">
    <div class="row row-cols-2 row-cols-sm-5 mb-3 mt-4 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3">
            <div class="card-body" onclick="ambilButton(this)" value="A">
              <h3>Loket A</h3>
              <h1 id="loketA" class="card-title" style="font-size: 4rem" >{{$antrian['antrianA']}}</h1>
              <p>Informasi & Pengajuan</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
            <div class="card-body" onclick="ambilButton(this)" value="B">
              <h3>Loket B</h3>
              <h1 id="loketB" class="card-title" style="font-size: 4rem">{{$antrian['antrianB']}}</h1>
              <p>Pembayaran</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3" >
            <div class="card-body" onclick="ambilButton(this)" value="C">
              <h3>Loket C</h3>
              <h1 id="loketC" class="card-title" style="font-size: 4rem">{{$antrian['antrianC']}}</h1>
              <p>Peralihan YBS</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
          <div class="card-body" onclick="ambilButton(this)" value="D">
              <h3>Loket D</h3>
              <h1 id="loketD" class="card-title" style="font-size: 4rem">{{$antrian['antrianD']}}</h1>
              <p>Peralihan PPAT</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
            <div class="card-body" onclick="ambilButton(this)" value="E">
              <h3>Loket E</h3>
              <h1 id="loketE" class="card-title" style="font-size: 4rem">{{$antrian['antrianE']}}</h1>
              <p>SKPT, Peningkatan & Penurunan</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-4 rounded-3">
            <div class="card-body" onclick="ambilButton(this)" value="F">
              <h3>Loket F</h3>
              <h1 id="loketF" class="card-title" style="font-size: 4rem">{{$antrian['antrianF']}}</h1>
              <p>Pengeringan</p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
          <div class="card-body" onclick="ambilButton(this)" value="G">
              <h3>Loket G</h3>
              <h1 id="loketG" class="card-title" style="font-size: 4rem">{{$antrian['antrianG']}}</h1>
              <p>Penyerahan</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
          <div class="card-body" onclick="ambilButton(this)" value="H">
              <h3>Loket H</h3>
              <h1 id="loketH" class="card-title" style="font-size: 4rem">{{$antrian['antrianH']}}</h1>
              <p>Ploting</p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
          <div class="card-body" onclick="ambilButton(this)" value="I">
              <h3>Loket I</h3>
              <h1 id="loketI" class="card-title" style="font-size: 4rem">{{$antrian['antrianI']}}</h1>
              <p>Pemecahan & Konversi</p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3">
            <div class="card-body" onclick="ambilButton(this)" value="J">
              <h3>Loket J</h3>
              <h1 id="loketJ" class="card-title" style="font-size: 4rem">{{$antrian['antrianJ']}}</h1>
              <p>Korektor Berkas</p>
            </div>
          </div>
      </div>
      
    </div>
    
  </main>
</div>
<div class="text-center" id="logo" style="display: none" >
  <img src="/img/bpnbig.png" style="height: 140px;width:140px;" class="mb-3" alt="Logo bpn">
</div>
<h4 class="h3 mb-3 fw-normal text-center" style="display: none" id="judulIsi">Silakan isi terlebih dahulu</h4>
<div class="row">
  <div class="col-sm-12 text-center d-flex justify-content-center">
    {{-- <div class='col-sm-6 d-flex justify-content-center'> --}}
      <div class="card bg-light">
        <div class="card-body" id="cardInput" style="display: none">
          <div id="inputan-pengunjung" style="display: none;">
            <form id="form" class="form">
          
              <div class="form-floating">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="Silakan Isi NIK">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="floatingInput">NIK</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" name="name" id="nama" placeholder="Silakan Isi Nama">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="password">Nama</label>
              </div>
              
              <button class="w-100 btn btn-lg btn-primary mt-3" onclick="masukkan()" id="tombolPengunjung" type="submit">Login</button>
            </form>
          </div>
          <div id="inputanCekAntri" style="display: none; width:15rem;">
            <form id="formCek">
              <input type="id" class="form-control" id="nikCek" placeholder="NIK">
            <div class="errorCek"></div>
            <button type="submit" class="btn btn-primary mt-3" id="cekAntri_button" onclick="cekAntri()">Submit</button>
          </form>
        </div>
        <div id="tanggalInput" class="form-tanggal" style="display: none">
          <form id="formTanggal">
          <label>Pilih Tanggal</label>
          <br>
          <div class="form-floating">
          <input type = "text" id = "datepicker" class="mt-2" style="height: 30px" autofocus>
          <i class="bi bi-check-circle-fill"></i>
          <i class="bi bi-exclamation-circle-fill"></i>
          <small>Error message</small>
        </div>
          {{-- <br> --}}
          <button type="submit" class="btn btn-primary mt-3" id="tanggalButton" onclick="cardTanggal()">Pilih</button>
        </form>
        </div>
        <div id="suksesAntri" style="display:none">
          <h3>Antrianmu : </h3>
          <h2 id="pengunjung_nik"></h2>
          <h1 id="nomorAntri" style="font-size:100px;"></h1>
          <h2 id="diambil"></h2>
          <h2 id="namap"></h2>
          <button onclick="cetakAntri()" class="btn btn-success"><i class="bi bi-download me-1" alt="cetak"></i>Cetak</button>
          <button class="btn btn-primary" onclick="window.location.href='/'">Kembali</button>
          {{-- <form class="form-inline" action="{{ url('/antrian/cetak_pdf/') }}" method="GET">
            <input type="text" class="form-control" name="nik" id="get_nik" hidden></td> --}}
          {{-- </form> --}}
        </div>
      </div>
      </div>
    {{-- </div> --}}
  </div>
</div>
<footer class="mt-3 border-top">
  <p class="text-end" style="color: silver">Develop  by mh.ulum</p>
  {{-- <div class="row">
    <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
        </ul>
      </div>
    </div> --}}
  </footer>
</div>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery-ui-1.13.1.custom\jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('../../loket.js') }}"></script>
</html>

@endsection