@extends('layout.main')
 
@section('title', 'Dashboard')
  
@section('content')
 
  <div class="home-facultad-page">
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="d-none d-lg-block col-lg-3">
            <ul class="nav uc-navbar-side uc-navbar-side-fit">
              <li class="">
                <a href="#" class="uc-navbar-side_label active"> Bienvenido {{ session('user_name') }} <i class="uc-icon">keyboard_arrow_right</i></a>
                <ul class="uc-navbar-side">
                  <li><a href="#"> De experiencia de usuario <i class="uc-icon">keyboard_arrow_right</i></a></li>
                </ul>
              </li>
              <li class="disabled">
                <a href="#" tabindex="-1" class="uc-navbar-side_label">
                  Color <i class="uc-icon">keyboard_arrow_right</i>
                </a>
                <ul class="uc-navbar-side">
                  <li>
                    <a href="#" tabindex="-1"> Paletas de color <i class="uc-icon">keyboard_arrow_right</i></a>
                  </li>
                  <li>
                    <a href="#" tabindex="-1"> Criterios de aplicación <i class="uc-icon">keyboard_arrow_right</i></a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>


          <div class="col-12 col-lg-9">
            <div class="text-right">
              campana 
              <a href="{{ route('logout') }}">Cerrar sesión</a>
            </div>

            col derecha

          </div>


        </div>
      </div>
    </section>
  </div>






    



@endsection