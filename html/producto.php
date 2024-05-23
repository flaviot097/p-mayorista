<!DOCTYPE html>
<html lang="sp">

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
    <link rel="stylesheet" href="../assets/css/producto.css">

</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("./header.php");

    $code = strval($_COOKIE["code"]);

    $ci = curl_init();

    $url = "http://localhost:4000/inicio/respuesta/" . $code;
    curl_setopt($ci, CURLOPT_URL, $url);

    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ci);
    $Jsondata = json_decode($respuesta);

    if (curl_errno($ci)) {
        $mensaje_error = curl_error($ci);
    } else {
        curl_close($ci);

    }
    ;

    ?>

    <div class="contenedor-carta-producto">
        <div class="container-price-sale-img">
            <div class="container-img"><img src="../assets/img/hierro_N12.png" alt="" class="img-producto-seccion">
            </div>
            <div class="sale-price">
                <h2 class="nombre-producto"><?php echo strtoupper($Jsondata[0]->producto); ?></h2>

                <form action="" class="form-sales">
                    <label for="cantidad"><b class="cantidad-text">Cantidad</b></label><br>
                    <input name="cantidad" type="number" value="1" class="cantidad-input"> Unidades <br>
                    <label class="cantidad-stock">articulos en stock: <?php echo $Jsondata[0]->stock; ?></label>
                    <label for="distribuidora" class="id-producto">Distribuidora:
                        <?php echo $Jsondata[0]->distribuidora; ?></label><br>
                    <button type="button" class="btn-venta">Comprar</button>

                </form>
                <button type="button" class="agregar-carrito">Agregar al carrito</button>
            </div>
        </div>
        <div class="decripcion">
            <?php echo $Jsondata[0]->descripcion; ?>
        </div>
    </div>

</body>
<?php require_once ("./footer.php"); ?>


<script src="../assets/js/carrito.js"></script>





</html>