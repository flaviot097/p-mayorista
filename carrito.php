<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/maicons.css">

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/mobster.css">
    <link rel="stylesheet" href="./assets/css/carrito.css">
</head>


<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
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
                        $cantidad = 0;
                        $total = 0;
                        $prodUltimo = "";
                        $codigo_id = array();

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
                                        $cantidad = $cantidad + 1;
                                        $prodUltimo = $valor->producto;
                                        array_push($codigo_id, $valor->codigo);
                                        $total += floatval($valor->precio);
                                        ?>
                                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                                            <div class="svg-icon mx-auto mb-4 contenedor-foto-nombre">
                                                <img src="https://p-mayorista.onrender.com/uploads/<?php echo $valor->imagen; ?>" alt=""
                                                    class="img-productos">
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
                                <img src="./assets/img/bolsa-de-compras.png" alt="imagen bolsa de compras" class="bolsa-de-compras" />
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
                    TOTAL:
                    $<?php echo $total;
                    $_SESSION['datos'] = array('total' => $total, 'cantidad' => $cantidad, "producto" => $prodUltimo); ?>
                </h5>

            </div>
            <div class="contenedor-btn-comprar"><button class="a-comprar">Comprar</button>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Estilo para la div emergente */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.5s;
        }

        .overlay.active {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .popup input[type="email"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .popup button {
            padding: 10px 20px;
            background: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup button:hover {
            background: #218838;
        }
    </style>
</body>

<?php require_once ("footer.php");
if ($_SESSION) {
    $_SESSION['datos'] = array('total' => $total, 'cantidad' => $cantidad, "producto" => $prodUltimo, "id" => $codigo_id);
}
$datos = array('total' => $total, 'cantidad' => $cantidad, "producto" => $prodUltimo, "id" => $codigo_id);


?>
<script>
    const divDoc = document.querySelector(".a-comprar")
    // Muestra la div emergente al cargar la página
    divDoc.addEventListener('click', function () {
        document.getElementById('emailPopup').classList.add('active');
    });

    // Maneja el envío del formulario
    document.getElementById('emailForm').addEventListener('submit', function (event) {
        var email = document.getElementById('email').value;
        if (email == "") {
            event.preventDefault();
        }

    });
</script>
<!-- Div Emergente -->
<div class="overlay" id="emailPopup">
    <div class="popup">
        <h2>Ingrese su Email</h2>
        <form id="emailForm" method="post"
            action="https://p-mayorista.onrender.com/vendor/checkout/server/php/server.php">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>

<script src="./assets/js/borrar-carrito.js"></script>

</html>