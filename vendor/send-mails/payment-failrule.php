<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Fallida</title>
    <style>
    body {
        background-color: #ffffff;
        /* Fondo blanco */
        font-family: Arial, sans-serif;
        color: #333;
        /* Color de texto oscuro */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Sombra ligera */
        background-color: #f0f8ff;
        /* Fondo celeste */
        max-width: 400px;
        width: 90%;
    }

    h1 {
        color: #008080;
    }

    p {
        font-size: 18px;
        line-height: 1.6;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50" height="50">
            <circle cx="25" cy="25" r="20" fill="#FF0000" />
            <text x="25" y="32" font-family="Arial, sans-serif" font-size="28" text-anchor="middle"
                fill="#FFFFFF">!</text>
        </svg>

        <h1>¡Compra Fallida!</h1>
        <p>Lo sentimos, ha ocurrido un problema durante la compra</p>
        <b>No se pudo efectuar el pago.</b>
        <p>Vuelve a intentarlo más tarde o contactase via mail.</p>
        <a href="../../html/carrito.php" class="btn">Volver al Inicio</a>
    </div>
</body>

</html>