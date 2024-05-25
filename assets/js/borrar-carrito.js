const ruta =
  "http://localhost/proyecto-pagina-mayorista/pagina/html/carrito.php";
const btnBorrar = document.querySelectorAll(".img-eliminar");
btnBorrar.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const code = e.target.id;
    const res = document.cookie.split("; ").map((e) => e.split("="));
    console.log(res);
    res.forEach((elemento) => {
      if (elemento[0] == "carrito") {
        console.log(elemento[1]);
        const filtrado = elemento[1];
        const array = filtrado.split(",");
        const resultado = array.filter((cod) => cod != `${code}`);
        console.log(resultado);
        document.cookie = `carrito=` + resultado + ";max-age=3600;";
        window.location.href = ruta;
        document.cookie = `pedido=` + resultado + ";max-age=3600;";
      }
    });
  });
});
