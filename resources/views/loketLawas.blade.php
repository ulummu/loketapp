{{-- @dd($antrian->pengunjung) --}}
@extends('main')
@section('kartu')
<div class='col-sm-3 d-flex justify-content-center'>
  <div class="card bg-light" >
    <div class="card-body" >
      <div id="antrian" style="width: 15rem;">
        <h3>Jumlah Antrian Besok</h3>
        <h5 id="loketA" style="white-space: pre" ></h5>
        <h5 id="loketB" style="white-space: pre"></h5>
        <h5 id="loketC" style="white-space: pre"></h5>
        <h5 id="loketD" style="white-space: pre"></h5>
        <h5 id="loketE" style="white-space: pre"></h5>
        <h5 id="loketF" style="white-space: pre"></h5>
        <h5 id="loketG" style="white-space: pre"></h5>
        <h5 id="loketH" style="white-space: pre"></h5>
        <h5 id="loketI" style="white-space: pre"></h5>
        <h5 id="loketJ" style="white-space: pre"></h5>
        {{-- <p class="card-text">Silakan pilih tanggal</p> --}}
        <a href="javascript:void(0)" class="btn btn-primary mb-2" onclick="ambilButton()">Ambil Antrian</a>
        <br>
        <a href="javascript:void(0)" onclick="return tapAntri()" id="tapAntri" style="text-decoration: none;" >Cek Antrianmu</a>
      </div>
      <div id="layananLoket" style="display: none; width: 15rem;" >
        <button type="submit" class="btn btn-success mt-3" id="loketA" onclick="layanan(this)" value="A" style="width: inherit;">Informasi & Pengajuan</button>
        <button type="submit" class="btn btn-success mt-3" id="loketB" onclick="layanan(this)" value="B" style="width: inherit;">Pembayaran</button>
        <button type="submit" class="btn btn-success mt-3" id="loketC" onclick="layanan(this)" value="C" style="width: inherit;">Peralihan YBS</button>
        <button type="submit" class="btn btn-success mt-3" id="loketD" onclick="layanan(this)" value="D"  style="width: inherit;">Peralihan PPAT</button>
        <button type="submit" class="btn btn-success mt-3" id="loketE" onclick="layanan(this)" value="E"  style="width: inherit;">SKPT, Peningkatan & Penurunan</button>
        <button type="submit" class="btn btn-success mt-3" id="loketF" onclick="layanan(this)" value="F"  style="width: inherit;">Pengeringan</button>
        <button type="submit" class="btn btn-success mt-3" id="loketG" onclick="layanan(this)" value="G"  style="width: inherit;">Penyerahan</button>
        <button type="submit" class="btn btn-success mt-3" id="loketH" onclick="layanan(this)" value="H"  style="width: inherit;">Ploting</button>
        <button type="submit" class="btn btn-success mt-3" id="loketI" onclick="layanan(this)" value="I"  style="width: inherit;">Pemecahan & Konversi</button>
        <button type="submit" class="btn btn-success mt-3" id="loketJ" onclick="layanan(this)" value="J"  style="width: inherit;">Korektor Berkas</button>
      </div>
      <div id="inputan-pengunjung" style="display: none; width:15rem;">
        <form id="form">
          <input type="id" class="form-control" id="nik" placeholder="NIK">
        <div class="error"></div>
        <input type="name" class="form-control mt-3" id="nama" placeholder="Nama" >
        <div class="error"></div>
        <button type="submit" class="btn btn-primary mt-3" id="antri_button" onclick="masukkan()">Submit</button>
      </form>
    </div>
      <div id="inputanCekAntri" style="display: none; width:15rem;">
        <form id="formCek">
          <input type="id" class="form-control" id="nikCek" placeholder="NIK">
        <div class="errorCek"></div>
        <button type="submit" class="btn btn-primary mt-3" id="cekAntri_button" onclick="cekAntri()">Submit</button>
      </form>
    </div>
    <div id="tanggalInput" style="display: none">
      <label>Silakan pilih Tanggal</label>
      <br>
      <input type = "text" id = "datepicker" class="mt-2" style="height: 30px" autofocus>
      <br>
      <button type="submit" class="btn btn-primary mt-3" id="tanggalButton" onclick="inputTanggal()">Pilih</button>
    </div>
    <div id="suksesAntri" style="display:none">
      <h3>Antrianmu : </h3>
      <h2 id="pengunjung_nik"></h2>
      <h1 id="nomorAntri" style="font-size:100px;"></h1>
      <h2 id="diambil"></h2>
      <h2 id="namap"></h2>
      <button onclick="cetakAntri()" class="btn btn-outline-dark"><i class="bi bi-download" alt="cetak"></i></button>
      {{-- <form class="form-inline" action="{{ url('/antrian/cetak_pdf/') }}" method="GET">
        <input type="text" class="form-control" name="nik" id="get_nik" hidden></td> --}}
      {{-- </form> --}}
    </div>
  </div> 
</div>
@endsection