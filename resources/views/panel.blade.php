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
  height: 480px;
  border-bottom: 5px solid grey;
}

.short-div-mid h1 {
  font-size: 15rem;
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


h1 {
    font-size: 8rem;
}

@media only screen and (min-width: 600px) {
    h1 {
        font-size: 6rem;
    }
    .short-div {
        height:200px;
        border-bottom: 5px solid grey;
    }
    .short-div-mid{
        height: 400px;
        border-bottom: 5px solid grey;
    }
    .short-div-mid h1 {
        font-size: 10rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    .short-div-mid{
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
}
</style>
    <body>
        <div class="container">
            <h3 class="mt-2"><img src="/img/bpn.png" alt="BPN Bantul" class="me-2" style="width: 40px; height:40px;">Kantor Pertanahan Bantul</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket1"></h2>
                        <h1 id="nomor1"></h1>
                    </div>
                    <div class="short-div">
                        <h2 id="loket2"></h2>
                        <h1 id="nomor2"></h1>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="short-div-mid" >
                        <h2 id="loket0"></h2>
                        <h1 id="nomor0"></h1>
                    </div>
                    
                    
                </div>
                <div class="col-md-3" >
                    <div class="short-div" >
                        <h2 id="loket8"></h2>
                        <h1 id="nomor8"></h1>
                    </div>
                    <div class="short-div" >
                        <h2 id="loket7"></h2>
                        <h1 id="nomor7"></h1>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket3"></h2>
                        <h1 id="nomor3"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket4"></h2>
                        <h1 id="nomor4"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket5"></h2>
                        <h1 id="nomor5"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2 id="loket6"></h2>
                        <h1 id="nomor6"></h1>
                    </div>
                </div>
              </div>
        </div>
    </body>
    <script src="../panel.js"></script>
@endsection