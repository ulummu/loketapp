@extends('main')
@section('panel')
<head>
    <link rel="stylesheet" href="panel.css">
</head>
    <body>
        <div class="container">
            <h3 class="mt-2"><img src="/img/bpn.png" alt="BPN Bantul" class="me-2" style="width: 40px; height:40px;">Kantor Pertanahan Bantul</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2>Loket 1</h2>
                        <h1 id="nomor1"></h1>
                    </div>
                    <div class="short-div">
                        <h2>Loket 2</h2>
                        <h1 id="nomor2"></h1>
                    </div>
                    <div class="short-div">
                        <h2>Loket 3</h2>
                        <h1 id="nomor3"></h1>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="short-div-mid" >
                        <h3>Antrian Sedang Dipanggil</h3>
                        <h2></h2>
                        <h1 id="nomor0"></h1>
                    </div>
                    
                    
                </div>
                <div class="col-md-3" >
                    <div class="short-div" >
                        <h2>Loket 10</h2>
                        <h1 id="nomor10"></h1>
                    </div>
                    <div class="short-div" >
                        <h2>Loket 9</h2>
                        <h1 id="nomor9"></h1>
                    </div>
                    <div class="short-div" >
                        <h2>Loket 8</h2>
                        <h1 id="nomor8"></h1>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2>Loket 4</h2>
                        <h1 id="nomor4"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2>Loket 5</h2>
                        <h1 id="nomor5"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2>Loket 6</h2>
                        <h1 id="nomor6"></h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="short-div" >
                        <h2>Loket 7</h2>
                        <h1 id="nomor7"></h1>
                    </div>
                </div>
              </div>
        </div>
    </body>
    <script src="../panel.js"></script>
@endsection