function cekloket(x) {
  return "masuk";
}
setInterval(function () {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "GET",
    url: "./panel",
    dataType: "json",
    success: function (res) {
      $("#nomor0").text(res.loket0.loket + res.loket0.nomorAntri);
      $("#nomor1").text(res.loketA);
      $("#nomor2").text(res.loketB);
      $("#nomor3").text(res.loketC);
      $("#nomor4").text(res.loketD);
      $("#nomor5").text(res.loketE);
      $("#nomor6").text(res.loketF);
      $("#nomor7").text(res.loketG);
      $("#nomor8").text(res.loketH);
      $("#nomor9").text(res.loketI);
      $("#nomor10").text(res.loketJ);
    },
  });
}, 5000);

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
