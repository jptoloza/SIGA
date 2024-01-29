<!DOCTYPE html>
<html lang="es">
<head>
  <title>SIGA UC</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="">
  <meta http-equiv="Content-Language" content="es">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://kit-digital-uc-prod.s3.amazonaws.com/uc-kitdigital/css/uc-kitdigital.css" />

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  <!-- Css -->
  @vite(['resources/css/app.css' ,'resources/css/login.css'])



  
</head>
<body>
  <header class="uc-header">
    <div id="uc-global-topbar"></div>
    <nav class="uc-navbar">
      <!-- Menú para versión Escritorio -->
      <div class="container d-none d-lg-block">
        <div class="row align-items-center">
          <div class="col-lg-3 col-xl-2">
            <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/logo-uc-azul.svg"
              alt="Pontificia Universidad Católica de Chile" class="img-fluid" />
          </div>
          <div class="col-lg-8 col-xl-9 pl-60">
            <div class="h2 text-font--serif text-color--blue mt-24">
              SIGA
            </div>
            <div class="text-color--gray p-size--lg">Vicerrectoria Académica</div>
          </div>
        </div>
      </div>
      <!-- Menú para versión Móvil -->

    </nav>
  </header>


  <div class="home-facultad-page">

  

    <section id="section-login">
      <div class="d-flex justify-content-center">
        <form id="formActionLogin" name="formActionLogin" method="post" class="form" action="{{ route('validar-login') }}">
        @csrf
          <div class="div-center">
            <h1 class="text-center" style="margin-bottom:40px">Bienvenido a SIGA</h1>
            <div class="uc-form-group" style="max-width: 460px">
              <label class="uc-label-help font-weight-normal" for="ucsearch">
                Ingrese su nombre de usuario
              </label>
              <input id="login" name="login" type="text" class="uc-input-style" placeholder="" required/>
            </div>
            <div>
              <button type="submit" id="btn-login" class="text-uppercase uc-btn btn-cta w-100 d-inline-flex justify-content-between" disabled> Siguiente <i class="uc-icon icon-shape--rounded">arrow_forward</i> </button>
            </div>
          </div>
        </form>
      </div>
    </section>


    <section id="section-passwd" style="display:none">
      <div class="d-flex justify-content-center">
        <form id="formActionPasswd" name="formActionPasswd"  method="post" class="form" action="{{ route('validar-passwd') }}">
          @csrf
          <input type="hidden" name="login" id="loginPasswd" value="" />
          <div class="div-center">
            <h1 class="text-center" style="margin-bottom:40px">Bienvenido a SIGA</h1>
            <div class="uc-form-group" style="max-width: 460px">
              <label class="uc-label-help font-weight-normal" for="ucsearch">
                Ingrese su contraseña
              </label>
              <input id="passwd" name="passwd" type="password" class="uc-input-style" placeholder="" />
            </div>
            <div class="d-iline-flex justify-content-between">
              <button type="button" id="btn-back" class="text-uppercase uc-btn btn-primary d-inline-flex justify-content-between" style="width:49%">Anterior <i class="uc-icon icon-shape--rounded">arrow_back</i></button>
              <button type="submit" id="btn-passwd" class="text-uppercase uc-btn btn-cta d-inline-flex justify-content-between" style="width:49%" disabled>Siguiente <i class="uc-icon icon-shape--rounded">arrow_forward</i> </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <section id="section-code" style="display:none">
      <div class="d-flex justify-content-center">
        <form id="formActionSignIn" name="formActionSignIn" method="post" class="form" action="{{ route('validar-code') }}">
          @csrf
          <input type="hidden" name="login" id="loginSigin" value="" />
          <div class="div-center">
            <h1 class="text-center" style="margin-bottom:40px">Bienvenido a SIGA</h1>
            <div class="uc-form-group" style="max-width: 460px">
              <label class="uc-label-help font-weight-normal">
                Autenticación de dos pasos. Por favor revise su correo electrónico e ingrese el código de acceso.
              </label>
              <input id="code" name="code" type="text" class="uc-input-style" placeholder="" />
            </div>
            <div>
              <button id="btn-sign-in" class="text-uppercase uc-btn btn-cta w-100 d-inline-flex justify-center-content" disabled> Iniciar Sesión <i class="uc-icon icon-shape--rounded">arrow_forward</i> </button>
            </div>
          </div>
        </form>
      </div>
    </section>

  </div>


  <footer class="uc-footer">
    <div class="container pb-48">
      <div class="row">
        <div class="col-7 col-md-3 col-xl-2 mb-32">
          <a href="/">
            <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/logo-uc-blanco.svg" alt=""
              class="img-fluid" />
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
                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-facebook.svg"
                  alt="Facebook" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-instagram.svg"
                  alt="Instagram" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="https://kit-digital-uc-prod.s3.amazonaws.com/assets/social-icon-linkedin.svg"
                  alt="Linkedin" />
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


  <script src="https://kit-digital-uc-prod.s3.amazonaws.com/uc-kitdigital/js/uc-kitdigital.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Scripts -->
  @vite(['resources/js/app.js', 'resources/js/login.js'])

</body>
</html>