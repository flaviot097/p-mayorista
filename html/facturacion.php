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
    <link rel="stylesheet" href="../assets/css/facturacion.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once("./barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-facturacion-afip">
            <form action="" class="form-facturacion">
                <label for="" class="nombre-a-facturar">Nombre empresa o persona ficica:</label>
                <input type="text" id="a-facturar" class="a-facturar"><br>
                <label for="" class="monto-facturar">Monto</label><br>
                <strong>$</strong><input type="number" class="monto" id="monto-producto"><br>
                <button type="" class="btn-facturar">Facturar</button>
            </form>
        </div>
    </div>


</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>

</html>