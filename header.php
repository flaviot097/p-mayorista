<?php

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
;
?>

<head>
    <link rel="stylesheet" href="./assets/css/header.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/favicon.png" alt="" width="40" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" id="barra-nav">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php" id="barra-nav">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lugar.php" id="barra-nav">¿De donde somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php" id="barra-nav">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php" id="barra-nav">Carrito</a>
                </li>
            </ul>
            <div class="ml-auto my-2 my-lg-0"><?php if (isset($_SESSION["usuario"])) { ?>
                <a href="estadisticas.php"> <button class="btn btn-dark rounded-pill usuario-iniciado"
                        id="usuario-logeado"><img class="usuario-iniciado" src="./assets/img/usuario-iniciado.png"
                            alt="usuario"><?php echo $usuario; ?>
                    </button></a>
                <a href="destruir-session.php"><button class="btn btn-dark rounded-pill">Cerrar Sesion</button></a><?php
            } else { ?>


                <button class="btn btn-dark rounded-pill" id="iniciar-session">Iniciar Sesion</button>
            </div>
            <?php
            }
            ; ?>
        </div>
    </div>
</nav>