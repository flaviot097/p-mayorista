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

    <link rel="stylesheet" href="../assets/css/crear-usuario.css">
</head>
<?php

if ($_POST) {
    if ($_POST['usuario'] !== null || $_POST['usuario'] !== "" && $_POST['password'] !== null || $_POST['password'] !== "") {
        $dni = $_POST['usuario'];
        $pass = $_POST['password'];

        $ci = curl_init();

        $url = "http://localhost:4000/validacion/dni/" . $dni;

        curl_setopt($ci, CURLOPT_URL, $url);

        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

        $respuesta = curl_exec($ci);

        if (curl_errno($ci)) {
            $mensaje_error = curl_error($ci);

        } else {

            curl_close($ci);
        }
        ;
        $respuestaJson = json_decode($respuesta, true);
        if (!$respuestaJson) {
            echo '<div loading="lazy" class="no-coinciden" >El DNI ingresado es incorrecto o no existe</div>';
        } else if ($respuestaJson[0]["contrasenia"] === $pass) {
            session_start();
            $_SESSION["usuario"] = $respuestaJson[0]["usuario"];


            ///uso de cookies para  guardar el usuario 
            $dnivalido = $respuestaJson[0]["dni"];
            setcookie('usuario', $dnivalido);


            header("Location: estadisticas.php");
        } else {
            echo '<div loading="lazy" class="no-coinciden" >Contraseña incorrecta</div>';
        }
        ;


    }
    ;
}
;



?>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <div class="iniciar-session">
            <div class="container-formulario-iniciar-sesion">
                <form action="" method="Post" class="formulario-iniciar-sesion">
                    <label for="" class="usuario-label-iniciar-session">DNI</label>
                    <input class="usuario-iniciar-session" name="usuario"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Contraseña</label>
                    <input class="contrasenia-iniciar-session" name="password" type="password"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Usuario</label>
                    <input class="contrasenia-iniciar-session" name="nombre_usuario" type="text"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Nombre y Apellido</label>
                    <input class="contrasenia-iniciar-session" name="nombre_y_apellido"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Razon Social</label>
                    <input class="contrasenia-iniciar-session" name="razon_social" placeholder="persona ficica"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Empresa/Distribuidora</label>
                    <input class="contrasenia-iniciar-session" name="distribuidora"></input>
                    <button type="submit" class="btn-iniciar-session">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>

</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/mensajes.js"></script>

</html>