var contador = 0;
var dataFilter; // Asegúrate de tener tus datos iniciales aquí

// Función para obtener el valor de una cookie por nombre
function getCookie(name) {
  let cookieArr = document.cookie.split(";");
  for (let i = 0; i < cookieArr.length; i++) {
    let cookiePair = cookieArr[i].split("=");
    if (name == cookiePair[0].trim()) {
      return decodeURIComponent(cookiePair[1]);
    }
  }
  return null;
}

// Función para agregar producto a la cookie carrito
function agregarProductoACarrito(imputvalue) {
  let carritoCookie = getCookie("carrito");
  let arreglo = carritoCookie ? carritoCookie.split(",") : [];

  // Asegurarse de que el nuevo producto no esté ya en el carrito
  if (!arreglo.includes(imputvalue)) {
    arreglo.push(imputvalue);
  }
  // Actualizar la cookie
  document.cookie = `carrito=${arreglo.join(",")};max-age=3600;`;
}

async function renderCards(productos) {
  for (const jsonDatos of productos) {
    let imagenBase64 = "../../uploads/1718691069537.jpg"; // Ruta a una imagen predeterminada

    if (jsonDatos.imagen && jsonDatos.imagen.data) {
      // Convertir los datos de imagen a Base64
      imagenBase64 = await bufferToBase64(jsonDatos.imagen.data);
    } else {
      // Manejo si no hay imagen disponible
      console.error(
        `No hay datos de imagen para el producto ${jsonDatos.codigo}`
      );
    }

    const containerCards = `
      <div loading="lazy" class="wow fadeInUp" id="${jsonDatos.codigo}">
        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
          <form method="post" class="form-action-redirection" action="https://p-mayorista.onrender.com/producto.php" id="${jsonDatos.codigo}" value="${jsonDatos.codigo}">
            <input class="input-disabled" type="text" name="code" value="${jsonDatos.codigo}">
            <div class="svg-icon mx-auto mb-4">
              <img loading="lazy" src="${imagenBase64}" alt="" class="img-productos" id="${jsonDatos.codigo}">
            </div>
            <h5 class="fg-gray nombre-producto" id="${jsonDatos.codigo}">${jsonDatos.producto}</h5>
            <p id="${jsonDatos.codigo}" class="id-producto">Código de producto: ${jsonDatos.codigo}</p>
            <p class="fs-small" id="${jsonDatos.codigo}">${jsonDatos.descripcion}</p>
            <p id="${jsonDatos.codigo}" class="proveedor">Proveedor: ${jsonDatos.distribuidora}</p>
            <h6 id="${jsonDatos.codigo}" class="precio-producto">Precio: $${jsonDatos.precio} c/u</h6>
          </form>
          <button id="${jsonDatos.codigo}" class="btn-agregar-carrito">
            <img width="32" height="30" src="https://img.icons8.com/pastel-glyph/64/FFFFFF/shopping-trolley--v2.png" alt="shopping-trolley--v2" />
          </button>
        </div>
      </div>`;
    const divCard = document.querySelector(".col-lg.contenedor-cartas");
    divCard.innerHTML += containerCards;
  }

  // Añadir eventos después de crear las tarjetas
  addEventListeners();
}

async function bufferToBase64(buffer) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onloadend = () => resolve(reader.result.split(",")[1]);
    reader.onerror = reject;
    reader.readAsDataURL(new Blob([buffer]));
  });
}

async function reproducirCard() {
  const nuevosProductos = dataFilter.slice(contador, contador + 8);
  renderCards(nuevosProductos);
  contador += 8; // Actualizar el contador
}

async function cardsonload() {
  const productosIniciales = dataFilter.slice(contador, contador + 8);
  renderCards(productosIniciales);
  contador += 8; // Actualizar el contador
}

function addEventListeners() {
  const redirec = document.querySelectorAll(".form-action-redirection");
  const btnAgregarcarrito = document.querySelectorAll(".btn-agregar-carrito");

  redirec.forEach((element) => {
    element.addEventListener("click", (e) => {
      const imputvalue = e.target.id;
      document.cookie = "code=" + imputvalue + ";max-age=3600;";
      document.location = "https://p-mayorista.onrender.com/producto.php";
    });
  });

  btnAgregarcarrito.forEach((element) => {
    element.addEventListener("click", (e) => {
      const imputvalue = e.target.id;
      agregarProductoACarrito(imputvalue);
    });
  });
}

////scroll infinito
const btnFiltrado = document.querySelector(".btn.btn-primary.filtrar");

function cargarDivs() {
  const { clientHeight, scrollHeight, scrollTop } = document.documentElement;
  if (
    scrollTop + clientHeight >= scrollHeight - 1 &&
    dataFilter.length > contador
  ) {
    setTimeout(reproducirCard, 100);
  }
}

window.addEventListener("load", function () {
  cardsonload();
});

window.addEventListener("scroll", () => {
  const noCoincide = document.querySelector("p.letras-no-coincide");
  const lanzarFiltrado = document.querySelector("#filtrado-exitoso");

  if (noCoincide) {
    console.log("no coincide");
  } else if (lanzarFiltrado) {
    console.log("es distinto de 0");
  } else {
    cargarDivs();
  }
});
