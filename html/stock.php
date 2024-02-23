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
    <link rel="stylesheet" href="../assets/css/stock.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once("./header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once("./barra-lateral-usuario.php"); ?>

        <div class="contenedor-card-productos">
            <div class="col justify-content-center mt-5">
                <!-- CARDS DE PRODUCTOS -->
                <div class="productos-stock">
                    <div class="producto-stock">
                        <a href="#" class="btn btn-primary btn-sm d-inline-flex align-items-center">Hierro N°12. <h6
                                class="codigo-producto" id="codigo-producto">codigo de producto: 345-3867-idf-3</h6>
                            <h6 class="codigo-producto" id="cantidad-producto"> Cantidad: 3000 Unidades</h6>
                        </a>
                    </div>
                    <div class="producto-stock">
                        <a href="#" class="btn btn-primary btn-sm d-inline-flex align-items-center faltante"
                            id="faltante">Hierro
                            N°8. <h6 class="codigo-producto" id="codigo-producto">codigo de producto: 345-3867-idf-3
                            </h6>
                            <h6 class="codigo-producto" id="cantidad-producto"> Sin stock</h6>
                        </a>
                    </div>
                    <div class="producto-stock">
                        <a href="#" class="btn btn-primary btn-sm d-inline-flex align-items-center poco"
                            id="poco">Hierro
                            N°6. <h6 class="codigo-producto" id="codigo-producto">codigo de producto: 345-3867-idf-3
                            </h6>
                            <h6 class="codigo-producto" id="cantidad-producto"> Cantidad: 3 Unidades</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once("./footer.php"); ?>
<script src="../assets/js/barra-lateral.js"></script>

</html>