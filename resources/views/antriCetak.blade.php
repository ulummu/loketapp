<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.css">
    <title>Document</title>
    <style>
        body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: Arial, Helvetica, sans-serif;
    padding: 0;
    margin: 0;
}

p {
    margin: 0;
    padding: 0;
}
        </style>
</head>
<body>
    
    <center>
        <div id="struk-antrian">
            <p>ATR/BPN Bantul</p>
            <p>Badan Pertanahan Nasional kab.Bantul</p>
            <hr style="width: 41%;">
            {{-- <h2 id="pengunjung_nikCetak" >{{$show['pengunjung_nik']}}</h2> --}}
            <h2>Nomor Antrian</h2>
            <h1 id="nomorAntriCetak" style="font-size:100px;">{{$show['loket']}}{{$show['nomorAntri']}}</h1>
            <h2>Layanan : Loket {{$show['loketNew']}}</h2>
            <hr style="width: 41%;">
            <p id="diambilCetak" >{{$show['diambil']}}</p>
        </div>
        {{-- <h4 id="namapCetak" >{{$show['nama']}}</h4> --}}
    </center>
    {{-- @endforeach --}}
    
</body>
</html>
            



