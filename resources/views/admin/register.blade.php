@extends('main')

@section('container')
<div class="row justify-content-center">
    <div class="col-sm-5">
        <main class="form-registration">
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal text-center">Form Daftar</h1>
            <form id="form" class="form">
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control" name="name" id="namaReg" placeholder="Silakan isi Nama">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label>Nama</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" name="nik" id="regNik" placeholder="Silakan Isi NIK">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="floatingInput">NIK</label>
              </div>
              <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="password">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" id="submitDaftar" onclick="tombolDaftar()" type="submit">Daftar</button>
            </form>
            <small class="d-block text-center mt-2">sudah memiliki akun? <a href="/admin" style="text-decoration: none">Login</a></small>
          </main>
    </div>
</div>
@endsection