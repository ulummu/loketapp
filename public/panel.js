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
      $("#nomor1").text("A" + res.loketA.nomorAntri);
      $("#nomor2").text("B" + res.loketB.nomorAntri);
      $("#nomor3").text("C" + res.loketC.nomorAntri);
      $("#nomor4").text("D" + res.loketD.nomorAntri);
      $("#nomor5").text("E" + res.loketE.nomorAntri);
      $("#nomor6").text("F" + res.loketF.nomorAntri);
      $("#nomor7").text("G" + res.loketG.nomorAntri);
      $("#nomor8").text("H" + res.loketH.nomorAntri);
      $("#nomor9").text("I" + res.loketI.nomorAntri);
      $("#nomor10").text("J" + res.loketJ.nomorAntri);
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
