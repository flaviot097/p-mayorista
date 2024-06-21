<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Exitoso</title>
    <link rel="stylesheet" href="../assets/css/pago-ok.css">
</head>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>


<script>
    // Obtener el dato almacenado bajo la clave 'correoElectronico'
    var correo = localStorage.getItem('correoElectronico');
    var correoObjeto;
    if (correo) {
        // Convertir la cadena JSON a un objeto JavaScript
        correoObjeto = JSON.parse(correo);
        document.cookie = "mailAenviar=" + encodeURIComponent(correoJSON) + "; path=/";
    }
    var fechaActual = new Date();


    async function sendEmail() {
        const response = await fetch('http://localhost:3000/send-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                to: correoObjeto[1],
                html: `<p>Empresa B</p>
<p style="padding: 12px; border-left: 4px solid #d0d0d0; font-style: italic;">
  Muchas gracias por su compra. Aqui le dejamos el resumen de la compra y el enlace de segimineto. <br><br>
<a>http/andreani.com.ar</a>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 150px;
        }
        .details {
            margin: 20px 0;
        }
        .details h2 {
            color: #333;
        }
        .details p {
            color: #555;
        }
        .items {
            margin: 20px 0;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .items th {
            background-color: #f6f6f6;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Logo de la Tienda">
        </div>
        <div class="details">
            <h2>Resumen de tu Compra</h2>
            <p><strong>Email:</strong>${correoObjeto[1]}</p>
            <p><strong>Fecha:</strong>${fechaActual}</p>
        </div>
        <div class="items">
            <h2>Detalles de la Compra</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${correoObjeto[0].producto}</td>
                        <td>${correoObjeto[0].cantidad}</td>
                        <td>$ ${correoObjeto[0].total}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total: $${correoObjeto[0].total}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="footer">
            <p>Gracias por tu compra. Si tienes alguna pregunta, no dudes en contactarnos.</p>
        </div>
        <b>Tienda B</b>
    </div>
</body>
`,
            }),
        });

        if (response.ok) {
            console.log('Email sent successfully');
        } else {
            console.error('Failed to send email');
        }
    }

    // Llama a la función sendEmail cuando sea necesario
    sendEmail();
</script>

<?php
if (isset($_COOKIE['mailAenviar'])) {
    // Obtener el valor de la cookie y decodificarlo
    $cookieValue = $_COOKIE['mailAenviar'];
    $correoObjeto = json_decode(urldecode($cookieValue), true);

    // Verificar si se pudo decodificar correctamente
    if ($correoObjeto !== null) {
        // El objeto ahora es un array asociativo en PHP
        // Puedes manipularlo como desees
        var_dump($correoObjeto);
    } else {
        echo "Error al decodificar el JSON de la cookie.";
    }
}

// Obtener los datos del formulario

/*if (isset($_COOKIE['carrito'])) {

setcookie('carrito', '', time() - 3600, '/');
}*/
?>

<body>
    <div class="container">
        <div class="card">
            <div class="icono-exito">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM6.002 11.354a.5.5 0 0 1-.707 0l-2.147-2.147a.5.5 0 1 1 .708-.708l1.794 1.793 4.646-4.647a.5.5 0 0 1 .708.708l-5 5z" />
                </svg>
            </div>
            <h1>¡Pago Exitoso!</h1>
            <p>Gracias por tu compra. Hemos recibido tu pago con éxito.</p>
            <p>Chequea tu casilla de Mails</p><span><a id="emailLink"
                    href="https://mail.google.com/mail/u/0/#inbox">Gmail</a></span>
            <p>Te hemos enviado el comprobante de pago y otros datos.</p>
            <a href="./carrito.php" class="btn">Volver al Inicio</a>
        </div>
    </div>
</body>

</html>