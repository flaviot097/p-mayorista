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
    <link rel="stylesheet" href="./assets/css/crear-producto.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(../assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <?php require_once ("barra-lateral-usuario.php"); ?>
        <div class="contenedor-card-crear-producto" id="mensaje">
            <form class="form-crear-producto" method="post" enctype="multipart/form-data">
                <label for="" class="imagen">Imagen</label><br>
                <input type="file" class="img-prod" id="" name="img"><br>
                <button type="" class="btn-actualizar">Crear</button>
            </form>
        </div>
    </div>
    <script src="./assets/js/barra-lateral.js"></script>
    <script src="./assets/js/mensajes.js"></script>
    <script src="./assets/js/plantilla-alerta-exitosa.js"></script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['img'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["img"]["name"])) . " ha sido subido.";
        } else {
            echo "Lo siento, hubo un error subiendo tu archivo.";
        }
    }
    ?>
    <img src="{{$target_dir}}" alt="">
    <?php require_once ("footer.php"); ?>
</body>

</html>