<?php
use MercadoPago\Item;
use MercadoPago\Preference;

require __DIR__ . '/../../../../vendor/autoload.php';


session_start();
$datos;
$cantidadProd;
$textPrd;
$identificadorConmpra = uniqid();
// Recupera los datos de la sesión
if (isset($_SESSION['datos'])) {
    $datos = $_SESSION['datos'];
    $cantidadProd = $datos['cantidad'];

} else {
    if (isset($datos)) {
        $datos = $datos;
        $cantidadProd = $datos['cantidad'];
    } else {
        echo "No hay datos disponibles.";
    }
}

if (intval($cantidadProd) > 1) {
    $textPrd = "Productos varios";
} else {
    $textPrd = $datos["producto"];
}



//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("APP_USR-2128904535243858-062003-701eecad06dbce21930fd8c3bbfdda83-1864180777");

$preference = new Preference();

$preference->back_urls = array(
    "success" => "../../../send-mails/payment-ok.php",
    "failure" => "../../../send-mails/payment-failrule.php",
    "pending" => "../../../send-mails/payment-pending.php"
);
$items = new Item();
$items->id = $identificadorConmpra;
$items->title = $textPrd;
$items->description = $textPrd;
$items->quantity = 1;
$items->unit_price = $datos["total"];
$items->currency_id = "ARS";
$preference->items = array($items);
$preference->payer_email = $_POST["email"];
$preference->save();
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Realizar Pago</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2.1"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../client/html-js/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../client/html-js/js/index.js" defer></script>
</head>

<body>
    <script>
        const mp = new MercadoPago("TEST-91305bbf-fb76-4951-a45e-ff16e5fb4324", {
            locale: 'es-AR'
        })
        const checkout = mp.checkout({
            preference: {
                id: "<?php echo $preference->id; ?>"
            },
            render: {
                container: ".btnPagar",
                label: "pagar"
            }
        })
    </script>

    <body>
        <main>
            <!-- Shopping Cart -->
            <section class="shopping-cart dark">
                <div class="container" id="container">
                    <div class="block-heading">
                        <h2>Carro de Compras</h2>
                        <p>¿Desea finalizar su compra?</p>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="items">
                                    <div class="product">
                                        <div class="info">
                                            <div class="product-details">
                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-3 container-img">
                                                        <img class="img" alt="Image of a product"
                                                            src="imagen-deposito3.jpg">
                                                    </div>
                                                    <div class="col-md-4 product-detail">
                                                        <h5>Producto/s:</h5>
                                                        <b><span
                                                                id="product-description"><?php echo $items->title; ?></span></b><br>
                                                        <br class="product-info">
                                                        <b>Descripcion:</b><?php echo $items->description; ?><br>
                                                        <b>codigo de compra: </b><?php echo $items->id; ?><br>
                                                        <b>Precio:</b> $ <span
                                                            id="unit-price"><?php echo $items->unit_price; ?></span></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 product-detail">
                                                    <label for="quantity">
                                                        <b>Cantidad</b>
                                                    </label>
                                                    <input type="number" id="quantity"
                                                        value="<?php echo $datos["cantidad"]; ?>" min="1"
                                                        class="form-control" disabled style="text-align: center;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="row" style="width: 100%;">
                                <div class="summary" style="width: 60%;">
                                    <h3>Carro</h3>
                                    <div class="summary-item"><span class="text">Total a Pagar:</span><span
                                            class="price" id="cart-total">$<?php echo $items->unit_price; ?></span><br>
                                    </div>
                                    <a href="<?php echo $preference->init_point; ?>"
                                        class="btn btn-primary btn-block">Pagar</a>
                                </div class="span-selection">
                                <p class="span-selections">O</p>
                                <div style="margin-left: 30px;" class="div-container-back"><a
                                        href="../../../../html/carrito.php" class="btn btn-primary btn-block">Volver al
                                        Carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--payment-->
            <section class="payment-form dark">
                <div class="container_payment">
                    <div class="block-heading">
                        <h2>Pagos</h2>
                        <p>Finalizar Pago</p>
                    </div>
                    <div class="form-payment">
                        <div class="products">
                            <h2 class="title">Total</h2>
                            <div class="item">
                                <span class="price" id="summary-price"></span>
                                <p class="item-name"><span id="summary-quantity"></span></p>
                            </div>
                            <div class="total">Total<span class="price" id="summary-total"></span></div>
                        </div>
                        <div class="payment-details">
                            <div class="form-group col-sm-12">
                                <br>
                                <div id="button-checkout"></div>
                                <br>
                                <a id="go-back" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10 10"
                                        class="chevron-left">
                                        <path fill="#009EE3" fill-rule="nonzero" id="chevron_left"
                                            d="M7.05 1.4L6.2.552 1.756 4.997l4.449 4.448.849-.848-3.6-3.6z"></path>
                                    </svg>
                                    Volver al carrito de compras
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- footer -->
        </main>
        <footer>
            <div class="footer_logo">
                <img id="horizontal_logo" alt="image of the logo" src="../../client/html-js/img/horizontal_logo.png">
            </div>
            <div class="footer_text">
                <p>Mercado Pago:</p>
                <p><a href="https://mercadopago.com" target="_blank">https://mercadopago.com </a>
                </p>
            </div>
        </footer>
    </body>

</html>
</body>

</html>

<?php
$pagosdata = json_encode(array($datos, $_POST["email"]));
echo "<script>
    var email = '$pagosdata';

// Almacenar el dato en Local Storage
localStorage.setItem('correoElectronico', email);
</script>"
    ?>