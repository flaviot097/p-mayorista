const imputNombre = document.getElementById("producto-filtro");
const inputPrecioMin = document.getElementById("precio-min");
const inputPrecioMax = document.getElementById("precio-max");
const contenedor = document.querySelector(".col-lg.contenedor-cartas");
const btnFiltrar = document.querySelector(".btn.btn-primary.filtrar");
const eliminarFiltros = document.getElementById("btn-eliminar-filtros");
let coincidencia = 0;

function filtrarProductos() {
  contenedor.innerHTML = "";
  coincidencia = 0;

  let palabraAfiltrar = imputNombre.value.trim();
  let precioMin = parseFloat(inputPrecioMin.value);
  let precioMax = parseFloat(inputPrecioMax.value);

  dataFilter.forEach((element) => {
    let matchesNombre =
      palabraAfiltrar === "" || element.producto.includes(palabraAfiltrar);
    let matchesPrecio =
      (isNaN(precioMin) || element.precio >= precioMin) &&
      (isNaN(precioMax) || element.precio <= precioMax);

    if (
      (palabraAfiltrar && matchesNombre && matchesPrecio) ||
      (!palabraAfiltrar && matchesPrecio) ||
      (palabraAfiltrar && matchesNombre && isNaN(precioMin) && isNaN(precioMax))
    ) {
      const imagePath = `http://localhost/proyecto-pagina-mayorista/pagina/uploads/${element.imagen}`;
      const divs = `<div loading="lazy" class="wow fadeInUp" id="${element.codigo}">
                      <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                        <div class="svg-icon mx-auto mb-4">
                          <img loading="lazy" src="${imagePath}" alt="" class="img-productos" id="${element.producto}">
                        </div>
                        <h5 class="fg-gray nombre-producto" id="${element.producto}">${element.producto}</h5>
                        <p id="${element.codigo}" class="id-producto">codigo de producto: ${element.codigo}</p>
                        <p class="fs-small">${element.descripcion}.</p>
                        <p id="${element.distribuidora}" class="proveedor">Proveedor: ${element.distribuidora}.</p>
                        <h6 id="${element.precio}" class="precio-producto">Precio: $${element.precio} c/u</h6>
                      </div>
                    </div>`;
      contenedor.innerHTML += divs;
      coincidencia += 1;
    }
  });

  if (coincidencia === 0) {
    const divNocoincidencia = `<div class="no-coinciden"><p class="letras-no-coincide">No se encontraron resultados para los criterios especificados ❌</p></div>`;
    contenedor.innerHTML = divNocoincidencia;
    btnFiltrar.style.display = "none";
  } else {
    const filtradoExitoso = `<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Filtrado exitoso</div>`;
    contenedor.innerHTML += filtradoExitoso;
    btnFiltrar.style.display = "none";
  }
}

btnFiltrar.addEventListener("click", filtrarProductos);
eliminarFiltros.addEventListener("click", () => {
  window.location.reload(true);
});
