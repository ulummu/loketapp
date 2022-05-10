@extends('main')

@section('container')
<div class="row justify-content-center">
    <div class="col-sm-4">
        <div class="form-signin" id="login">
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal text-center">Silakan Login</h1>
            <form id="form" class="form">
          
              <div class="form-floating">
                <input type="text" class="form-control" name="nik" id="loginNik" placeholder="Silakan Isi NIK">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="floatingInput">NIK</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Password">
                <i class="bi bi-check-circle-fill"></i>
                <i class="bi bi-exclamation-circle-fill"></i>
                <small>Error message</small>
                <label for="password">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" onclick="tombolLogin()" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-2">belum memiliki akun? <a href="/register" style="text-decoration: none">Buat sekarang!</a></small>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div id="alertNik" class="alert alert-danger mt-3" style="width: fit-content; display:none">
          NIK tidak terdaftar!
        </div>
        <div id="alertPass" class="alert alert-danger mt-3" style="width: fit-content; display:none">
          Password salah!
        </div>
      </div>
@endsection