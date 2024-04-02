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
    <link rel="stylesheet" href="../assets/css/eliminar.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once ("./barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-crear-producto">
            <form action="" class="form-crear-producto" method="post">
                <strong class="texto">Eliminar producto</strong><br>
                <br>
                <strong class="texto">*elija uno de los dos campos, para identificar la publicacion que desea
                    eliminar*</strong><br>
                <br>
                <label for="" class="contrasenia-actual">Codigo de producto</label><br>
                <input type="text" id="" class="codigo-producto" name="codigo"><br>
                <button type="" class="btn-eliminar">Eliminar</button>
            </form>
        </div>
        <div class="contenedor-card-crear-producto">
            <form action="" class="form-crear-producto" method="post">
                <strong class="texto">Eliminar usuario</strong><br>
                <label for="" class="usuario-eliminar">DNI</label><br>
                <input type="text" id="" class="usuario"><br>
                <label for="" class="contrasenia-actual">Contraseña</label><br>
                <input type="text" id="" class="codigo-producto"><br>
                <label for="" class="contrasenia-actual">Reingrese Contraseña</label><br>
                <input type="text" id="" class="codigo-producto"><br>
                <button type="" class="btn-eliminar">Eliminar</button>
            </form>
        </div>
    </div>

    <?php

    if ($_POST) {
        $ci = curl_init();
        $dni = $_COOKIE["usuario"];
        $codigo = $_POST["codigo"];
        $url = "http://localhost:4000/inicio/eliminar/" . $codigo . "/" . $dni;
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

        $exe = curl_exec($ci);
        if (curl_errno($ci)) {
            $mensaje_error = curl_error($ci);
        } else {

            $datosUsuario = json_decode($exe, true);
            curl_close($ci);
        }
        ;
    }
    ?>
</body>
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>

</html>