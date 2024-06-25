<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="./assets/css/maicons.css">

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/mobster.css">

    <link rel="stylesheet" href="./assets/css/crear-usuario.css">
</head>
<?php

if ($_POST) {
    if ($_POST['usuario'] !== null || $_POST['usuario'] !== "" && $_POST['password'] !== null || $_POST['password'] !== "") {
        $dni = $_POST['usuario'];
        $pass = $_POST['password'];
        $nombre_usuario = $_POST["nombre_usuario"];
        $nombre_y_apellido = $_POST["nombre_y_apellido"];
        $razon_social = $_POST["razon_social"];
        $distribuidora = $_POST["distribuidora"];
        $email = $_POST["mail"];

        $url = "http://localhost:4000/creacion";

        $array = array(
            'dni' => $dni,
            'usuario' => $nombre_usuario,
            'contrasenia' => $pass,
            'nombre_y_apellido' => $nombre_y_apellido,
            'razon_social' => $razon_social,
            'distribuidora' => $distribuidora,
            'email' => $email
        );
        $data_string = json_encode($array);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(


                'Content-Type: application/json',


                'Content-Length: ' . strlen($data_string)
            )
        );

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            echo "<script> alert('usuario creado con exito');</script>";


        }
        ;
        curl_close($ch);

    }
    ;
}
;



?>

<body>
    <div class="backgaund-imagen" style="background-image: url(./assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <div class="iniciar-session">
            <div class="container-formulario-iniciar-sesion">
                <form method="Post" class="formulario-iniciar-sesion">
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
                    <label for="" class="contrasenia-label-iniciar-session">Email</label>
                    <input class="contrasenia-iniciar-session" name="mail" type="mail"></input>
                    <button type="submit" class="btn-iniciar-session">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>

</body>
<?php require_once ("footer.php"); ?>
<script src="./assets/js/mensajes.js"></script>

</html>