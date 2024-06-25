const btnIniciarSession = document.querySelector(".btn.btn-dark.rounded-pill");

btnIniciarSession.addEventListener("click", () => {
  window.location.href = "http://localhost/pagina/html/session.php";
});

/*btnMenuSession.addEventListener("click", () => {
  window.location.href =
    "http://localhost/proyecto-pagina-mayorista/pagina/html/estadisticas.php";
});*/

///cabmbiar color de seccion seleccionada
switch (window.location.pathname) {
  case "/pagina/html/estadisticas.php":
    const btnEstadistica = document.querySelector(
      ".btn.btn-primary.filtrar.estadisticas"
    );
    btnEstadistica.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/editar-usuario.php":
    const btnEditar = document.getElementById("Editar-Usuario");
    btnEditar.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/facturacion.php":
    const btnFacturacion = document.getElementById("Facturacion");
    btnFacturacion.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/crear-producto.php":
    const btnPublicacion = document.getElementById("Crear-Publicacion");
    btnPublicacion.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/stock.php":
    const btnStock = document.getElementById("Stock");
    btnStock.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/modificar-publicaccion.php":
    const btnModificar = document.getElementById("Modificar-Publicacion");
    btnModificar.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/publicaciones-activas.php":
    const btnpublicaciones = document.getElementById("Publicaciones-Activas");
    btnpublicaciones.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
  case "/pagina/html/eliminar.php":
    const btnEliminar = document.getElementById("ventas");
    btnEliminar.setAttribute(
      "style",
      "background-color:black !important; box-shadow: 4px 4px 16px rgba(29, 29, 24, 0.7);"
    );
    break;
}
