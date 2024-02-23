<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/css/mobster.css">

    <link rel="stylesheet" href="../assets/css/session.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <div class="iniciar-session">
            <div class="container-formulario-iniciar-sesion">
                <form action="" method="get" class="formulario-iniciar-sesion">
                    <label for="" class="usuario-label-iniciar-session">Usuario</label>
                    <input class="usuario-iniciar-session"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Contraseña</label>
                    <input class="contrasenia-iniciar-session"></input>
                    <button type="submit" class="btn-iniciar-session">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>

</body>
<?php require_once("./footer.php"); ?>

</html>