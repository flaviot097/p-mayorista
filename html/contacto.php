<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Mobile Application HTML5 Template">

    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

    <title>Pagina-contacto</title>

    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/css/mobster.css">
</head>

<body>

    <?php include './header.php'; ?>

    <div class="bg-light">

        <div class="page-hero-section bg-image hero-mini" style="background-image: url(../assets/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Contacto</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 my-3 wow fadeInUp">
                        <div class="card-page">
                            <div class="row row-beam-md">
                                <div class="col-md-4 text-center py-3 py-md-2">
                                    <i class="mai-location-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">Direccion</p>
                                    <p class="mb-0">Andres Pasos 101</p>
                                </div>
                                <div class="col-md-4 text-center py-3 py-md-2">
                                    <i class="mai-call-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">Contacto</p>
                                    <p class="mb-1">0800 3234</p>
                                    <p class="mb-0"><a href="./wathsapp.js">+54 3434 435213</a></p>
                                </div>
                                <div class="col-md-4 text-center py-3 py-md-2">
                                    <i class="mai-mail-open-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">Email</p>
                                    <p class="mb-1">soporte@gmail.com</p>
                                    <p class="mb-0">soporte2@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 my-3 wow fadeInUp">
                        <div class="card-page">
                            <h3 class="fw-normal">Contactanos</h3>
                            <form id="form" class="mt-3">
                                <div class="form-group">
                                    <label for="name" class="fw-medium fg-grey">Nombre y Apellido</label>
                                    <input type="text" name="user_name" class="form-control" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="fw-medium fg-grey">Email</label>
                                    <input class="form-control" id="email" type="text" name="user_email">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="fw-medium fg-grey">Numero de telefono(opcional)</label>
                                    <input type="number" class="form-control" id="phone" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="message" class="fw-medium fg-grey">Mensaje</label>
                                    <textarea rows="6" class="form-control" name="message" id="message"></textarea>
                                </div>

                                <p>*Su información nunca será compartida con ningún tercero.</p>

                                <div class="form-group mt-4">
                                    <button type="submit" id="button" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 my-3 wow fadeInUp">
                        <div class="card-page" id="container-map">
                            <div class="maps-container" id="container-map">
                                <iframe class="map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.5024981452934!2d-71.12082372349654!3d42.37444073419231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e377427d7f0199%3A0x5937c65cee2427f0!2sUniversidad%20de%20Harvard!5e0!3m2!1ses!2sar!4v1706834757917!5m2!1ses!2sar"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

        <script type="text/javascript">
            emailjs.init('lWPGTCPL2cFxpikT_')
        </script>
    </div> <!-- .bg-light -->


    <!-- footer -->
    <?php include_once './footer.php'; ?>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/mobster.js"></script>

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
                    btn.value = 'Enviar';
                    alert('Enviado con exito!');
                }, (err) => {
                    btn.value = 'Enviar nuevamente';
                    alert(JSON.stringify(err));
                });
        });
</script>

</html>