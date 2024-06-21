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
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("./header.php");

    $ci = curl_init();

    $url = "http://localhost:4000/inicio";

    curl_setopt($ci, CURLOPT_URL, $url);

    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ci);

    if (curl_errno($ci)) {
        $mensaje_error = curl_error($ci);
    } else {
        curl_close($ci);

    }
    ;
    function obtenerProductosPorRangoDePrecios($minPrice, $maxPrice)
    {
        // URL de la API con los parámetros de consulta
        $url = "http://localhost:4000/productos/precio?minPrice=" . urlencode($minPrice) . "&maxPrice=" . urlencode($maxPrice);

        // Inicializar cURL
        $ch = curl_init();

        // Configurar cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutar la solicitud cURL
        $response = curl_exec($ch);

        // Manejar errores
        if ($response === false) {
            echo 'Error en la solicitud cURL: ' . curl_error($ch);
            return;
        }

        // Cerrar cURL
        curl_close($ch);

        // Decodificar la respuesta JSON
        $productos = $response;

        // Verificar si la respuesta es válida
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Error al decodificar JSON: ' . json_last_error_msg();
            return;
        }

        return $productos;
    }


    if ($_GET) {
        if ($_GET["precio-minimo"] && $_GET["precio-maximo"]) {
            $minPrice = $_GET["precio-minimo"];
            $maxPrice = $_GET["precio-maximo"];
            $respuesta = obtenerProductosPorRangoDePrecios($minPrice, $maxPrice);
            // Mostrar los productos obtenidos
            if ($respuesta) {
                echo "<pre>";
                print_r($respuesta);
                echo "</pre>";
            } else {
                echo "No se encontraron productos en el rango de precios especificado.";
            }
        }
    }

    ?>
    <div class="conteiner-cuerpo">
        <div class="contenedor-filtro">
            <form method="GET">
                <div class="form-filtrar-prod">
                    <label for="producto" id="producto-filtro-letras">Producto: </label>
                    <input type="text" id="producto-filtro" class="form-control producto-filtro">
                    <label for="producto" id="distibuidor-filtro-letras">Vendedor:</label>
                    <input type="text" id="distribuidor-filtro" class="form-control">
                    <label for="precio-min" id="producto-filtro-letras">Precio min</label>
                    <input type="text" name="precio-minimo" id="producto-filtro" class="form-control producto-filtro">
                    <label for="producto" id="distibuidor-filtro-letras">Precio mix</label>
                    <input type="text" name="precio-maximo" id="distribuidor-filtro" class="form-control">
                </div>
                <div class="container-btn-filtrar">
                    <button type="button" class="btn btn-primary filtrar">Filtrar
                    </button>
                    <button type="button" id="btn-eliminar-filtros" class=" btn btn-primary filtrar">Eliminar Filtros
                    </button>
                </div>
            </form>
        </div>
        <?php
        echo "<script>var dataFilter=$respuesta;</script>"; ?>



        <div class="contenedor-card-productos">
            <div class="row justify-content-center mt-5">
                <div class="col-lg contenedor-cartas">
                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/reproducir-cartas-prod.js"></script>
<script src="../assets/js/filtrar.js"></script>





</html>