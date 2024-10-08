<?php
include "servico/GaleriaService.php";
?>

<!DOCTYPE />
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" />
    <meta name="keywords" />
    <title>
        INSIDE Muay Thai e MMA
    </title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="assets/css/all-fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body>
    <form name="aspnetForm" method="post" action="./" id="aspnetForm">
        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
            value="M15Atkg2MfiMMJYg2xFGMJJwlrU9q9kpNElh18ATQeow/hQNEv5TMUNFuETMjDnAgaIWEJYsGIXFEUbFx3Lw1KytbjsK7hRV6AEhoRcs4jw=" />

        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334" />
        <input type="hidden" name="__VIEWSTATEENCRYPTED" id="__VIEWSTATEENCRYPTED" value="" />

        <div class="preloader">
            <div class="loader"></div>
        </div>


        <header class="header">
            <div class="main-navigation">
                <nav class="navbar navbar-expand-lg" style="position: absolute; top: 0">
                    <div class="container-fluid px-lg-5">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo_inside.png" alt="logo">
                        </a>
                        <div class="mobile-menu-right">
                            <a href="#" class="mobile-search-btn search-box-outer"><i class="far fa-search"></i></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="far fa-stream"></i></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a id="home" class="nav-link" href="/">Home</a>

                                </li>
                                <li class="nav-item">
                                    <a id="sobre-nos" class="nav-link" href="sobre-nos">Sobre nós</a>
                                </li>
                                <li class="nav-item"><a id="unidades" class="nav-link" href="unidades">Unidades</a></li>
                                <li class="nav-item"><a id="eventos" class="nav-link" href="eventos">Eventos</a></li>
                                <li class="nav-item dropdown">
                                    <a id="imprensa" class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Imprensa</a>
                                    <ul class="dropdown-menu fade-up">
                                        <li><a class="dropdown-item" href="#">Tá na mídia</a></li>
                                        <li><a class="dropdown-item" href="#">Branding</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a id="blog" class="nav-link" href="#">Blog</a></li>
                                <li class="nav-item"><a id="contato" class="nav-link" href="#">Contato</a></li>
                            </ul>
                            <div class="header-nav-right">

                                <div class="header-btn">
                                    <a href="login.php" class="theme-btn">Entrar<i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>


        <div class="search-popup">
            <button class="close-search"><span class="far fa-times"></span></button>
            <form action="#">
                <div class="form-group">
                    <input type="search" name="search-field" placeholder="Search Here..." required>
                    <button type="submit"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>

        <main class="main">
            <div class="hero-section">
                <div class="hero-slider owl-carousel owl-theme">
                    <div class="hero-single" style="background-image: url(assets/img/slider/slider-everton.png)">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-lg-7">
                                    <div class="hero-content">
                                        <h6 class="hero-sub-title wow animate__animated animate__fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".25s">Inicie sua jornada conosco</h6>
                                        <h1 class="hero-title wow animate__animated animate__fadeInUp"
                                            data-wow-duration="1s" data-wow-delay=".50s">
                                            <span>Venha ser INSIDE 111</span><br />você também
                                        </h1>
                                        <p class="wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                                            data-wow-delay=".75s">
                                            Venha fazer parte da equipe de Muay Thai mais organizada do Brasil
                                        </p>
                                        <div class="hero-btn wow animate__animated animate__fadeInUp"
                                            data-wow-duration="1s" data-wow-delay="1s">
                                            <a href="unidades" class="theme-btn">Localização<i
                                                    class="far fa-arrow-right"></i></a>
                                            <a href="sobre-nos" class="theme-btn theme-btn2">Sobre nós<i
                                                    class="far fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-social-wrapper">
                    <div class="hero-social">
                        <div class="hero-social-link">
                            <a href="https://www.facebook.com/insidemuaythaioficial/" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/insidemuaythaioficial/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <h6>Acompanhe</h6>
                        </div>
                    </div>
                </div>
            </div>





            <div class="about-area py-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-left">
                                <div class="about-img">
                                    <img src="images/everton.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-right">
                                <div class="site-heading mb-3">
                                    <span class="site-title-tagline">Sobre Nós</span>
                                    <h2 class="site-title">
                                        Estamos prontos para <span>fazer você diferente</span> dos outros
                                    </h2>
                                </div>
                                <p class="about-text">
                                    Você já sabe que o nome Inside é sinônimo de excelência, profissionalismo, qualidade
                                    técnica, padronização, alcance e empreendedorismo.
                                </p>
                                <div class="about-list-wrapper">
                                    <ul class="about-list list-unstyled">
                                        <li>
                                            <div class="icon"><i class="far fa-user-ninja"></i></div>
                                            <div class="text">
                                                <h4>Professores Qualificados</h4>
                                                <p>Nossos professores são altamente capacitados</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="far fa-boxing-glove"></i></div>
                                            <div class="text">
                                                <h4>Faça uma aula hoje</h4>
                                                <p>Inicie sua jornada hoje mesmo</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="sobre-nos" class="theme-btn">Descubra mais <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="counter-area pt-70 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-box">
                                <div class="icon"><i class="far fa-boxing-glove"></i></div>
                                <div>
                                    <span class="counter" data-count="+" data-to="1500" data-speed="3000">1500</span>
                                    <h6 class="title">+ Alunos</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-box">
                                <div class="icon"><i class="far fa-building"></i></div>
                                <div>
                                    <span class="counter" data-count="+" data-to="150" data-speed="3000">150</span>
                                    <h6 class="title">+ Unidades</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-box">
                                <div class="icon"><i class="far fa-user-ninja"></i></div>
                                <div>
                                    <span class="counter" data-count="+" data-to="250" data-speed="3000">250</span>
                                    <h6 class="title">+ Professores</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-box">
                                <div class="icon"><i class="flaticon-award-1"></i></div>
                                <div>
                                    <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                    <h6 class="title">+ Cidades</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








            <div class="gallery-area py-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="site-heading text-center">
                                <span class="site-title-tagline">Inside 111</span>
                                <h2 class="site-title">Galeria de Fotos</h2>
                                <div class="heading-divider"></div>
                                <p>
                                    Conheça um pouco da nossa história através dos registros da nossa galeria
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row popup-gallery" data-masonry='{"percentPosition": true }'>

                        <?php

                        $fotos = buscarTodasFotos();
                        $cont = 0;
                        if ($fotos) {
                            foreach ($fotos as $foto) {
                                if ($cont < 6) {
                                    $cont++;
                                    ?>
                                    <div class="col-md-4">
                                        <div class="gallery-item">
                                            <img width="350px" height="350px" src="images/galeria/<?php echo $foto['foto'] ?>"
                                                alt="">
                                            <a class="popup-img" href="images/galeria/<?php echo $foto['foto'] ?>"><i
                                                    class="far fa-plus"></i></a>
                                            <div class="gallery-info">
                                                <h4><a href="#">União</a></h4>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="text-center mt-5">
                        <a href="#" class="theme-btn">Veja mais <i class="far fa-sync"></i></a>
                    </div>
                </div>
            </div>





            <div class="gallery-area mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="site-heading text-center">
                                <span class="site-title-tagline">Inside 111</span>
                                <h2 class="site-title">Localização</h2>
                                <div class="heading-divider"></div>
                                <p>
                                    Conheça um pouco da nossa história através dos registros da nossa galeria
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row popup-gallery" data-masonry='{"percentPosition": true }'>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.1853198235062!2d-52.11459449163672!3d-21.773087539945696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9491990d8ad170af%3A0xb9f6ed0b80bca0a2!2sACADEMIA%20DE%20MUAY%20THAI!5e0!3m2!1spt-BR!2sbr!4v1710510173567!5m2!1spt-BR!2sbr"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>





        </main>




        <footer class="footer-area">
            <div class="footer-widget">
                <div class="container">
                    <div class="row footer-widget-wrapper pt-100 pb-70">
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-widget-box about-us">
                                <a href="#" class="footer-logo">
                                    <img src="images/logo_inside_grande.png" alt="">
                                </a>
                                <p class="mb-20">

                                </p>
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/insidemuaythaioficial/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/insidemuaythaioficial/" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget-box">
                                <h4 class="footer-widget-title">Contato</h4>
                                <ul class="footer-contact">
                                    <!--<li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>-->
                                    <li><a href="tel:+5511999999999"><i class="far fa-phone"></i>+55 11 99999-9999</a>
                                    </li>
                                    <li><a href="mailto:insidemuaythaimma@gmail.com"><i
                                                class="far fa-envelope"></i>insidemuaythaimma@gmail.com</a></li>
                                    <!--<li>
                <a href="/cdn-cgi/l/email-protection#274e49414867425f464a574b420944484a"><i class="far fa-envelope"></i><span class="__cf_email__" data-cfemail="3950575f56795c41585449555c175a5654">[email&#160;protected]</span></a>
            </li>
            <li><i class="far fa-clock"></i>Sun - Fri (08AM - 10PM)</li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="footer-widget-box list">
                                <h4 class="footer-widget-title">Links</h4>
                                <ul class="footer-list">
                                    <li><a href="sobre-nos"><i class="fas fa-caret-right"></i> Sobre nós</a></li>
                                    <li><a href="unidades"><i class="fas fa-caret-right"></i> Unidades</a></li>
                                    <li><a href="eventos"><i class="fas fa-caret-right"></i> Eventos</a></li>
                                    <li><a href="#"><i class="fas fa-caret-right"></i> Imprensa</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget-box list">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <p class="copyright-text">
                                &copy; Copyright <span id="date"></span> <a href="#"> INSIDE Muay Thai e MMA </a> Todos
                                direitos reservados.
                            </p>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <ul class="footer-menu">
                                <li><a href="#">Termos de Serviço</a></li>
                                <li><a href="#">Política de Privacidade</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <a href="#" id="scroll-top"><i class="far fa-long-arrow-up"></i></a>


    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/counter-up.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>

        selecionaMenu();

        function selecionaMenu() {
            var pagina = window.location.href.toString();

            if (pagina.indexOf("sobre-nos") > 0) {
                pagina = "sobre-nos";
            } else if (pagina.indexOf("unidades") > 0) {
                pagina = "unidades";
            } else if (pagina.indexOf("eventos") > 0) {
                pagina = "eventos";

            } else if (pagina.indexOf("imprensa") > 0) {
                pagina = "imprensa";

            } else if (pagina.indexOf("blog") > 0) {
                pagina = "blog";

            } else if (pagina.indexOf("contato") > 0) {
                pagina = "contato";

            } else {
                pagina = "home";

            }
            console.log(pagina);
            $("#" + pagina).addClass("active");
        }
    </script>



</body>

</html>