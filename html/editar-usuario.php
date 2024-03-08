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
    <link rel="stylesheet" href="../assets/css/editar-usuario.css">
</head>
<?php
if ($_GET) {

    $usuarioNuevo = $_GET["usuario-nuevo"];
    $contraseniaNueva = $_GET["contrasenia-nueva"];
    $razonSocial = $_GET["razon-social"];
    $email = $_GET["mail"];
    $dniNuevo = $_GET["numero-documento"];
    $Nombre = $_GET["nombre_apellido"];


    $dni = $_COOKIE['usuario'];

    $url = "http://localhost:4000/usuarioactualizar/" . $dni;

    $array =
        array(
            'dni' => $dniNuevo,
            'usuario' => urlencode($usuarioNuevo),
            'contrasenia' => $contraseniaNueva,
            'email' => $email,
            'razon_social' => $razonSocial,
            'nombre_y_apellido' => $Nombre
        )
    ;


    foreach ($array as $key => $valor) {
        if ($valor !== false && $valor !== null && $valor !== 1 && $valor !== '') {
            $arrayFiltrado[$key] = $valor;
        }
    }
    echo json_encode($arrayFiltrado);





    /*$data_string = json_encode($arrayFiltrado);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");

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
        echo "<script> alert('se actualizo con exito') </script>";
    }
    ;


    curl_close($ch);*/
}
?>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once("./barra-lateral-usuario.php");
        ?>

        <div class="contenedor-card-editar-usuario">
            <form class="form-crear-usuario" method="get">
                <label for="" class="nombre-actualizar">Ususario</label><br>
                <input type="text" id="" class="usuario" name="usuario-nuevo"><br>
                <label for="" class="nombre-actualizar">Nombre y apellido</label>
                <input type="text" id="" class="usuario" name="nombre_apellido"><br>
                <label for="" class="contrasenia-actual">Razon sosial</label><br>
                <input type="text" class="contrasenia-actual" name="razon-social" id=""><br>
                <label for="" class="contrasenia-actual">Contrasenia nueva</label><br>
                <input type="text" class="contrasenia-nueva" name="contrasenia-nueva" id=""><br>
                <label for="" class="email">Email</label><br>
                <input type="text" class="mail-nuevo" name="mail" id=""><br>
                <label for="" class="numenro-documento">Numero de documento</label><br>
                <input type="text" class="documento" name="numero-documento" id=""><br>
                <button type="" class="btn-actualizar">Actualizar</button>
            </form>
        </div>
    </div>


</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>

</html>