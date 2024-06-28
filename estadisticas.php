<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina-Productos</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="./assets/css/maicons.css">

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/mobster.css">

    <link rel="stylesheet" href="./assets/css/productos.css">
    <link rel="stylesheet" href="./assets/css/barra-lateral-usuario.css">
    <link rel="stylesheet" href="./assets/css/estadisticas.css">
</head>
<?php
$cu = curl_init();
$dni = $_COOKIE["usuario"];
$url = "https://api-8cf6.onrender.com/ventas/" . $dni;
curl_setopt($cu, CURLOPT_URL, $url);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$respuesta = json_encode(curl_exec($cu));

if (curl_errno($cu)) {
    $mensaje_error = curl_error($ci);

} else {

    curl_close($cu);
}
; ?>

<body>
    <div class="backgaund-imagen" style="background-image: url(./assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once ("barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-productos">
            <div class="col justify-content-center mt-5">
                <!-- CARDS DE PRODUCTOS -->
                <?php echo "<script> var datosJson=$respuesta;</script>"; ?>

                <div class="ventas-recaudacion">
                    <p><strong>Recaudacion de ventas.</strong></p>
                    <canvas id="migrafica" width="300" height="100"></canvas>
                </div>
                <div class="ventas-mes">
                    <p><strong>Ventas del Mes(Unidades).</strong></p>
                    <canvas id="recaudacion" width="500" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

</body>
<?php require_once ("footer.php"); ?>
<script src="./assets/js/barra-lateral.js"></script>
<script type="module" src="../assets/js/estadisticas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</html>