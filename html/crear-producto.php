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
    <link rel="stylesheet" href="../assets/css/crear-producto.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once("./barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-crear-producto">
            <form action="" class="form-crear-producto">
                <label for="" class="nombre-actualizar">Nombre del producto</label><br>
                <input type="text" id="" class="usuario"><br>
                <label for="" class="contrasenia-actual">Codigo de producto</label><br>
                <input type="text" class="contrasenia-actual" id=""><br>
                <label for="" class="contrasenia-actual"></label>Precio<br>
                <input type="text" class="contrasenia-nueva" id=""><br>
                <label for="" class="email">Stock</label><br>
                <input type="text" class="mail-nuevo" id=""><br>
                <label for="" class="numenro-documento">Descripcion</label><br>
                <textarea name="" id="descripcion" cols="23" rows="8"></textarea><br>

                <button type="" class="btn-actualizar">Actualizar</button>
            </form>
        </div>
    </div>


</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>

</html>