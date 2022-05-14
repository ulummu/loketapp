@extends('main')
@section('panel')
<style>
    /* div {
  height:720px;
} */
.short-div {
  height:240px;
  border-bottom: 5px solid grey;
}
.short-div h1{
  display: flex;
  justify-content: center;
  align-items: center;
}
.short-div h2{
  display: flex;
  justify-content: center;
  padding-top: 5px;
  font-weight: bold;
}
.short-div-mid{
  height: 720px;
  border-bottom: 5px solid grey;
}

.short-div-mid h1 {
  font-size: 20rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

.short-div-mid h2 {
  font-size: 5rem;
  display: flex;
  justify-content: center;
  padding-top: 5px;
  font-weight: bold;
}
.short-div-mid h3 {
  padding-top:20px; 
  display: flex;
  justify-content: center;
  align-items: center;
}

h1 {
    font-size: 10rem;
}

@media only screen and (min-width: 600px) and (max-width: 900px) {
    h1 {
        font-size: 6rem;
    }
    .short-div {
        height:200px;
        border-bottom: 5px solid grey;
    }
    .short-div-mid{
        height: 600px;
        border-bottom: 5px solid grey;
    }
    .short-div-mid h1 {
        font-size: 10rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .short-div-mid h3 {
        margin-top: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

@media only screen and (max-width: 600px) {
    /* For mobile phones: */
    .short-div-mid{
        display: none;
        height: 240px;
        border-bottom: 5px solid grey;
    }
    .short-div-mid h1 {
        font-size: 8rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .short-div-mid h2 {
        font-size: 25px;
        display: flex;
        justify-content: center;
        padding-top: 5px;
        font-weight: bold;
    }
    .short-div-mid h3 {
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>
    <body>
        <div class="container">
            <h3 class="mt-2"><img src="/img/bpn.png" alt="BPN Bantul" class="me-2" style="width: 40px; height:40px;">Kantor Pertanahan Bantul</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket1">Loket 1</h2>
                        <h1 id="nomor1"></h1>
                    </div>
                    <div class="short-div">
                        <h2 id="loket2">Loket 2</h2>
                        <h1 id="nomor2"></h1>
                    </div>
                    <div class="short-div">
                        <h2 id="loket3">Loket 3</h2>
                        <h1 id="nomor3"></h1>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="short-div-mid" >
                        <h3>Antrian Sedang Dipanggil</h3>
                        <h2 id="loket0"></h2>
                        <h1 id="nomor0"></h1>
                    </div>
                    
                    
                </div>
                <div class="col-md-3" >
                    <div class="short-div" >
                        <h2 id="loket10">Loket 10</h2>
                        <h1 id="nomor10"></h1>
                    </div>
                    <div class="short-div" >
                        <h2 id="loket9">Loket 9</h2>
                        <h1 id="nomor9"></h1>
                    </div>
                    <div class="short-div" >
                        <h2 id="loket8">Loket 8</h2>
                        <h1 id="nomor8"></h1>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket4">Loket 4</h2>
                        <h1 id="nomor4"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket5">Loket 5</h2>
                        <h1 id="nomor5"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket6">Loket 6</h2>
                        <h1 id="nomor6"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket7">Loket 7</h2>
                        <h1 id="nomor7"></h1>
                    </div>
                </div>
              </div>
        </div>
    </body>
    <script src="../panel.js"></script>
@endsection