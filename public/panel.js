setInterval(function () {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "GET",
    url: "./panel",
    dataType: "json",
    success: function (data) {
      // console.log(data[].loket);
      $("#loket0").text("Loket " + convertLoket(data[0].loket));
      $("#nomor0").text(data[0].loket + data[0].nomorAntri);
      $("#loket1").text("Loket " + convertLoket(data[1].loket));
      $("#nomor1").text(data[1].loket + data[1].nomorAntri);
      $("#loket2").text("Loket " + convertLoket(data[2].loket));
      $("#nomor2").text(data[2].loket + data[2].nomorAntri);
      $("#loket3").text("Loket " + convertLoket(data[3].loket));
      $("#nomor3").text(data[3].loket + data[3].nomorAntri);
      $("#loket4").text("Loket " + convertLoket(data[4].loket));
      $("#nomor4").text(data[4].loket + data[4].nomorAntri);
      $("#loket5").text("Loket " + convertLoket(data[5].loket));
      $("#nomor5").text(data[5].loket + data[5].nomorAntri);
      $("#loket6").text("Loket " + convertLoket(data[6].loket));
      $("#nomor6").text(data[6].loket + data[6].nomorAntri);
      $("#loket7").text("Loket " + convertLoket(data[7].loket));
      $("#nomor7").text(data[7].loket + data[7].nomorAntri);
      $("#loket8").text("Loket " + convertLoket(data[8].loket));
      $("#nomor8").text(data[8].loket + data[8].nomorAntri);
    },
  });
}, 2000);

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
