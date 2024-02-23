const imputNombre = document.getElementById("producto-filtro");
const imputDistribuidora = document.getElementById("distribuidor-filtro");
const contenedor = document.querySelector(".col-lg.contenedor-cartas");
const btnFiltrar = document.querySelector(".btn.btn-primary.filtrar");
let coincidencia = 0;
dataFilter;

imputNombre.addEventListener("change", () => {
  btnFiltrar.addEventListener("click", () => {
    contenedor.innerHTML = "";
    let palabraAfiltrar = imputNombre.value;
    dataFilter.forEach((element) => {
      if (palabraAfiltrar === element.producto) {
        const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                    <div class="svg-icon mx-auto mb-4">
                        <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos" id="${element.producto}">
                    </div>
                    <h5 class="fg-gray nombre-producto" id="${element.producto}">${element.producto}</h5>
                    <p id="${element.codigo}" class="id-producto">codigo de producto:${element.codigo} </p>
                    <p class="fs-small">${element.descripcion}.
                    <p id="${element.distribuidora}" class="proveedor"> Proveedor: ${element.distribuidora}.</p>
                    <h6 id="${element.precio}" class="precio-producto">Precio: $${element.precio} c/u</h6>
                    </p>
                    </div>
                    </div>`;
        contenedor.innerHTML += divs;
        coincidencia = coincidencia + 1;
        console.log("coincide");
      } else {
        if (coincidencia === 0) {
          const fltroPoducto = document.querySelector("#producto-filtro");
          const filtroproveedor = document.querySelector(
            "#distribuidor-filtro"
          );
          filtroproveedor.setAttribute("style", "width: 98% !important;");
          fltroPoducto.setAttribute("style", "width: 98% !important;");
          const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide"> No se encontraron resultados de "${palabraAfiltrar}"❌</p></div>`;
          contenedor.innerHTML = divNocoincidencia;
        }
      }
    });
  });
});
/// filtrar por proveedor
imputDistribuidora.addEventListener("change", () => {
  btnFiltrar.addEventListener("click", () => {
    contenedor.innerHTML = "";
    distribuidorFiltrar = imputDistribuidora.value;
    dataFilter.forEach((element) => {
      if (distribuidorFiltrar === element.distribuidora) {
        const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                    <div class="svg-icon mx-auto mb-4">
                        <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos" id="${element.producto}">
                    </div>
                    <h5 class="fg-gray nombre-producto" id="${element.producto}">${element.producto}</h5>
                    <p id="${element.codigo}" class="id-producto">codigo de producto:${element.codigo} </p>
                    <p class="fs-small">${element.descripcion}.
                    <p id="${element.distribuidora}" class="proveedor"> Proveedor: ${element.distribuidora}.</p>
                    <h6 id="${element.precio}" class="precio-producto">Precio: $${element.precio} c/u</h6>
                    </p>
                    </div>
                    </div>`;
        contenedor.innerHTML += divs;
        coincidencia = coincidencia + 1;
        console.log("coincide");
      } else {
        if (coincidencia === 0) {
          const fltroPoducto = document.querySelector("#producto-filtro");
          const filtroproveedor = document.querySelector(
            "#distribuidor-filtro"
          );
          filtroproveedor.setAttribute("style", "width: 98% !important;");
          fltroPoducto.setAttribute("style", "width: 98% !important;");
          const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide"> No se encontraron resultados de "${distribuidorFiltrar}"❌</p></div>`;
          contenedor.innerHTML = divNocoincidencia;
        }
      }
    });
  });
});
///filtro  por proveedores o productos

(imputNombre || imputDistribuidora).addEventListener("change", () => {
  btnFiltrar.addEventListener("click", () => {
    contenedor.innerHTML = "";
    palabraAfiltrar = imputNombre.value;
    distribuidorFiltrar = imputDistribuidora.value;
    dataFilter.forEach((element) => {
      if (
        palabraAfiltrar === element.distribuidora &&
        distribuidorFiltrar === element.distribuidora
      ) {
        const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                    <div class="svg-icon mx-auto mb-4">
                        <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos" id="${element.producto}">
                    </div>
                    <h5 class="fg-gray nombre-producto" id="${element.producto}">${element.producto}</h5>
                    <p id="${element.codigo}" class="id-producto">codigo de producto:${element.codigo} </p>
                    <p class="fs-small">${element.descripcion}.
                    <p id="${element.distribuidora}" class="proveedor"> Proveedor: ${element.distribuidora}.</p>
                    <h6 id="${element.precio}" class="precio-producto">Precio: $${element.precio} c/u</h6>
                    </p>
                    </div>
                    </div>`;
        contenedor.innerHTML += divs;
        coincidencia = coincidencia + 1;
        console.log("coincide");
      } else {
        if (coincidencia === 0) {
          const fltroPoducto = document.querySelector("#producto-filtro");
          const filtroproveedor = document.querySelector(
            "#distribuidor-filtro"
          );
          filtroproveedor.setAttribute("style", "width: 98% !important;");
          fltroPoducto.setAttribute("style", "width: 98% !important;");
          const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide"> No se encontraron resultados de "${palabraAfiltrar}" o "${distribuidorFiltrar}"❌</p></div>`;
          contenedor.innerHTML = divNocoincidencia;
        }
      }
    });
  });
});
