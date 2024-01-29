<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<title>{{ $title }}:: SIGA</title>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://kit-digital-uc-prod.s3.amazonaws.com/uc-kitdigital/css/uc-kitdigital.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link  href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link  href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link  href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
<script src="https://kit-digital-uc-prod.s3.amazonaws.com/uc-kitdigital/js/uc-kitdigital.js"></script>

</head>
<body>
<header class="uc-header">
    <div id="uc-global-topbar"></div>
    <nav class="uc-navbar">
    <!-- Menú para versión Escritorio -->
      <div class="container d-none d-lg-block">
        <div class="row align-items-center">
          <div class="col-lg-3 col-xl-2">
            <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/logo-uc-azul.svg" alt="Pontificia Universidad Católica de Chile" class="img-fluid" />
          </div>
          <div class="col-lg-8 col-xl-9 pl-60">
            <div class="h2 text-font--serif text-color--blue mt-24">SIGA</div>
            <div class="text-color--gray p-size--lg">Vicerrectoria Académica</div>
          </div>
        </div>
      </div>
      <!-- Menú para versión Móvil -->
      <div class="uc-navbar_mobile navbar_mobile-slide d-block d-lg-none">
                <div class="uc-navbar_mobile-bar navbar-brand">
                    <div class="uc-navbar_mobile-logo navbar-light">
                        <div class="h2 text-font--serif text-color--blue">Título</div>
                    </div>
                    <a href="javascript:void(0);" class="uc-navbar_mobile-button">
                        <span class="uc-icon"></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')


    <footer class="uc-footer">
        <div class="container pb-48">
            <div class="row">
                <div class="col-7 col-md-3 col-xl-2 mb-32">
                    <a href="/">
                        <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/logo-uc-blanco.svg" alt="" class="img-fluid" />
                    </a>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="h2 color-white text-font--serif mt-28">
                        Virrectoria Académica
                    </div>
                    <ul class="uc-footer_social">
                        <!-- agregar enlaces a redes sociales correspondientes -->
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-twitter.svg" alt="Twitter" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-facebook.svg" alt="Facebook" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-instagram.svg" alt="Instagram" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-linkedin.svg" alt="Linkedin" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-youtube.svg" alt="Youtube" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-flickr.svg" alt="Flickr" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div id="uc-global-footer"></div>

    <div id="loading-super"></div>
    <div id="loading-progress"><div id="capaprogress" class="cprogress"></div></div>
  </body>
</html>