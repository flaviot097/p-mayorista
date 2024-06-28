<?php
// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar el buffer de salida para evitar envíos de encabezados prematuros
ob_start();

// Configuración de encabezados CORS
header("Access-Control-Allow-Origin: https://p-mayorista.onrender.com"); // Cambia a tu dominio
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }
    exit(0);
}

// Iniciar la sesión con opciones seguras
session_start([
    'cookie_secure' => true, // true para HTTPS
    'cookie_httponly' => true,
    'cookie_samesite' => 'None'
]);

// Manejar la lógica de validación y cookies
if ($_GET) {
    if (!empty($_GET['usuario']) && !empty($_GET['password'])) {
        $dni = $_GET['usuario'];
        $pass = $_GET['password'];

        $ci = curl_init();
        $url = "https://api-8cf6.onrender.com/validacion/dni/" . $dni;
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($ci);

        if (curl_errno($ci)) {
            $mensaje_error = curl_error($ci);
            echo "Error en la solicitud: " . $mensaje_error;
        } else {
            curl_close($ci);
        }

        $respuestaJson = json_decode($respuesta, true);
        if (!$respuestaJson) {
            echo '<div loading="lazy" class="no-coinciden">El DNI ingresado es incorrecto o no existe</div>';
        } else {
            if ($respuestaJson[0]["contrasenia"] === $pass) {
                // Configurar una cookie segura
                setcookie('test_cookie', 'test_value', [
                    'expires' => time() + 86400, // 1 día
                    'path' => '/',
                    'domain' => 'p-mayorista.onrender.com', // Cambia a tu dominio
                    'secure' => true, // true para HTTPS
                    'httponly' => true,
                    'samesite' => 'None'
                ]);

                $_SESSION["usuario"] = $respuestaJson[0]["usuario"];
                $dnivalido = $respuestaJson[0]["dni"];
                setcookie('usuario', $dnivalido);

                header("Location: estadisticas.php");
                exit();
            } else {
                echo '<div loading="lazy" class="no-coinciden">Contraseña incorrecta</div>';
            }
        }
    }
}

// Finalizar el buffer de salida y enviar la salida al navegador
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/maicons.css">
    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/mobster.css">
    <link rel="stylesheet" href="./assets/css/session.css">
</head>

<body>
    <div class="backgaund-imagen" style="background-image: url(./assets/img/bg_hero_2.svg)">
    </div>
    <?php require_once ("header.php"); ?>
    <div class="conteiner-cuerpo">
        <div class="iniciar-session">
            <div class="container-formulario-iniciar-sesion">
                <form method="get" class="formulario-iniciar-sesion">
                    <label for="" class="usuario-label-iniciar-session">DNI</label>
                    <input class="usuario-iniciar-session" name="usuario"></input>
                    <label for="" class="contrasenia-label-iniciar-session">Contraseña</label>
                    <input class="contrasenia-iniciar-session" name="password" type="password"></input>
                    <button type="submit" class="btn-iniciar-session">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php require_once ("footer.php"); ?>
<script src="./assets/js/mensajes.js"></script>

</html>