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
                <label for="" class="nombre-producto">Nombre del producto</label><br>
                <input type="text" id="" class="producto" name="producto"><br>
                <label for="" class="imagen">Imagen</label><br>
                <input type="file" class="img-prod" id="" name="img"><br>
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

                <button type="" class="btn-actualizar">Crear</button>
            </form>
        </div>
    </div>


</body>
<script src="./assets/js/barra-lateral.js"></script>
<script src="./assets/js/mensajes.js"></script>
<script src="./assets/js/plantilla-alerta-exitosa.js"></script>
<?php
if ($_POST) {
    if (!empty($_POST["producto"]) && !empty($_POST["codigo"]) && !empty($_POST["precio"]) && !empty($_POST["stock"]) && !empty($_POST["descripcion"]) && !empty($_POST["dni"]) && !empty($_FILES["img"])) {

        // Recoge los datos del formulario
        $producto = $_POST['producto'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $descripcion = $_POST['descripcion'];
        $dni = $_POST['dni'];
        $imagen = $_FILES['img']['tmp_name'];

        // Inicializa cURL
        $url = "http://localhost:4000/inicio/crearProducto";
        $curl = curl_init($url);


        $data = [
            'producto' => $producto,
            'codigo' => $codigo,
            'precio' => $precio,
            'stock' => $stock,
            'descripcion' => $descripcion,
            'dni' => $dni,
            'imagen' => new CURLFile($imagen, $_FILES['img']['type'], $_FILES['img']['name'])
        ];


        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


        $resultado = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        } else {
            echo "<script>mensajeProductosExito();</script>";
        }


        curl_close($curl);
    }
}
?>

<?php require_once ("footer.php"); ?>

</html>