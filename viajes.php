<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Traveltura</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="icon" type="image/png" href="img/logo.png">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-5 text-center text-lg-start mb-lg-0">
                    <div class="d-flex">
                        <a href="#" class="text-muted me-4"><i class="fas fa-envelope text-secondary me-2"></i>traveltura@gmail.com</a>
                        <a href="#" class="text-muted me-0"><i class="fas fa-phone-alt text-secondary me-2"></i>+01234567890</a>
                    </div>
                </div>
                <div class="col-lg-3 row-cols-1 text-center mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://twitter.com/?lang=es"><i class="fab fa-twitter fw-normal text-secondary"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f fw-normal text-secondary"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://co.linkedin.com/"><i class="fab fa-linkedin-in fw-normal text-secondary"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.instagram.com/"><i class="fab fa-instagram fw-normal text-secondary"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle" href="https://youtube.com/"><i class="fab fa-youtube fw-normal text-secondary"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="#" class="text-muted me-2"> Ayuda</a><small> / </small>
                        <a href="#" class="text-muted mx-2"> Soporte</a><small> / </small>
                        <a href="#" class="text-muted ms-2"> Contacto</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">
                    <h1 class="display-5 text-secondary m-0"><img src="img/logo.png" class="img-fluid" alt="">Traveltura</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Inicio</a>
                        <a href="about.html" class="nav-item nav-link">Sobre Nosotros</a>
                        <a href="service.html" class="nav-item nav-link">Servicios</a>
                        <a href="contact.html" class="nav-item nav-link">Contacto</a>
                    </div>
                    <button class="btn btn-primary btn-md-square border-secondary mb-3 mb-md-3 mb-lg-0 me-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                    <a href="Vistas/login.php" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">Login</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title text-secondary mb-0" id="exampleModalLabel">Buscar</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Nuestros Viajes</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Inicio</a></li>
                    <li class="breadcrumb-item active text-secondary">Viajes</li>
                    <li class="breadcrumb-item"><a href="service.html" class="text-white">Servicios</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Services Start -->
        <section id="service-1">
        <div class="container-fluid service overflow-hidden py-5">
            <div class="container py-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Viajes</h5>
                    </div>
                    <h1 class="display-5 mb-4"> </h1>
                    <p class="mb-0"></p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-1-.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a  class="h4 text-white mb-0">Bali, Indonesia</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=1">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a><h4 class="text-white mb-4 py-3">Bali, Indonesia</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123 <br>
                                                            •Fecha de Salida: 10 de enero de 2025 <br>
                                                            •Fecha de Regreso: 20 de enero de 2025</p>
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="Vistas/Comprar.php?id_viaje=1">$6,000,000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-2-.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a class="h4 text-white mb-0">París, Francia</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=2">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a><h4 class="text-white mb-4 py-3">París, Francia</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123<br>
                                                            •Fecha de Salida: 5 de febrero de 2025<br>
                                                            •Fecha de Regreso: 15 de febrero de 2025</p>
                                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="Vistas/Comprar.php?id_viaje=2">$4,800,000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-3-.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a class="h4 text-white mb-0">Kyoto, Japón</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=3">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a><h4 class="text-white mb-4 py-3">Kyoto, Japón</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123<br>
                                            •Fecha de Salida: 1 de marzo de 2025<br>
                                            •Fecha de Regreso: 10 de marzo de 2025
                                            </p>
                                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="Vistas/Comprar.php?id_viaje=3">$7,200,000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-4-.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a  class="h4 text-white mb-0">Marrakech, Marruecos
                                            </a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=4">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a><h4 class="text-white mb-4 py-3">Marrakech, Marruecos</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123<br>
                                            •Fecha de Salida: 15 de abril de 2025<br>
                                            •Fecha de Regreso: 25 de abril de 2025
                                            </p>
                                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="Vistas/Comprar.php?id_viaje=4">$5,600,000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-5.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a  class="h4 text-white mb-0">Santorini, Grecia</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=5">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a><h4 class="text-white mb-4 py-3">Santorini, Grecia</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123<br>
                                            •Fecha de Salida: 5 de mayo de 2025<br>
                                            •Fecha de Regreso: 15 de mayo de 2025
                                            </p>
                                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="Vistas/Comprar.php?id_viaje=5">$6,000,000 </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="img/service-6.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a  class="h4 text-white mb-0">Cape Town, Sudáfrica</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="Vistas/Comprar.php?id_viaje=6">Comprar</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a ><h4 class="text-white mb-4 py-3">Cape Town, Sudáfrica</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">•Lugar de Salida: Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123<br>
                                            •Fecha de Salida: 1 de junio de 2025<br>
                                            •Fecha de Regreso: 10 de junio de 2025
                                            </p>
                                            <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="Vistas/Comprar.php?id_viaje=6">$7,200,000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Services End -->

        <!-- Countries We Offer Start -->
         <section id="service-2">
        <div class="container-fluid country overflow-hidden py-5">
            <div class="container py-5">
                <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px;">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Viajes populares</h5>
                    </div>
                    <h1 class="display-5 mb-4"></h1>
                    <p class="mb-0"></p>
                </div>
                <div class="row g-4 text-center">
                    <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="country-item">
                            <div class="rounded overflow-hidden">
                                <img src="img/country-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="country-flag">
                                <img src="img/brazil.jpg" class="img-fluid rounded-circle" alt="Image">
                            </div>
                            <div class="country-name">
                                <a href="Vistas/Comprar.php?id_viaje=7" class="text-white fs-4">São Paulo, Brazil<br>$2,500,000</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="country-item">
                            <div class="rounded overflow-hidden">
                                <img src="img/country-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="country-flag">
                                <img src="img/india.jpg" class="img-fluid rounded-circle" alt="Image">
                            </div>
                            <div class="country-name">
                                <a href="Vistas/Comprar.php?id_viaje=8" class="text-white fs-4">Nueva Delhi, India<br>$8,000,000</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="country-item">
                            <div class="rounded overflow-hidden">
                                <img src="img/country-3.jpg" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="country-flag">
                                <img src="img/usa.jpg" class="img-fluid rounded-circle" alt="Image">
                            </div>
                            <div class="country-name">
                                <a href="Vistas/Comprar.php?id_viaje=9" class="text-white fs-4">New York, Estados Unidos<br>$4,800,000</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="country-item">
                            <div class="rounded overflow-hidden">
                                <img src="img/country-4.jpg" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="country-flag">
                                <img src="img/italy.jpg" class="img-fluid rounded-circle" alt="Image">
                            </div>
                            <div class="country-name">
                                <a href="Vistas/Comprar.php?id_viaje=10" class="text-white fs-4">Milán, Italia<br>$6,000,000</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        </section>
        <!-- Countries We Offer End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-secondary mb-4">Información De Contacto</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> Calle 13C #33-15 Los Lagos-Bella Vista</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> traveltura@gmail.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-secondary me-2"></i>
                                <a class="btn mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-secondary mb-4">Abierto</h4>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Lunes - Viernes:</h6>
                                <p class="text-white mb-0">09.00 am to 07.00 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Sabádo:</h6>
                                <p class="text-white mb-0">10.00 am to 05.00 pm</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-secondary mb-4">Contacto rápido</h4>
                            <p class="text-white mb-3">Déjanos tus datos y nos pondremos en contacto contigo para asesorarte en la planificación de tu viaje.</p>
                            <div class="position-relative mx-auto rounded-pill">
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Traveltura</a>, Todos Los Derechos Reservados.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>