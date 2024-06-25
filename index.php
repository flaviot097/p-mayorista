<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="descripcion" content="pagina" />

    <title>Pagina</title>

    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="./assets/css/maicons.css" />

    <link rel="stylesheet" href="./assets/vendor/animate/animate.css" />

    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css" />

    <link rel="stylesheet" href="./assets/css/bootstrap.css" />

    <link rel="stylesheet" href="./assets/css/mobster.css" />
</head>

<body>
    <?php include ("header.php"); ?>

    <div class="page-hero-section bg-image hero-home-1" style="background-image: url(./assets/img/bg_hero_2.svg)">
        <div class="hero-caption pt-5">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="badge badge-soft mb-2">
                            <span class="icon mr-1"><span class="mai-globe"></span></span>
                            #1 Pagina web pensada y creada 100% para mayoristas.
                        </div>
                        <h1 class="mb-4">
                            Venda, facture, compre y administre en su empresa en una misma
                            plataforma
                        </h1>
                        <p class="mb-4" id="texto-inicio-promocional">
                            Podras cambiar los precios con solo un click,<br />
                            tambien contaras con graficas para que analices<br />
                            diferentes variables (Ventas,Compras,Rango de Precios,etc.).
                        </p>
                        <?php if (isset($_SESSION["usuario"])) { ?>
                            <a href="publicaciones-activas.php" class="btn btn-primary rounded-pill">¡Ir a menu! </a>
                        <?php } else { ?>
                            <a href="session.php" class="btn btn-primary rounded-pill">¡Registrarse ahora!</a><?php }
                        ; ?>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="img-place mobile-preview shadow floating-animate">
                            <img class="img-pagina-pricipal" src="../assets/img/pagina-index-foto.png"
                                alt="muetra de pagina" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clientes -->
    <div class="page-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
                    <div class="img-place client-img">
                        <img src="./assets/img" alt="" />Sancor
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
                    <div class="img-place client-img">
                        <img src="./assets/img/" alt="" />LW
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
                    <div class="img-place client-img">
                        <img src="./assets/img/" alt="" />Gabio
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
                    <div class="img-place client-img">
                        <img src="./assets/img/" alt="" />RPP
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <div class="position-realive bg-image" style="background-image: url(../assets/img/pattern_1.svg)">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 py-3">
                        <div class="img-place mobile-preview shadow wow zoomIn">
                            <img class="productos-img-foto" src="../assets/img/pagina-productos.png" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 mt-lg-5">
                        <div class="iconic-list">
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span class="mai-cube"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Cambia precios</h5>
                                    <p class="fs-small">
                                        Cambia el precio de tus productos desde cualquier lugar en
                                        el que te encuentres y mucho mas.
                                    </p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                                    <span class="mai-shield"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Multiplataforma</h5>
                                    <p class="fs-small">
                                        Acede a tu panel administrador desde cualquier
                                        dispositivo.
                                    </p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                                    <span class="mai-desktop-outline"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Monitorea tus productos</h5>
                                    <p class="fs-small">
                                        Monitorea el Stock, las ventas y compras de tu empresa en
                                        tiempo real desde cualquier lugar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 py-3 mt-lg-5 wow fadeInUp">
                        <h1 class="mb-4">Panel Administrador</h1>
                        <p class="mb-4">
                            En este apartado encontraras todas las funcionalidades que te
                            permiten controlar la gestión de tu negocio. El Panel
                            Administrativo es una herramienta que te permite tener un
                            control total sobre tu empresa. Con él podrás ver
                            todos los pedidos ,ventas y facturaciones ,entre otras
                            funcionalidades.
                        </p>
                        <?php if (isset($_SESSION["usuario"])) { ?>
                            <a href="stock.php" class="btn btn-primary rounded-pill">¡Controlar stock! </a>
                        <?php } else { ?>
                            <a href="session.php" class="btn btn-primary rounded-pill">¡Registrarse ahora!</a><?php }
                        ; ?>
                    </div>
                    <div class="col-lg-5 py-3">
                        <div class="img-place mobile-preview shadow wow zoomIn">
                            <img src="./assets/img/imagen-menu-foto.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section bg-dark fg-white">
        <div class="container">
            <h1 class="text-center">¿Por que elegir la pagina?</h1>

            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn">
                        <div class="mb-3">
                            <img src="./assets/img/icons/rocket.svg" alt="" />
                        </div>
                        <p class="fs-large">Muy rapida</p>
                        <p class="fs-small fg-grey">
                            Destaca por su rapidez y versatilidad
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="200ms">
                        <div class="mb-3">
                            <img src="./assets/img/icons/testimony.svg" alt="" />
                        </div>
                        <p class="fs-large">Clientes Satisfechos</p>
                        <p class="fs-small fg-grey">
                            Sondeos muestran un alto grado de satifaccion en los usuarios.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="400ms">
                        <div class="mb-3">
                            <img src="./assets/img/icons/promotion.svg" alt="" />
                        </div>
                        <p class="fs-large">Crea publicaciones</p>
                        <p class="fs-small fg-grey">
                            Has la publicacion de tus productos de una manera facil.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="600ms">
                        <div class="mb-3">
                            <img src="./assets/img/icons/coins.svg" alt="" />
                        </div>
                        <p class="fs-large">Controla tu capital</p>
                        <p class="fs-small fg-grey">
                            Monitorea tus ventas, ganancias y gastos. Incluso actualiza tus
                            precios.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="800ms">
                        <div class="mb-3">
                            <img src="./assets/img/icons/support.svg" alt="" />
                        </div>
                        <p class="fs-large">Soporte 24/7</p>
                        <p class="fs-small fg-grey">
                            Accede al soporte tecnico las 24 horas los 7 dias de la semana.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="1000ms">
                        <div class="mb-3">
                            <img src="./assets/img/icons/laptop.svg" alt="" />
                        </div>
                        <p class="fs-large">Funciones</p>
                        <p class="fs-small fg-grey">
                            Las funcionalidades de la plataforma que fueron un 100% pensadas
                            en empresas mayoristas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 py-3 mb-5 mb-lg-0">
                    <div class="img-place w-lg-75 wow zoomIn">
                        <img src="./assets/img/illustration_contact.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-5 py-3">
                    <h1 class="wow fadeInUp">
                        ¿Necesitas ayuda?
                        <br />
                        No te preocupes, solo contáctanos.
                    </h1>

                    <form id="form" class="mt-5">
                        <div class="form-group wow fadeInUp">
                            <label for="nombre-empresa" class="fw-medium fg-grey">Nombre
                            </label>
                            <input type="text" name="user_name" class="form-control" id="nombre-empresa" />
                        </div>
                        <div class="form-group wow fadeInUp">
                            <label for="email" class="fw-medium fg-grey">Email</label>
                            <input type="email" name="user_email" class="form-control" id="email" />
                        </div>

                        <div class="form-group wow fadeInUp">
                            <label for="mensaje" class="fw-medium fg-grey">Mensaje</label>
                            <textarea rows="6" name="message" class="form-control" id="mensaje"></textarea>
                        </div>
                        <div class="form-group mt-4 wow fadeInUp">
                            <input type="submit" class="btn btn-primary" id="button" value="Enviar">
                        </div>
                    </form>
                    <script type="text/javascript"
                        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

                    <script type="text/javascript">
                        emailjs.init('lWPGTCPL2cFxpikT_')
                    </script>
                </div>
            </div>
        </div>
    </div>

    <?php include ('footer.php'); ?>

    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <script src="./assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="./assets/vendor/wow/wow.min.js"></script>

    <script src="./assets/js/mobster.js"></script>
</body>
<script>
    const btn = document.getElementById('button');

    document.getElementById('form')
        .addEventListener('submit', function (event) {
            event.preventDefault();

            btn.value = 'enviando...';

            const serviceID = 'default_service';
            const templateID = 'template_jom08lp';

            emailjs.sendForm(serviceID, templateID, this)
                .then(() => {
                    btn.value = 'Enviar email';
                    alert('Enviado!');
                }, (err) => {
                    btn.value = 'Enviar mail';
                    alert(JSON.stringify(err));
                });
        });
</script>

</html>