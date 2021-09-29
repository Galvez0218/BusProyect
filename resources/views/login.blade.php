<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login/styles.css" type="text/css">
  <link rel="stylesheet" href="css/normalize.css" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <meta name="description" content="">

  <!-- Icono -->
  <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
  <script src="js/sweetalert2.js"></script>

  <title>Login</title>
</head>

<body>

  <div class="navbar-header">
    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo" id="logoPrincipal"></a>
  </div>
  <div class="container login-container" style="z-index:1;">
    <div class="row">
      <div class="col-md-6 login-form-1">
        <img src="images/iniciar-sesion.svg" id="imagenContenido" />
      </div>
      <div class="col-md-6 login-form-2">
        <form action="{{ route('login.validarUsuario') }}" method="get">
          <h3 class="register-heading">INICIAR SESIÓN</h3>
          <div class="col register-content">
            <div class="row form-group">
              <img src="images/login/userIcon.svg" class="iconosLogin" />
              <input type="text" name="email" class="form-control" placeholder="email" spellcheck="false" id="txtUsuario" />
            </div>
            <div class="row form-group">
              <img src="images/login/passwordIcon.svg" class="iconosLogin" />
              <div class="input-group" id="show_hide_password">
                <input type="password" name="clave" class="form-control" placeholder="Contraseña" spellcheck="false" id="txtContraseña" />
                <div class="input-group-append">
                  <span class="input-group-text input-password-hide" style="cursor: pointer;" id="btnVerContraseña">
                    <i class="fa fa-eye"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="row form-group">
              <button type="button" class="btn btn-link" id="lnkOlvidasteContraseña">¿Olvidaste tu contraseña?</button>
            </div>
            <div class="row form-group">
                            <button type="button" class="btn btn-link" id="tienes_cuenta"> <a href="{{route('gen.registrar')}}">No tiene una cuenta?</a></button>
                        </div>
            <div class="row form-group">
              <button type="submit" class="btn btn-primary" id="btnEntrar">INGRESAR</button>
            </div>
            <div class="row form-group">
              <p class="copyright">&copy; 2021 GDLWEBCAMP</p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="footer-pic">
    <!-- <img src="images/general/logo-plomo.svg" id="logoSecundario"/> -->
  </div>

  @if(Session::has('email_no_valido'))
  <script>
    Swal.fire({
      icon: 'error',
      title: '¡Ups!',
      text: '{{session("email_no_valido")}}',
      confirmButtonText: 'Aceptar',
    })
  </script>
  @endif



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="js/login/scripts.js"></script>

</body>

</html>