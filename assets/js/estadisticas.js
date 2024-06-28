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
////////////////////
var cantidad = 0;
var cenero = 0;
var cfebrero = 0;
var cmarzo = 0;
var cabril = 0;
var cmayo = 0;
var cjunio = 0;
var cjulio = 0;
var cagosto = 0;
var cseptiembre = 0;
var cnoviembre = 0;
var coctubre = 0;
var cdiciembre = 0;

//////////////////////
console.log(JSON.parse(datosJson));
var datosE = JSON.parse(datosJson);
datosE.forEach((e) => {
  subtotal = subtotal + e.total;
  cantidad = cantidad + 1;
  let fechaVentas = e.fecha.slice(5, 7);

  switch (parseInt(fechaVentas)) {
    case 1:
      renero = renero + e.total;
      cenero = cenero + 1;
      break;
    case 2:
      rfebrero = rfebrero + e.total;
      cfebrero = cfebrero + 1;
      break;
    case 3:
      rmarzo = rmarzo + e.total;
      cmarzo = cmarzo + 1;
      break;
    case 4:
      rabril = rabril + e.total;
      cabril = cabril + 1;
      break;
    case 5:
      rmayo = rmayo + e.total;
      cmayo = cmayo + 1;
      break;
    case 6:
      rjunio = rjunio + e.total;
      cjunio = cjunio + 1;
      break;
    case 7:
      rjulio = rjulio + e.total;
      cjulio = cjulio + 1;
      break;
    case 8:
      ragosto = ragosto + e.total;
      cagosto = cagosto + 1;
    case 9:
      rseptiembre = rseptiembre + e.total;
      cseptiembre = cseptiembre + 1;
      break;
    case 10:
      roctubre = roctubre + e.total;
      coctubre = coctubre + 1;
      break;
    case 11:
      rnoviembre = rnoviembre + e.total;
      cnoviembre = cnoviembre + 1;
      break;
    case 12:
      rdiciembre = rdiciembre + e.total;
      cdiciembre = cdiciembre + 1;
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

////ventas de productos por mes

const graficaCantidad = document.querySelector("#recaudacion");
new Chart(graficaCantidad, {
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
        label: `En el año:${cantidad}`,
        data: [
          cenero,
          cfebrero,
          cmarzo,
          cabril,
          cmayo,
          cjunio,
          cjulio,
          cagosto,
          cseptiembre,
          coctubre,
          cnoviembre,
          cdiciembre,
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
