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

    ?>
    <div class="conteiner-cuerpo">
        <div class="contenedor-filtro">
            <form method="GET">
                <div class="form-filtrar-prod">
                    <label for="producto" id="producto-filtro-letras">Producto: </label>
                    <input type="text" id="producto-filtro" class="form-control producto-filtro">
                    <label for="producto" id="distibuidor-filtro-letras">Vendedor:</label>
                    <input type="text" id="distribuidor-filtro" class="form-control">
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
                    <div class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="">Hierro N°12</h5>
                            <p name="id-producto" id="id-producto" class="id-producto">codigo de producto:345-3867-idf-3
                            </p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>


                    <div class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>


                    <div class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>
                    <div class="wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>
                    <div loading="lazy" class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>

                    <div loading="lazy" class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>
                    <div loading="lazy" class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img loading="lazy" src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>
                    <div class=" wow fadeInUp">
                        <div class="card card-body border-0 text-center shadow pt-5 tarjeta-productos">
                            <div class="svg-icon mx-auto mb-4">
                                <img src="../assets/img/hierro_N12.png" alt="" class="img-productos">
                            </div>
                            <h5 class="fg-gray nombre-producto" id="nombre-producto">Hierro N°12</h5>
                            <p id="id-producto" class="id-producto">codigo de producto: 345-3867-idf-3</p>
                            <p class="fs-small">Ideal para hacer estructuras de hierro
                                y edificaciones. Debido a su
                                resistencia ,es mas es el mas usado en el rubro de la construcion.
                            <p id="proveedor" class="proveedor"> Proveedor: Distribuidora XYZ.</p>
                            <h6 id="precio" class="precio-producto">Precio: $1500 c/m</h6>
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once ("./footer.php"); ?>
<script src="../assets/js/reproducir-cartas-prod.js"></script>
<script src="../assets/js/filtrar.js"></script>
<script src="../assets/js/carrito.js"></script>





</html>