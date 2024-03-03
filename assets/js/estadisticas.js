console.log(datosJson[0].codigo);
//console.log(datosJson);
var subtotal = 0;

var renero = 0;
var rfebrero = 0;
var rmarzo = 0;
var rabril = 0;
var rmayo = 0;
var rjunio = 0;
var rjulio = 0;
var ragosto = 0;
var rseptiembre = 0;
var rnoviembre = 0;
var roctubre = 0;
var rdiciembre = 0;

datosJson.forEach((e) => {
  subtotal = subtotal + e.total;
  let fechaVentas = e.fecha.slice(5, 7);

  switch (parseInt(fechaVentas)) {
    case 1:
      renero = renero + e.total;
      break;
    case 2:
      rfebrero = rfebrero + e.total;
      break;
    case 3:
      rmarzo = rmarzo + e.total;
      console.log(rmarzo);
      break;
    case 4:
      rabril = rabril + e.total;
      break;
    case 5:
      rmayo = rmayo + e.total;
      break;
    case 6:
      rjunio = rjunio + e.total;
      break;
    case 7:
      rjulio = rjulio + e.total;
      break;
    case 8:
      ragosto = ragosto + e.total;
    case 9:
      rseptiembre = rseptiembre + e.total;
      break;
    case 10:
      roctubre = roctubre + e.total;
      break;
    case 11:
      rnoviembre = rnoviembre + e.total;
      break;
    case 12:
      rdiciembre = rdiciembre + e.total;
      break;
  }
});

//graficar estadisticas
const graficaVentas = document.querySelector("#migrafica").getContext("2d");
new Chart(graficaVentas, {
  type: "bar", //tipo de gráfica
  data: {
    labels: [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octibre",
      "Noviembre",
      "Diciembre",
    ],
    datasets: [
      {
        label: `En el año:$${subtotal}`,
        data: [
          renero,
          rfebrero,
          rmarzo,
          rabril,
          rmayo,
          rjunio,
          rjulio,
          ragosto,
          rseptiembre,
          roctubre,
          rnoviembre,
          rdiciembre,
        ],
        backgroundColor: "black",
      },
    ],
  },
  options: {
    scales: {
      y: { beginAtZero: false },
    },
  },
});
