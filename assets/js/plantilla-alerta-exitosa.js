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

function mensajeProductosExito() {
  const divtarjetaExito =
    '<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Se publico el producto exitosamente</div>';
  return (divcuerpo.innerHTML += divtarjetaExito);
}

function deleteOK() {
  const divtarjetaExito =
    '<div loading="lazy" class="no-coinciden filtrado-exitoso" id="filtrado-exitoso">Se elimino el producto exitosamente</div>';
  return (divcuerpo.innerHTML += divtarjetaExito);
}
