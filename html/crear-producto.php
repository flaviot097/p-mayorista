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

        <div class="contenedor-card-crear-producto" id="mensaje">
            <form class="form-crear-producto" method="get">
                <label for="" class="nombre-producto">Nombre del producto</label><br>
                <input type="text" id="" class="producto" name="producto"><br>
                <label for="" class="codigo-actual">Codigo de producto</label><br>
                <input type="text" class="codigo-actual" id="" name="codigo"><br>
                <label for="" class="precio"></label>Precio<br>
                <input type="text" class="precio" id="" name="precio"><br>
                <label for="" class="stock">DNI del publicante</label><br>
                <input type="text" class="dni" id="" name="dni"><br>
                <label for="" class="stock">Stock</label><br>
                <input type="text" class="stock" id="" name="stock"><br>
                <label for="" class="descripcion">Descripcion</label><br>
                <textarea name="descripcion" id="descripcion" cols="23" rows="8"></textarea><br>

                <button type="" class="btn-actualizar">Actualizar</button>
            </form>
        </div>
    </div>


</body>
<script src="../assets/js/barra-lateral.js"></script>
<script src="../assets/js/mensajes.js"></script>
<script src="../assets/js/plantilla-alerta-exitosa.js"></script>
<?php if ($_GET) {
    if ($_GET["producto"] !== "" && $_GET["codigo"] !== "" && $_GET["precio"] !== "" && $_GET["stock"] !== "" && $_GET["descripcion"] !== "" && $_GET["dni"] !== "") {
        $arreglo = array(
            "producto" => $_GET['producto'],
            "codigo" => $_GET['codigo'],
            "precio" => $_GET['precio'],
            "stock" => $_GET['stock'],
            "descripcion" => $_GET['descripcion'],
            "dni" => $_GET['dni']
        );
    }
    ;
    $datosProductos = json_encode($arreglo);
    $url = "http://localhost:4000/inicio";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $datosProductos);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array(


            'Content-Type: application/json',


            'Content-Length: ' . strlen($datosProductos)
        )
    );

    $resultado = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
    } else {
        echo "<script> mensajeProductosExito();</script>";


    }
    ;
    curl_close($curl);




}
; ?>

<?php require_once("./footer.php"); ?>

</html>