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
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_COOKIE['code'])) {
                        $productoID = $_COOKIE['code'];
                        agregarProductoACookie($productoID); // Agregar producto a la cookie 'carrito'
                        unset($_COOKIE['code']); // Eliminar la cookie 'code' después de usarla
                        setcookie('code', '', time() - 3600, '/');
                    }

                    function agregarProductoACookie($nuevoProducto)
                    {
                        $nombreCookie = "carrito";
                        $duracion = time() + 3600; // 1 hora
                    
                        // Verificar si la cookie ya existe
                        if (isset($_COOKIE[$nombreCookie])) {
                            // Obtener los productos actuales de la cookie
                            $productosActuales = $_COOKIE[$nombreCookie];
                            $productosActualesArray = explode(",", $productosActuales);

                            // Asegurarse de que el nuevo producto no esté vacío y no sea un duplicado
                            $nuevoProducto = trim($nuevoProducto);
                            if (!empty($nuevoProducto) && !in_array($nuevoProducto, $productosActualesArray)) {
                                // Agregar el nuevo producto a la lista
                                $productosActualesArray[] = $nuevoProducto;
                            }

                            // Convertir la lista de nuevo a una cadena y establecer la cookie
                            $productosActualesActualizados = implode(",", $productosActualesArray);
                            setcookie($nombreCookie, $productosActualesActualizados, $duracion, "/");
                        } else {
                            // Si la cookie no existe, simplemente agregar el nuevo producto
                            setcookie($nombreCookie, trim($nuevoProducto), $duracion, "/");
                        }
                    }
                    ?>

                    <div class="wow fadeInUp">

                        <?php
                        $total = 0;

                        if (isset($_COOKIE["carrito"]) && !empty($_COOKIE["carrito"])) {
                            $items = trim($_COOKIE["carrito"]);
                            $separador = ",";
                            $separada = array_filter(explode($separador, $items), function ($item) {
                                return !empty(trim($item));
                            });

                            foreach ($separada as $item) {
                                $ci = curl_init();
                                $url = "http://localhost:4000/inicio/respuesta/" . trim($item);
                                curl_setopt($ci, CURLOPT_URL, $url);
                                curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
                                $respuesta = curl_exec($ci);
                                $Jsondata = json_decode($respuesta);

                                if (curl_errno($ci)) {
                                    $mensaje_error = curl_error($ci);
                                } else {
                                    curl_close($ci);
                                }

                                if ($Jsondata) {
                                    foreach ($Jsondata as $valor) {
                                        $total += floatval($valor->precio);
                                        ?>
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4 contenedor-foto-nombre">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                                <h5 class="fg-gray nombre-producto" id="nombre-producto">
                                    <?php echo $valor->producto; ?>
                                </h5>
                            </div>
                            <p id="id-producto" class="id-producto">codigo de producto:<br>
                                <?php echo $valor->codigo; ?>
                            </p>
                            <p id="precio" class="precio-producto">Precio:<br> $<?php echo $valor->precio; ?> c/m</p>
                            <button id="<?php echo $valor->codigo; ?>" type="button" class="btn-borar-producto">
                                <img src="../assets/img/icons/icono-borrar.ico" alt="eliminar" class="img-eliminar"
                                    id="<?php echo $valor->codigo; ?>">
                            </button>
                        </div>
                        <?php
                                    }
                                }
                            }
                        } else {
                            echo '<section class="about full-screen d-lg-flex justify-content-center align-items-center" id="section-carrito">
                            <div class="div-carrito" id="div-carro">
                                <img src="../assets/img/bolsa-de-compras.png" alt="imagen bolsa de compras" class="bolsa-de-compras" />
                                <div class="contenedor-descubrir-productos">
                                    <b>¡Empieza a cargar tu carrito de compras! </b><br />
                                    Sumá productos a tu carrito
                                    <a href="productos.php" class="descubrir-productos">Descubrir Productos</a>
                                </div>
                            </div>
                            </section>';
                        }
                        ?>
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