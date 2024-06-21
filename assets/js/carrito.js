var contador = 0;
var arreglo = [];

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

  // Para verificación en consola
}
const btn = document.querySelector(".agregar-carrito");
btn.addEventListener("click", (e) => {
  console.log(e.target.id);
  agregarProductoACarrito(e.target.id);
});
