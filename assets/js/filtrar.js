const imputNombre = document.getElementById("producto-filtro");
const imputDistribuidora = document.getElementById("distribuidor-filtro");
const contenedor = document.querySelector(".col-lg.contenedor-cartas");
const btnFiltrar = document.querySelector(".btn.btn-primary.filtrar");
let coincidencia = 0;

imputNombre.addEventListener("change", () => {
  btnFiltrar.addEventListener("click", () => {
    contenedor.innerHTML = "";
    let palabraAfiltrar = imputNombre.value;
    dataFilter.forEach((element) => {
      if (palabraAfiltrar == element.producto) {
        const imagePath = `http://localhost/proyecto-pagina-mayorista/pagina/uploads/${element.imagen}`;
        const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                    <div class="svg-icon mx-auto mb-4">
                        <img loading="lazy" src="${imagePath}" alt="" class="img-productos" id="${element.producto}">
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
        console.log(coincidencia);
      }
    });
    if (coincidencia === 0) {
      console.log("ssadsad");
      const fltroPoducto = document.querySelector("#producto-filtro");
      const filtroproveedor = document.querySelector("#distribuidor-filtro");
      filtroproveedor.setAttribute("style", "width: 98% !important;");
      fltroPoducto.setAttribute("style", "width: 98% !important;");
      const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide"> No se encontraron resultados de "${palabraAfiltrar}"❌</p></div>`;
      contenedor.innerHTML = divNocoincidencia;
      btnFiltrar.style.display = "none";
    } else {
      const filtradoExitoso = `<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Filtrado exitoso</div>`;
      contenedor.innerHTML += filtradoExitoso;
      btnFiltrar.style.display = "none";
    }
  });
});
/// filtrar por proveedor
imputDistribuidora.addEventListener("change", () => {
  btnFiltrar.addEventListener("click", () => {
    contenedor.innerHTML = "";
    let distribuidorFiltrar = imputDistribuidora.value;
    dataFilter.forEach((element) => {
      if (distribuidorFiltrar === element.distribuidora) {
        const imagePath = `http://localhost/proyecto-pagina-mayorista/pagina/uploads/${element.imagen}`;
        const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                    <div class="svg-icon mx-auto mb-4">
                        <img loading="lazy" src="${imagePath}" alt="" class="img-productos" id="${element.producto}">
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
      }
    });
    if (coincidencia === 0) {
      console.log("ssadsad");
      const fltroPoducto = document.querySelector("#producto-filtro");
      const filtroproveedor = document.querySelector("#distribuidor-filtro");
      filtroproveedor.setAttribute("style", "width: 98% !important;");
      fltroPoducto.setAttribute("style", "width: 98% !important;");
      const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide"> No se encontraron resultados de "${palabraAfiltrar}"❌</p></div>`;
      contenedor.innerHTML = divNocoincidencia;
      btnFiltrar.style.display = "none";
    } else {
      const filtradoExitoso = `<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Filtrado exitoso</div>`;
      contenedor.innerHTML += filtradoExitoso;
      btnFiltrar.style.display = "none";
    }
  });
});
///filtro  por proveedores o productos

/// eliminar filtros
const eliminarFiltros = document.querySelector("#btn-eliminar-filtros");

eliminarFiltros.addEventListener("click", () => {
  window.location.reload(true);
});
