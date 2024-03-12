const divcuerpo = document.querySelector("#mensaje");

const error =
  '<div class="no-coinciden"><p class="letras-no-coincide">Error al actualizar datos de usuario</p></div>';
const divtarjetaExito =
  '<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Actualizacion exitosa</div>';

function mostrarTarjeta() {
  return (divcuerpo.innerHTML += divtarjetaExito);
}

function mostrarerror() {
  return (divcuerpo.innerHTML += error);
}
