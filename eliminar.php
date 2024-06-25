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
    <link rel="stylesheet" href="./assets/css/eliminar.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once ("barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-crear-producto">
            <form action="" class="form-crear-producto" method="post">
                <strong class="texto">Eliminar producto</strong><br>
                <br>
                <strong class="texto">*elija uno de los dos campos, para identificar la publicacion que desea
                    eliminar*</strong><br>
                <br>
                <label for="" class="contrasenia-actual">Codigo de producto</label><br>
                <input type="text" id="" class="codigo-producto" name="codigo"><br>
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>
        </div>
        <div id="mensaje"></div>
        <div class="contenedor-card-crear-producto">
            <form action="" class="form-crear-producto" method="post">
                <strong class="texto">Eliminar usuario</strong><br>
                <label for="" class="usuario-eliminar">DNI</label><br>
                <input type="text" id="" class="usuario" name="dni"><br>
                <label for="" class="contrasenia-actual">Contraseña</label><br>
                <input type="text" id="" class="codigo-producto" name="contrasenia"><br>
                <label for="" class="contrasenia-actual">Reingrese Contraseña</label><br>
                <input type="text" id="" class="codigo-producto" name="r-contrasenia"><br>
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>
        </div>

    </div>
    <script src="./assets/js/plantilla-alerta-exitosa.js"></script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Función para eliminar producto
        if (!empty($_POST["codigo"])) {
            $dni = $_COOKIE["usuario"];
            $codigo = $_POST["codigo"];
            $url = "http://localhost:4000/inicio/" . $codigo;
            $ci = curl_init();
            curl_setopt($ci, CURLOPT_URL, $url);
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ci);
            if (curl_errno($ci)) {
                echo "Error en cURL: " . curl_error($ci);
            } else {
                $httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
                if ($httpCode == 200) {
                    echo "<script>deleteOK();</script>";
                } else if ($httpCode == 404) {
                    echo "Error al eliminar producto. Producto no encontrado.";
                } else {
                    echo "Error al eliminar producto. Código de respuesta: " . $httpCode;
                }
            }
            curl_close($ci);
        } else if (!empty($_POST["dni"]) && !empty($_POST["contrasenia"]) && !empty($_POST["r-contrasenia"])) {
            $contrasenia = $_POST["contrasenia"];
            $rcontrasenia = $_POST["r-contrasenia"];
            if ($contrasenia === $rcontrasenia) {
                $dni = $_COOKIE["usuario"];
                eliminarUsuario($dni);
            } else {
                echo "Las contraseñas no coinciden.";
            }
        }

        // Función para eliminar usuario
        function eliminarUsuario($dni)
        {
            $url = "http://localhost:4000/eliminacion/" . urlencode($dni);
            $ci = curl_init();
            curl_setopt($ci, CURLOPT_URL, $url);
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ci);
            if (curl_errno($ci)) {
                echo "Error en cURL: " . curl_error($ci);
            } else {
                $httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
                if ($httpCode == 200) {
                    echo "<script>deleteOK();</script>";
                } else if ($httpCode == 404) {
                    echo "Error al eliminar usuario. Usuario no encontrado.";
                } else {
                    echo "Error al eliminar usuario. Código de respuesta: " . $httpCode;
                }
            }
            curl_close($ci);
        }
        ;
    }

    ?>

</body>
<?php require_once ("footer.php"); ?>
<script src="./assets/js/barra-lateral.js"></script>


</html>