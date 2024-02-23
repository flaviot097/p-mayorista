const btnStock = document.getElementById("Stock");
const btnFacturacion = document.getElementById("Facturacion");

const btnEstadisticas = document.getElementById("Estadisticas");
const btnEditarUsuario = document.getElementById("Editar-Usuario");

const btnCrearPublicacion = document.getElementById("Crear-Publicacion");
const btnPublicacionesActivas = document.getElementById(
  "Publicaciones-Activas"
);

const btnModificarPublicacion = document.getElementById(
  "Modificar-Publicacion"
);
const btnventas = document.getElementById("ventas");

btnCrearPublicacion.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/crear-producto.php";
});

btnEditarUsuario.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/editar-usuario.php";
});

btnEstadisticas.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/estadisticas.php";
});

btnFacturacion.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/facturacion.php";
});

btnPublicacionesActivas.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/publicaciones-activas.php";
});

btnStock.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/stock.php";
});
btnModificarPublicacion.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/modificar-publicaccion.php";
});
btnventas.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/eliminar.php";
});
