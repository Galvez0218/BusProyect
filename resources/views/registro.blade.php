<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register/styles.css" type="text/css">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <meta name="description" content="">


    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <script src="js/sweetalert2.js"></script>

    <title>Registro</title>
    @routes
</head>


<body>
    <div class="navbar-header">
        <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo" id="logoPrincipal"></a>
    </div>
    <div class="container login-container" style="z-index:1;">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <img src="images/registrar.png" id="imagenContenido" />
            </div>

            <div class="col-md-6 login-form-2">
                <form action="{{ route('registrar.verificar_usuario') }}" method="post" autocomplete="off">
                    {{csrf_field()}}
                    <h3 class="register-heading">REGISTRARSE</h3>

                    <div class="col register-content">

                        <div class="row form-group">
                            <img src="images/login/userIcon.svg" class="iconosLogin" />
                        </div>

                        <div class="row form-group">
                            <input type="text" name="nombres" autocomplete="nope" class="form-control"  placeholder="Nombres Completos" spellcheck="false" id="txtInputs" />
                        </div>
                        <div class="row form-group">
                            <input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno" spellcheck="false" id="txtInputs" />
                        </div>

                        <div class="row form-group">
                            <input type="text" name="apellidoMaterno" autocomplete="nope" class="form-control" placeholder="Apellido Materno" spellcheck="false" id="txtInputs" />
                        </div>
                        <div class="row form-group">
                            <input type="number" name="dni" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" placeholder="Documento de Identidad" spellcheck="false" id="txtInputs" />
                        </div>
                        <div class="row form-group">
                            <input type="text" name="email" class="form-control" placeholder="E-mail" spellcheck="false" id="txtInputs" />
                        </div>

                        <div class="row form-group">
                            <img src="images/login/passwordIcon.svg" class="iconosLogin" />



                        </div>

                        <div class="row form-group">
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
                            <button type="button" class="btn btn-link" id="tienes_cuenta"> <a href="{{route('gen.login')}}">¿Ya tiene una cuenta?</a></button>
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-primary" id="btnEntrar">REGISTRARSE</button>
                        </div>

                        <div class="row form-group">
                            <p class="copyright">&copy; 2021 GTAWEBDEV</p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(Session::has('dni_existente'))
    <script>
        self = this;
        Swal.fire({
            icon: 'error',
            title: '¡Ups!',
            text: '{{session("dni_existente")}}',
            confirmButtonText: 'Aceptar',
        })
    </script>
    @endif

    @if(Session::has('dni_registrado'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Registrado!',
            text: '{{session("dni_registrado")}}',
            allowOutsideClick: true,
            confirmButtonText: 'Aceptar',
        }).then(
        function(){
            //  window.location.href = "{{route('gen.login')}}";
        })
        // "/login"
    </script>
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="js/login/scripts.js"></script>


</body>

</html>