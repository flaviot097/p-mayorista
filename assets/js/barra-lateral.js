const btnStock = document.getElementById("Stock");
const btnFacturacion = document.getElementById("Facturacion");

const btnEstadisticas = document.getElementById("Estadisticas");
const btnEditarUsuario = document.getElementById("Editar-Usuario");

const btnCrearPublicacion = document.getElementById("Crear-Publicacion");

const btnModificarPublicacion = document.getElementById(
  "Modificar-Publicacion"
);
const btnventas = document.getElementById("ventas");

btnCrearPublicacion.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/crear-producto.php";
});

btnEditarUsuario.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/editar-usuario.php";
});

btnEstadisticas.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/estadisticas.php";
});

btnFacturacion.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/facturacion.php";
});

btnStock.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/stock.php";
});
btnModificarPublicacion.addEventListener("click", () => {
  window.location.href =
    "https://p-mayorista.onrender.com/modificar-publicaccion.php";
});
btnventas.addEventListener("click", () => {
  window.location.href = "https://p-mayorista.onrender.com/eliminar.php";
});
