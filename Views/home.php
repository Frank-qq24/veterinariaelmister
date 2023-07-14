<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Veterinaria el Mister</title>
    <link rel="shortcut icon" href="<?= media();?>/images/icon_logo.svg">
    <!-- CSS FILES -->
    <link href="<?= media(); ?>/home/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= media(); ?>/home/css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= media(); ?>/home/css/templatemo-kind-heart-charity.css" rel="stylesheet">

</head>

<body id="section_1">

    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-geo-alt me-2"></i>
                        San Bartolo 20, 0150 Oslo, Lima
                    </p>

                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@company.com">
                            veterinaria@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="https://www.facebook.com/profile.php?id=100057073013959" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a class="social-icon-link bi-youtube"></a>
                        </li>

                        <li class="social-icon-item">
                            <a class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="<?= media(); ?>/home/images/logo_solo.png" class="logo img-fluid " alt="Kind Heart Charity">
                <span>
                    Veterinaria El mister
                    <small>San Bartolo</small>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#top">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">Servicios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Cita(No va)</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link click-scroll dropdown-toggle" href="#section_5"
                            id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Vizualizar</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="news.html">Clientes</a></li>

                            <li><a class="dropdown-item" href="news-detail.html">Mascotas</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6">Contactanos</a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="<?= base_url(); ?>/login">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        <section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= media(); ?>/home/images/slide/porta_1.jpg"
                                        class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Consultas</h1>

                                        <p>Professional charity theme based on Bootstrap 5.2.2</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= media(); ?>/home/images/slide/porta_4.jpg"
                                        class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Analisis</h1>

                                        <p>You can support us to grow more</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= media(); ?>/home/images/slide/porta_5.jpg"
                                        class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Vacunacion</h1>

                                        <p>Please tell your friends about our website</p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="mb-5">Bienvenido a Veterinaria El Mister</h2>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a class="d-block">
                                <img src="<?= media(); ?>/home/images/icons/hands.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text">Compromiso con el <strong>cliente y su mascota</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a class="d-block">
                                <img src="<?= media(); ?>/home/images/icons/heart.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"><strong>Comunicación </strong> abierta y transparente</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a class="d-block">
                                <img src="<?= media(); ?>/home/images/icons/receive.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text">Cuidado <strong>compasivo y personalizado</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a class="d-block">
                                <img src="<?= media(); ?>/home/images/icons/scholarship.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"><strong>Profesionalismo </strong> en nuestro empleados</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding section-bg" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <img src="<?= media(); ?>/home/images/media.png"
                            class="custom-text-box-image img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-text-box">
                            <h2 class="mb-2">Nosotros</h2>

                            <h5 class="mb-3">El Mister, Veterinaria Clinica Animal</h5>

                            <p class="mb-0 ">
                                Bienvenidos a la veterinaria El Mister, una clínica especializada en la salud y bienestar de tus mascotas. 
                                En nuestro centro encontrarás un equipo de profesionales altamente calificados y apasionados por la atención veterinaria, 
                                que brindan un servicio integral para satisfacer las necesidades de tu amigo peludo.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-text-box mb-lg-0">
                                    <h5 class="mb-3">Nuestra Mision</h5>
                                    
                                    <p>Atención integral, personalizada y de alta calidad para la salud</p>

                                    <ul class="custom-list mt-2">
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Bienestar 
                                        </li>

                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Salud
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                    <div class="counter-thumb">
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="2009"
                                                data-speed="1000"></span>
                                            <span class="counter-number-text"></span>
                                        </div>

                                        <span class="counter-text">Mascotas</span>
                                    </div>

                                    <div class="counter-thumb mt-4">
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="120"
                                                data-speed="1000"></span>
                                            <span class="counter-number-text">c</span>
                                        </div>

                                        <span class="counter-text">Clientes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-5 col-12">
                        <img src="<?= media(); ?>/home/images/portrait-volunteer-who-organized-donations-charity.jpg"
                            class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
                    </div>

                    <div class="col-lg-5 col-md-7 col-12">
                        <div class="custom-text-block">
                            <h2 class="mb-0">Mervin De La Flor Enciso</h2>

                            <p class="text-muted mb-lg-4 mb-md-4">Veterinario de El Mister</p>

                            <p>Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional
                                charity theme based</p>

                            <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus</p>

                            <ul class="social-icon mt-4">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h2>Servicios</h2>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block-wrap">
                            <img src="<?= media(); ?>/home/images/causes/Consulta-Veterinaria.jpg"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-3">Consultas Medicas</h5>

                                    <p>Nuestro equipo de veterinarios altamente capacitados se encargará de realizar exámenes 
                                        exhaustivos, diagnósticos precisos y brindar el mejor tratamiento para tus compañeros 
                                        peludos. Desde vacunaciones y desparasitaciones hasta análisis de laboratorio y radiografías, 
                                        nos aseguramos de que tus mascotas reciban la atención integral que necesitan.</p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block-wrap">
                            <img src="<?= media(); ?>/home/images/causes/Analisis-Lab.jpg"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-3">Analisis de Laboratorio</h5>

                                    <p>En veterina el mister realizamos una amplia gama de pruebas, como análisis de 
                                        sangre, perfil bioquímico, conteo sanguíneo completo y análisis de orina, para 
                                        evaluar la salud interna de tus animales. Además, ofrecemos pruebas específicas, 
                                        como pruebas de enfermedades infecciosas, evaluación hormonal y análisis de 
                                        muestras histopatológicas.
                                        <br>
                                        <br>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="custom-block-wrap">
                            <img src="<?=media();?>/home/images/causes/Veterinaria-Vacunas.png"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-3">Vacunaciones </h5>

                                    <p> Nuestro equipo de expertos veterinarios se encarga de administrar vacunas 
                                        seguras y efectivas, siguiendo los protocolos más actualizados. Realizamos 
                                        vacunaciones tanto para cachorros y gatitos como para perros y gatos adultos, 
                                        adaptando el plan de vacunación a las necesidades individuales de cada animal. 
                                        <br>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="volunteer-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="text-white mb-4">Citas</h2>

                        <form class="custom-form volunteer-form mb-5 mb-lg-0" action="#" method="post" role="form">
                            <h3 class="mb-4">Become a volunteer today</h3>

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="volunteer-name" id="volunteer-name" class="form-control"
                                        placeholder="Jack Doe" required>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <input type="email" name="volunteer-email" id="volunteer-email"
                                        pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com"
                                        required>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <input type="text" name="volunteer-subject" id="volunteer-subject"
                                        class="form-control" placeholder="Subject" required>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="input-group input-group-file">
                                        <input type="file" class="form-control" id="inputGroupFile02">

                                        <label class="input-group-text" for="inputGroupFile02">Upload your CV</label>

                                        <i class="bi-cloud-arrow-up ms-auto"></i>
                                    </div>
                                </div>
                            </div>

                            <textarea name="volunteer-message" rows="3" class="form-control" id="volunteer-message"
                                placeholder="Comment (Optional)"></textarea>

                            <button type="submit" class="form-control">Submit</button>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12">
                        <img src="<?= media(); ?>/home/images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg"
                            class="volunteer-image img-fluid" alt="">

                        <div class="custom-block-body text-center">
                            <h4 class="text-white mt-lg-3 mb-lg-3">About Volunteering</h4>

                            <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                                tokito Professional charity theme based</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="news-section section-padding" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 mb-5">
                        <h2>Ubicanos</h2>
                    </div>

                    <div class="col-lg-7 col-12">
                        <div class="news-block">
                            <div class="news-block-top">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3896.899688406679!2d-76.7763725!3d-12.389647499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91059f250126ab3f%3A0xb2bab0eb4858b855!2sVeterinaria%20El%20Mister!5e0!3m2!1ses-419!2spe!4v1689319858785!5m2!1ses-419!2spe" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mx-auto">
                        <h2 class="mb-0"><br><br>Dudas o Sugerencias</h2>

                        <p><br>Puedes escribirnos a nuestro Whatsapp con alguna inquietud que tengas o 
                            para hacernos llegar tus sugerencias.
                        </p>

                        <button onclick="redirectTo('https://wa.me/51991344308')" type="submit" class="form-control">Escríbenos a nuestro Whatsapp</button>
                        
                            <script>
                            function redirectTo(url) {
                            window.location.href = url;
                            }
                            </script>

                    </div>

                </div>
            </div>
        </section>

        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                        <div class="contact-info-wrap">
                            <h2>Ponte en contacto</h2>

                            <div class="contact-image-wrap d-flex flex-wrap">
                                <img src="<?= media(); ?>/home/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                    class="img-fluid avatar-image" alt="">

                                <div class="d-flex flex-column justify-content-center ms-3">
                                    <p class="mb-0">Clara Barton</p>
                                    <p class="mb-0"><strong>Recepcion & Tienda</strong></p>
                                </div>
                            </div>

                            <div class="contact-info">
                                <h5 class="mb-3">Información de Contacto</h5>

                                <p class="d-flex mb-2">
                                    <i class="bi-geo-alt me-2"></i>
                                    Av. San José Mz. D1 Lt. 6, LIMA, San Bartolo
                                </p>

                                <p class="d-flex mb-2">
                                    <i class="bi-telephone me-2"></i>

                                    <a href="tel: (01)-2726085">
                                        (01) 2726085
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <i class="bi-envelope me-2"></i>

                                    <a href="mailto:info@yourgmail.com">
                                        veterinariamister@gmail.com
                                    </a>
                                </p>

                                <a href="https://goo.gl/maps/nYqPQxFQS6kqwn6n7" class="custom-btn btn mt-3">Get Direction</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto">
                        <form action="https://formsubmit.co/veterinariamister@gmail.com" method="POST" class="custom-form contact-form" role="form">
                            <h2>Contactenos</h2>

                            <p class="mb-4">O simplemente puede enviar un correo electrónico:
                                <a href="#">veterinariamister@gmail.com</a>
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="Nombre" id="Nombre" class="form-control"
                                        placeholder="Nombre" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="Apellido" id="Apellido" class="form-control"
                                        placeholder="Apellido" required>
                                </div>
                            </div>

                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                                placeholder="tucorreo@gmail.com" required>

                            <textarea name="Mensaje" rows="5" class="form-control" id="Mensaje"
                                placeholder="¿En que podemos ayudarte?"></textarea>

                            <button type="submit" class="form-control">Enviar Mensaje</button>

                            <input type="hidden" name="_next" value="http://localhost/veterinariaelmister/">
                            <input type="hidden" name="_captcha" value="false">

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="<?= media(); ?>/images/icon_logo.svg">
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    
                </div>

                <div class="col-lg-4 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone me-2"></i>

                        <a href="tel: (01)-2726085" class="site-footer-link">
                            (01) 2726085
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            veterinariamister@gmail.com
                        </a>
                    </p>

                    <p class="text-white d-flex mt-3">
                        <i class="bi-geo-alt me-2"></i>
                        Av. San José Mz. D1 Lt. 6, LIMA, San Bartolo
                    </p>
                    
                    <a href="https://goo.gl/maps/nYqPQxFQS6kqwn6n7" class="custom-btn btn mt-3">Get Direction</a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-7 col-12">
                        <p class="copyright-text mb-0">Todos los derechos reservados © 2023<a href="http://localhost/veterinariaelmister/"> veterinariamister</a>
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.facebook.com/profile.php?id=100057073013959" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a class="social-icon-link bi-linkedin"></a>
                            </li>

                            <li class="social-icon-item">
                                <a class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= media(); ?>/home/js/jquery.min.js"></script>
    <script src="<?= media(); ?>/home/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/home/js/jquery.sticky.js"></script>
    <script src="<?= media(); ?>/home/js/click-scroll.js"></script>
    <script src="<?= media(); ?>/home/js/counter.js"></script>
    <script src="<?= media(); ?>/home/js/custom.js"></script>

</body>

</html>