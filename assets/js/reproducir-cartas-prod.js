var contador = 0;
function reproducirCard() {
  dataFilter.forEach((jsonDatos) => {
    contador = contador + 1;
    const containerCards = `<div loading="lazy" class="wow fadeInUp" id="${jsonDatos.codigo}">
                            <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                              <form method="post" class="form-action-redirection" action="http://localhost/proyecto-pagina-mayorista/pagina/html/producto.php" id="${jsonDatos.codigo}" value="${jsonDatos.codigo}">
                              <input class="input-disabled" type="text" name="code">
                                <div class="svg-icon mx-auto mb-4">
                                  <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos" id="${jsonDatos.codigo}">
                                </div>
                                <h5 class="fg-gray nombre-producto" id="${jsonDatos.codigo}">${jsonDatos.producto}</h5>
                                <p id="${jsonDatos.codigo}" class="id-producto">codigo de producto:${jsonDatos.codigo} </p>
                                <p class="fs-small" id="${jsonDatos.codigo}">${jsonDatos.descripcion}.
                                <p id="${jsonDatos.codigo}" class="proveedor"> Proveedor: ${jsonDatos.distribuidora}.</p>
                                <h6 id="${jsonDatos.codigo}" class="precio-producto">Precio: $${jsonDatos.precio} c/u</h6>
                                </p>
                                <button type="submit" class="btn-ver-producto">Ver Producto
                                </button>
                              </form>
                              <button class="btn-agregar-carrito"><img width="32" height="30"
                                  src="https://img.icons8.com/pastel-glyph/64/FFFFFF/shopping-trolley--v2.png"
                                  alt="shopping-trolley--v2" />
                              </button>
                            </div>
                          </div>`;
    const divCard = document.querySelector(".col-lg.contenedor-cartas");

    divCard.innerHTML += containerCards;

    const redirec = document.querySelectorAll(".form-action-redirection");

    redirec.forEach((element) => {
      element.addEventListener("click", (e) => {
        const imputvalue = e.target.id;
        console.log(imputvalue);
        document.cookie = "code=" + imputvalue + ";max-age=3600;";
        document.location =
          "http://localhost/proyecto-pagina-mayorista/pagina/html/producto.php";
      });
    });

    //
  });
}

////scroll infinito
const btnFiltrado = document.querySelector(".btn.btn-primary.filtrar");
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
  const lanzarFiltrado = document.querySelector("#filtrado-exitoso");

  if (noCoincide) {
    console.log("no ciocide");
  } else if (lanzarFiltrado) {
    console.log("es distinto de 0");
  } else {
    cargarDivs();
    validar = 0;
  }
});

//----------------redireccion a producto en especifico-----------------------------------------
