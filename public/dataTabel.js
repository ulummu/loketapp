var pilihLayanan = "";
var loket = "";
var ngawur = "";

function clearTable() {
  document.getElementById("tbody").innerHTML = "";
}
function ambilData(val) {
  // console.log(val);
  pilihLayanan = val.getAttribute("value");
  console.log(pilihLayanan);
  var w = document.getElementById("titleDashboard");
  var x = document.getElementById("tabelData");
  var y = document.getElementById("judulTabel");
  if (x.style.display === "none") {
    x.style.display = "block";
    w.style.display = "none";
  }
  if ($.fn.DataTable.isDataTable("#dataDisplay")) {
    $("#dataDisplay").DataTable().destroy();
  }
  $("#dataDisplay tbody").empty();

  dataTabel();
  y.innerText = "Loket " + pilihLayanan;
}
// var nik;
function dataTabel() {
  console.log("aku " + pilihLayanan);
  var table = $("#dataDisplay").DataTable({
    lengthChange: false,
    searching: false,
    // processing: true,
    serverSide: true,
    // destroy: true,
    ajax: "./dashboard/data/" + pilihLayanan,
    columns: [
      {
        data: "pengunjung_nik",
      },
      {
        data: "pengunjung.nama",
      },
      {
        data: "loket",
      },
      {
        data: "nomorAntri",
      },
      {
        data: "status",
        visible: false,
      },
      {
        data: null,
        orderable: false,
        searchable: false,
        // width: "100px",
        // className: "text-center",
        render: function (data, type, row) {
          // jika tidak ada data "status"
          // console.log(row.pengunjung_nik);
          if (data["status"] === "") {
            // sembunyikan button panggil
            var btn = "-";
          }
          // jika data "status = 0"
          else if (row.status === 0) {
            //   // tampilkan button panggil
            var btn =
              '<button type="button" class="btn btn-primary me-2" id="panggil" onclick="panggil(' +
              row.pengunjung_nik +
              ')"><i class="bi bi-volume-up-fill"></i></button>' +
              '<button type="button" class="btn btn-success" onclick="proses(' +
              row.pengunjung_nik +
              ')">Proses</button>';
          }
          // jika data "status = 1"
          else if (data["status"] === 1) {
            // tampilkan button ulangi panggilan
            var btn =
              '<button type="button" class="btn btn-secondary me-2" disabled id="panggil"><i class="bi bi-volume-up-fill"></i></button>' +
              '<button type="button" class="btn btn-success" id="proses">Proses</button>' +
              '<i class="d-inline bi bi-check-lg ms-2 fs-6" style="color:green; display:block;" id="checkProses"> sudah diproses</i>';
          }
          return btn;
        },
      },
    ],
    order: [
      [3, "asc"], // urutkan data berdasarkan "no_antrian" secara descending
    ],
    iDisplayLength: 100, // tampilkan 10 data per halaman
  });
  setInterval(function () {
    $("#dataDisplay").DataTable().ajax.reload();
  }, 2000);
}

function proses(nik) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    type: "POST",
    url: "./dashboard/data/update",
    data: {
      nik: nik,
    },
  });
}
function panggil(nik) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    type: "POST",
    url: "./dashboard/data/panggil",
    data: {
      nik: nik,
    },
  });
}

function convertLoket(x) {
  switch (x) {
    case "A":
      return "1";
      break;
    case "B":
      return "2";
      break;
    case "C":
      return "3";
      break;
    case "D":
      return "4";
      break;
    case "E":
      return "5";
      break;
    case "F":
      return "6";
      break;
    case "G":
      return "7";
      break;
    case "H":
      return "8";
      break;
    case "I":
      return "9";
      break;
    case "J":
      return "10";
      break;

    default:
      text = "ra masuk";
      break;
  }
}

function tanggalLibur() {
  var w = document.getElementById("titleDashboard");
  var x = document.getElementById("tanggalLib");
  if (x.style.display === "none") {
    x.style.display = "block";
    w.style.display = "none";
  }

  // $("#datepicker").datepicker({
  //   dateFormat: "dd/mm/yy",
  //   minDate: 0,
  //   dayNames: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
  //   dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
  //   monthNames: [
  //     "Januari",
  //     "Februari",
  //     "Maret",
  //     "April",
  //     "Mei",
  //     "Juni",
  //     "Juli",
  //     "Agustus",
  //     "September",
  //     "Oktober",
  //     "November",
  //     "Desember",
  //   ],
  //   beforeShowDay: function (date) {
  //     var dayOfWeek = date.getDay();
  //     // 0 : Sunday, 1 : Monday, ...
  //     if (dayOfWeek == 0 || dayOfWeek == 6) return [false];
  //     else return [true];
  //   },
  // });
}
$(document).ready(function () {
  // code to read selected table row cell data (values).
  $("#dataDisplay").on("click", ".btn-primary", function () {
    $(this).addClass("btn-secondary");
    // get the current row
    var currentRow = $(this).closest("tr");

    var loket = currentRow.find("td:eq(2)").text(); // get current row 3rd TD
    var nomorAntri = currentRow.find("td:eq(3)").text(); // get current row 3rd TD
    var bell = document.getElementById("tingtung");

    // mainkan suara bell antrian
    bell.pause();
    bell.currentTime = 0;
    bell.play();

    // set delay antara suara bell dengan suara nomor antrian
    durasi_bell = bell.duration * 770;

    // goyangkan suara nomor antrian
    setTimeout(function () {
      responsiveVoice.speak(
        "Nomor Antrian," +
          nomorAntri +
          ", menuju, loket," +
          convertLoket(loket),
        "Indonesian Female",
        {
          rate: 0.9,
          pitch: 1,
          volume: 1,
        }
      );
    }, durasi_bell);
  });
});
