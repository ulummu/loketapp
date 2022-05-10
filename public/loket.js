var getNik = "";
var getNama = "";
function inputPengunjung() {
  getNik = $("#nik").val();
  getNama = $("#nama").val();
  console.log(getNik);
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "POST",
    url: "./pengunjung/tambah",
    dataType: "json",
    data: {
      nik: $("#nik").val(),
      nama: $("#nama").val(),
    },
    success: function (data) {
      $("#nik").val("");
      $("#nama").val("");
    },
    error: function (data) {
      $("#inputan-pengunjung").show();
      $("#tanggalInput").hide();
      setErrorFor(nik, "");
      setErrorFor(nama, "");
      contoh();
    },
  });
}

var pilihLayanan = "";
function ambilButton(val) {
  pilihLayanan = val.getAttribute("value");
  console.log(pilihLayanan);
  var v = document.getElementById("logo");
  var w = document.getElementById("judulIsi");
  var x = document.getElementById("dashboardLoket");
  var y = document.getElementById("inputan-pengunjung");
  var z = document.getElementById("cardInput");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    v.style.display = "block";
    x.style.display = "none";
    w.style.display = "block";
    y.style.display = "block";
    z.style.display = "block";
  }
}

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  formControl.className = "form-floating error";
  small.innerText = message;
}
const nik = document.getElementById("nik");
const nama = document.getElementById("nama");
function masukkan() {
  const form = document.getElementById("form");
  const inputanPengunjung = document.getElementById("inputan-pengunjung");
  const tanggal = document.getElementById("tanggalInput");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    e.stopImmediatePropagation();

    checkInputs();
    // inputPengunjung();
  });

  function checkInputs() {
    // trim to remove the whitespaces
    const namaValue = nama.value.trim();
    const nikValue = nik.value.trim();

    if (nikValue === "") {
      setErrorFor(nik, "NIK tidak boleh kosong");
    } else if (nik.value.length != 16 && !isNaN(nik.value)) {
      setErrorFor(nik, "NIK tidak sesuai");
    } else if (isNaN(nik.value)) {
      setErrorFor(nik, "NIK yang diinputkan bukan angka");
    } else {
      setSuccessFor(nik);
    }

    if (namaValue === "") {
      setErrorFor(nama, "Password tidak boleh kosong");
    } else {
      setSuccessFor(nama);
    }

    if (nik.value.length === 16 && namaValue != "") {
      inputPengunjung();
      inputanPengunjung.style.display = "none";
      tanggal.style.display = "block";
    }
  }

  function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = "form-floating success";
  }
}

function cardTanggal() {
  const form = document.getElementById("formTanggal");
  const tanggal = document.getElementById("datepicker");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    e.stopImmediatePropagation();

    checkInputTanggal();
    // inputPengunjung();
  });
  function checkInputTanggal() {
    // trim to remove the whitespaces
    const tanggalValue = tanggal.value.trim();

    if (tanggalValue === "") {
      setErrorFor(tanggal, "Tanggal tidak boleh kosong");
    } else {
      setSuccessFor(tanggal);
    }

    if (tanggalValue != "") {
      inputTanggal();
      tanggal.style.display = "";
    }
  }

  function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = "form-floating success";
  }
}

$("#datepicker").datepicker({
  dateFormat: "dd/mm/yy",
  minDate: 0,
  dayNames: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
  dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
  monthNames: [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ],
  beforeShowDay: function (date) {
    var dayOfWeek = date.getDay();
    // 0 : Sunday, 1 : Monday, ...
    if (dayOfWeek == 0 || dayOfWeek == 6) return [false];
    else return [true];
  },
});

var getDate = "";
function inputTanggal() {
  getDate = $("#datepicker").val();
  console.log(getDate);
  var tanggal = getDate.slice(0, 2);
  var tahun = getDate.slice(6, 10);
  var bulan = getDate.slice(3, 5);
  var bulanNew = "";
  switch (bulan) {
    case "01":
      bulanNew = "Januari";
      break;
    case "02":
      bulanNew = "Februari";
      break;
    case "03":
      bulanNew = "Maret";
      break;
    case "04":
      bulanNew = "April";
      break;
    case "05":
      bulanNew = "Mei";
      break;
    case "06":
      bulanNew = "Juni";
      break;
    case "07":
      bulanNew = "Juli";
      break;
    case "08":
      bulanNew = "Agustus";
      break;
    case "09":
      bulanNew = "September";
      break;
    case "10":
      bulanNew = "Oktober";
      break;
    case "11":
      bulanNew = "November";
      break;
    case "12":
      bulanNew = "Desember";
      break;

    default:
      text = "ra masuk";
      break;
  }
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "POST",
    url: "./antrian/pesan",
    dataType: "json",
    data: {
      nik: getNik,
      tanggal: $("#datepicker").val(),
      loket: pilihLayanan,
      status: 0,
      panggil: 0,
    },
    success: function (data) {
      $("#nik").val(getNik);
      $("#datepicker").val("");
      $("#tanggalInput").hide();
      $("#suksesAntri").show();
      $("#pengunjung_nik").text(data.pengunjung_nik);
      $("#nomorAntri").text(pilihLayanan + data.nomorAntri);
      $("#diambil").text(tanggal + " " + bulanNew + " " + tahun);
      $("#namap").text(data.nama);
      $("#judulIsi").hide();
    },
    error: function (data) {
      swal({
        title: "Gagal!",

        text: "Antrian pada tanggal ini sudah penuh",

        icon: "error",
      });
    },
  });
}
// $("#tapAntri").on("click", function () {
//     cekAntri();
// });
function tapAntri() {
  var x = document.getElementById("dashboardLoket");
  var y = document.getElementById("inputanCekAntri");
  var z = document.getElementById("cardInput");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    y.style.display = "block";
    z.style.display = "block";
  }
}
function cekAntri() {
  let id = (id) => document.getElementById(id);
  let classes = (classes) => document.getElementsByClassName(classes);

  let nik = id("nikCek"),
    form = id("formCek"),
    tombol = id("cekAntri_button");
  errorMsg = classes("errorCek");

  // console.log(nama.value);
  let engine = (id, serial, message) => {
    if (id.value.trim() === "") {
      errorMsg[serial].innerHTML = message;
      id.style.border = "2px solid red";
    } else if (nik.value.length != 16 || isNaN(nik.value)) {
      errorMsg[serial].innerHTML = message;
      nik.style.border = "2px solid red";
      console.log(errorMsg[serial]);
    } else {
      errorMsg[serial].innerHTML = "";
      id.style.border = "2px solid green";
      inputanCek();
      nik.style.display = "none";
      tombol.style.display = "none";
    }

    // if (nama.value.length != 0 && nik.value.length == 16) {
    // }
  };
  // console.log(l);

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    e.stopImmediatePropagation();

    engine(nik, 0, "NIK tidak boleh kosong");

    if (nik.value.length != 0 && nik.value.length != 16) {
      engine(nik, 0, "NIK tidak sesuai");
    }

    if (isNaN(nik.value)) {
      engine(nik, 0, "NIK tidak valid");
    }
  });
}

// getDate = $("#datepicker").val();
function cetakAntri() {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "GET",
    url: "./antrian/cetak_pdf",
    dataType: "json",
    data: {
      nik: getNik,
      loket: pilihLayanan,
      // tanggal: $("#datepicker").val(),
    },
    success: function (data) {},
  });
}
var getNikCek = "";
function inputanCek() {
  getNik = $("#nikCek").val();
  console.log(getNikCek);
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "GET",
    url: "./antrian/cek_antrian",
    dataType: "json",
    data: {
      nik: getNik,
      // tanggal: $("#datepicker").val(),
    },
    success: function (data) {
      $("#nik").val(getNik);
      $("#datepicker").val("");
      $("#tanggalInput").hide();
      $("#suksesAntri").show();
      $("#pengunjung_nik").text(data.pengunjung_nik);
      $("#nomorAntri").text(data.loket + data.nomorAntri);
      $("#diambil").text(data.diambil);
      $("#namap").text(data.nama);
      $("#get_nik").val(getNik);
      $("#judulIsi").hide();
    },
    error: function (data) {
      swalCek();
      window.location = "/";
    },
  });
}

var currentDate = new Date().toISOString().split("T")[0];
setInterval(ajaxCall, 30000); //300000 MS == 5 minutes
function ajaxCall() {
  //do your AJAX stuff here
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "GET",
    url: "./pengunjung/tanggal",
    dataType: "json",
    data: {
      tanggalSekarang: currentDate,
    },
    success: function (data) {
      $("#loketA").text(data.antrianA);
      $("#loketB").text(data.antrianB);
      $("#loketC").text(data.antrianC);
      $("#loketD").text(data.antrianD);
      $("#loketE").text(data.antrianE);
      $("#loketF").text(data.antrianF);
      $("#loketG").text(data.antrianG);
      $("#loketH").text(data.antrianH);
      $("#loketI").text(data.antrianI);
      $("#loketJ").text(data.antrianJ);
    },
  });
}

function contoh() {
  swal({
    title: "Gagal!",

    text: "NIK sudah memiliki antrian jika belum tunggu beberapa saat lagi",

    icon: "error",
  });
}
function swalCek() {
  swal({
    title: "Gagal!",

    text: "NIK belum memiliki antrian" + " Silakan Ambil Antrian",

    icon: "error",
  });
}
function swalAntrianPenuh() {
  swal({
    title: "Gagal!",

    text: "Antrian pada tanggal ini sudah penuh",

    icon: "error",
  });
}
