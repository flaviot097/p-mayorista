<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/css/mobster.css">
    <link rel="stylesheet" href="../assets/css/carrito.css">
</head>


<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("./header.php"); ?>
    <div class="contenedor-carrito-y-total">
        <div class="carrito">
            <div class="row justify-content-center mt-5">
                <div class="col-lg contenedor-cartas">
                    <div class=" wow fadeInUp">
                        <?php $items = $_COOKIE["carrito"];
                        $total = 0;
                        $separador = ",";
                        $separada = explode($separador, $items);
                        foreach ($separada as $item) {
                            if ($item != null || $item !== "") {

                                $ci = curl_init();

                                $url = "http://localhost:4000/inicio/respuesta/" . $item;
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




                        <?php foreach ($Jsondata as $valor) {
                                    $total = $total + floatval($valor->precio);
                                    ?>
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4 contenedor-foto-nombre">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                                <h5 class="fg-gray nombre-producto" id="nombre-producto">
                                    <?php echo $valor->producto; ?>
                                </h5>

                            </div>
                            <p id="id-producto" class="id-producto">codigo de producto:<br>
                                <?php echo $valor->codigo; ?></p>
                            <p id="precio" class="precio-producto">Precio:<br> $<?php echo $valor->precio; ?> c/m</p>
                            <button id="<?php echo $valor->codigo; ?>" type="button" class="btn-borar-producto"><img
                                    src="../assets/img/icons/icono-borrar.ico" alt="eliminar" class="img-eliminar"
                                    id="<?php echo $valor->codigo; ?>"></button>
                            </p>
                        </div><?php }
                            }
                        }
                        ; ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="contenedor-conteiners">
            <div class="conteiner-total">

                <h5 class="total-letras-numero">
                    TOTAL: $<?php echo $total; ?>
                </h5>

            </div>
            <div class="contenedor-btn-comprar"><button>Comprar</button></div>
        </div>
    </div>

</body>
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/borrar-carrito.js"></script>

</html>