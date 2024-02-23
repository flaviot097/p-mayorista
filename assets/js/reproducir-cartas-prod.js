//console.log(dataFilter);

var contador = 0;
function reproducirCard() {
  dataFilter.forEach((jsonDatos) => {
    contador = contador + 1;
    const containerCards = `<div loading="lazy" class="wow fadeInUp" id="${jsonDatos.codigo}">
                            <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                              <div class="svg-icon mx-auto mb-4">
                                <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos" id="${jsonDatos.producto}">
                              </div>
                              <h5 class="fg-gray nombre-producto" id="${jsonDatos.producto}">${jsonDatos.producto}</h5>
                              <p id="${jsonDatos.codigo}" class="id-producto">codigo de producto:${jsonDatos.codigo} </p>
                              <p class="fs-small">${jsonDatos.descripcion}.
                              <p id="${jsonDatos.distribuidora}" class="proveedor"> Proveedor: ${jsonDatos.distribuidora}.</p>
                              <h6 id="${jsonDatos.precio}" class="precio-producto">Precio: $${jsonDatos.precio} c/u</h6>
                              </p>
                            </div>
                          </div>`;
    const divCard = document.querySelector(".col-lg.contenedor-cartas");

    divCard.innerHTML += containerCards;

    //
  });
}

////scroll infinito

const cantidadCards = document.querySelectorAll(".wow.fadeInUp");
console.log(dataFilter.length);

function cargarDivs() {
  const { clientHeight, scrollHeight, scrollTop } = document.documentElement;

  if (
    scrollTop + clientHeight > scrollHeight - 1 &&
    dataFilter.length > contador
  ) {
    setTimeout(reproducirCard, 100);
  }
}

window.addEventListener("scroll", () => {
  const noCoincide = document.querySelector("p.letras-no-coincide");
  console.log(noCoincide);

  if (noCoincide) {
    console.log("");
  } else {
    cargarDivs();
  }
});

//---------------------------------------------------------
