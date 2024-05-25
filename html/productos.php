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
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("./header.php");

    $ci = curl_init();

    $url = "http://localhost:4000/inicio";

    curl_setopt($ci, CURLOPT_URL, $url);

    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ci);

    if (curl_errno($ci)) {
        $mensaje_error = curl_error($ci);
    } else {
        curl_close($ci);

    }
    ;

    ?>
    <div class="conteiner-cuerpo">
        <div class="contenedor-filtro">
            <form method="GET">
                <div class="form-filtrar-prod">
                    <label for="producto" id="producto-filtro-letras">Producto: </label>
                    <input type="text" id="producto-filtro" class="form-control producto-filtro">
                    <label for="producto" id="distibuidor-filtro-letras">Vendedor:</label>
                    <input type="text" id="distribuidor-filtro" class="form-control">
                </div>
                <div class="container-btn-filtrar">
                    <button type="button" class="btn btn-primary filtrar">Filtrar
                    </button>
                    <button type="button" id="btn-eliminar-filtros" class=" btn btn-primary filtrar">Eliminar Filtros
                    </button>
                </div>
            </form>
        </div>
        <?php
        echo "<script>var dataFilter=$respuesta;</script>"; ?>



        <div class="contenedor-card-productos">
            <div class="row justify-content-center mt-5">
                <div class="col-lg contenedor-cartas">
                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/reproducir-cartas-prod.js"></script>
<script src="../assets/js/filtrar.js"></script>





</html>