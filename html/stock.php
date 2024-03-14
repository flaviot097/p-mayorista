<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina-Productos</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/css/mobster.css">

    <link rel="stylesheet" href="../assets/css/productos.css">
    <link rel="stylesheet" href="../assets/css/barra-lateral-usuario.css">
    <link rel="stylesheet" href="../assets/css/stock.css">
</head>

<?php $ci = curl_init();
$dni = $_COOKIE["usuario"];
$url = "http://localhost:4000/documento/" . $dni;

curl_setopt($ci, CURLOPT_URL, $url);

curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($ci);

if (curl_errno($ci)) {
    $mensaje_error = curl_error($ci);
} else {
    curl_close($ci);

}
; ?>

<?php echo "<script> var datosProductos=$respuesta</script>"; ?>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once("./barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-productos">
            <div class="col justify-content-center mt-5">
                <button id="btnFiltrar-menor">Ordenar por stock</button>
                <!-- CARDS DE PRODUCTOS -->
                <div class="productos-stock">

                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>
<script src="../assets/js/cartas-prod-stock.js"></script>
<script src="../assets/js/filtro-stock.js"></script>

</html>