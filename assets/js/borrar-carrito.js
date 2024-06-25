document.addEventListener("DOMContentLoaded", function () {
  const ruta = "http://localhost/pagina/html/carrito.php";
  const btnBorrar = document.querySelectorAll(".img-eliminar");

  btnBorrar.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const code = e.target.id;

      // Obtener y filtrar la cookie 'carrito'
      const res = document.cookie.split("; ").map((e) => e.split("="));
      res.forEach((elemento) => {
        if (elemento[0] === "carrito") {
          const filtrado = elemento[1];
          const array = filtrado.split(",");
          const resultado = array.filter((cod) => cod !== code);

          // Actualizar la cookie 'carrito' con el resultado filtrado
          document.cookie = `carrito=${resultado.join(",")}; max-age=3600;`;
          // Redireccionar a la página del carrito después de eliminar
          window.location.href = ruta;
        }
      });
    });
  });
});
