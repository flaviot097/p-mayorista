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
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
;
$ci = curl_init();
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


    <head>
        <link rel="stylesheet" href="../assets/css/header.css">
    </head>
    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/favicon.png" alt="" width="40" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" id="barra-nav">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php" id="barra-nav">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lugar.php" id="barra-nav">¿De donde somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contacto.php" id="barra-nav">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrito.php" id="barra-nav">Carrito</a>
                    </li>
                </ul>
                <div class="ml-auto my-2 my-lg-0"><?php if (isset($_SESSION["usuario"])) { ?>
                        <a href="./estadisticas.php"> <button class="btn btn-dark rounded-pill usuario-iniciado"
                                id="usuario-logeado"><img class="usuario-iniciado" src="../assets/img/usuario-iniciado.png"
                                    alt="usuario"><?php echo $usuario; ?>
                            </button></a>
                        <a href="./destruir-session.php"><button class="btn btn-dark rounded-pill">Cerrar
                                Sesion</button></a><?php
                } else { ?>


                        <button class="btn btn-dark rounded-pill" id="iniciar-session">Iniciar Sesion</button>
                    </div>
                    <?php
                }
                ; ?>
            </div>
        </div>
    </nav>
    <div class="conteiner-cuerpo">
        <?php require_once ("./barra-lateral-usuario.php"); ?>

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
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>
<script src="../assets/js/cartas-prod-stock.js"></script>
<script src="../assets/js/filtro-stock.js"></script>

</html>