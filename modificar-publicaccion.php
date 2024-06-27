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
    <link rel="stylesheet" href="./assets/css/modificar-publicacion.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(./assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once ("barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-editar-usuario">
            <form action="" class="form-crear-usuario">
                <strong class="letra-descripcion">*Rellene los campos que desea cambiar*</strong><br>
                <label for="" class="nombre-actualizar">Nombre del producto</label><br>
                <input type="text" id="" class="usuario" name="nombre-producto"><br>
                <label for="" class="nombre-actualizar">Codigo del producto a cambiar</label><br>
                <input type="text" id="" class="usuario" name="codigo-producto"><br>
                <label for="" class="contrasenia-actual">Nuevo codigo de producto</label><br>
                <input type="text" class="contrasenia-actual" id="" name="nuevo-codigo"><br>
                <label for="" class="contrasenia-actual"></label>Precio<br>
                <input type="text" class="contrasenia-nueva" id="" name="precio"><br>
                <label for="" class="email">Stock</label><br>
                <input type="text" class="mail-nuevo" name="stock" id=""><br>
                <label for="" class="numenro-documento">Descripcion</label><br>
                <input type="text" class="documento" name="descripcion" id=""><br>

                <button type="" class="btn-actualizar">Actualizar</button>
            </form>
            <div id="mensaje"></div>
        </div>

    </div>
    <?php
    if ($_GET) {

        $NuevoNombre = $_GET["nombre-producto"];
        $codigoNuevo = $_GET["nuevo-codigo"];
        $precioN = $_GET["precio"];
        $stockN = $_GET["stock"];
        $descripcionNueva = $_GET["descripcion"];
        $codigo = $_GET['codigo-producto'];



        $url = "https://api-8cf6.onrender.com/actualizar/" . $codigo;

        $array =
            array(
                'producto' => $NuevoNombre,
                'codigo' => $codigoNuevo,
                'precio' => $precioN,
                'descripcion' => $descripcionNueva,
                'stock' => $stockN
            )
        ;



        $arrayFiltrado = array_filter($array, function ($valor) {
            return $valor != "";
        });

        ////patch de datos 
        $data_string = json_encode($arrayFiltrado);

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
            echo '<script src="./assets/js/plantilla-alerta-exitosa.js"></script>';
            echo '<script> mostrarerror();</script>';
        } else {
            echo '<script src="./assets/js/plantilla-alerta-exitosa.js"></script>';
            echo '<script> mostrarTarjeta();</script>';
        }
        ;

        curl_close($ch);
    }
    ?>


</body>
<?php require_once ("footer.php"); ?>
<script src="./assets/js/barra-lateral.js"></script>
<script src="./assets/js/mensajes.js"></script>

</html>