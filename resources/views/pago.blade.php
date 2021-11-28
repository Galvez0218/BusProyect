<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Icono -->
    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />



    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'conferencia') {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
    ?>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Oswald:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#fafafa">
    <script src="https://kit.fontawesome.com/1a2bd5a108.js" crossorigin="anonymous"></script>

    <!-- SCRIPT PAGO CON PAYPAL -->
    <script src="https://www.paypal.com/sdk/js?client-id=Af47qW5mnhYAMwBLNXQW108GV8uA9uYR5Aisif1BKbDyIBlZNBnTTRNbWnQHTWxxG8z9PlpeE_qbcjHJ&locale=es_ES"> </script>

    <!-- token de seguridad -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body class="<?php echo $pagina ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Lo sentimos! El pago no se pudo realizar',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="https://www.facebook.com/TurismoShima"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </ul>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 11 Noviembre</p>
                        <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i> Satipo, Perú</p>
                    </div>

                    <!-- <h1 class="nombre-sitio">SHIMA</h1>
                    <p class="slogan">Los mejores congresos de <span>Ingeniería</span></p> -->
                </div>
                <!--.informacion-evento-->

            </div>
        </div>
        <!--.hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="{{route('prin.welcome')}}">
                    <img src="images/logo2.png" alt="shima">
                </a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="{{route('gen.destinos')}}">Destinos</a>
                <a href="{{route('gen.encuentranos')}}">Encuentranos</a>
                <a href="{{route('gen.registrar')}}">Registrarse</a>
                <a href="{{route('gen.login')}}">Iniciar sesion</a>
            </nav>
        </div>
        <!--.contenedor-->
    </div>
    <!--.barra-->

    <section class="seccion contenedor">
        <h2>Pasarela de Pagos</h2>
        <form class="registro" action="/pagado'" method="POST">

            <div class="col-md-6 login-form-2">
                <!-- <form action="{{ route('registrar.verificar_usuario') }}" method="post" autocomplete="off"> -->
                {{csrf_field()}}
                <!-- <h3>Todos los días</h3> -->
                <h3>Verifique sus datos</h3>
                <div class="col register-content">

                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">NOMBRES</label>
                        <p name="fname" id="fname" class="text">{{$nombres}}</p>
                    </div>
                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">APELLIDOS</label>
                        <p id="lname" name="lname" class="text">{{$apellidos}}</p>
                    </div>

                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">PRECIO</label>
                        <p id="precio" name="precio" class="text">{{$precio}}</p>
                    </div>
                    <!-- <div class="row form-group">
                            <input type="number" name="dni" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" placeholder="Documento de Identidad" spellcheck="false" id="txtInputs" />
                        </div> -->
                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">DNI</label>
                        <p id="dni" name="dni" class="text">{{$dni}}</p>
                    </div>

                    @foreach($origenes as $origen)
                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">ORIGEN</label>
                        <p id="origen" name="origen" class="text">{{$origen->nombre_origen}}</p>
                    </div>
                    @endforeach
                    @foreach($destinos as $destino)
                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">DESTINO</label>
                        <p id="destino" name="destino" class="text">{{$destino->nombre_origen}}</p>
                    </div>
                    @endforeach

                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">FECHA SALIDA</label>
                        <p id="fecha" name="fecha" class="text">{{$fecha}}</p>
                    </div>

                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">HORA SALIDA</label>
                        <p id="hora" name="hora" class="text">{{$hora}}</p>
                    </div>

                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">ASIENTO</label>
                        <p id="asiento" name="asiento" class="text">{{$asiento}}</p>
                    </div>
                    <h3>Realiza el pago</h3>
                    <div class="row form-group">
                        <label for="inpdni" class="form-control-label label-title">PAGAR CON PAYPAL</label>
                        <div id="paypal-button-container"></div>
                        <!-- <form id="paypal-form" action="{{ route('paypal.pagar') }}" method="post">
                            <input type="hidden" name="details" id="details-input">
                        </form> -->
                    </div>
                </div>
                <!-- </form> -->
            </div>
            <!--#paquetes-->
        </form>
    </section>



    <footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>grupo shima</span></h3>
                <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex
                    blandit vehicula. Morbi porttitor tempus euismod.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <a class="twitter-timeline" data-height="400" data-theme="light" data-link-color="#fe4918" Tweets by </a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </nav>
            </div>
        </div>

        <p class="copyright">
            Todos los derechos Reservados a SHIMA 2021.
        </p>



        <!-- Begin MailChimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup {
                background: #fff;
                clear: left;
                font: 14px Helvetica, Arial, sans-serif;
            }

            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
             We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>

    </footer>


    <script src="{{asset('js/vendor/modernizr-3.8.0.min.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        (window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>'))
    </script>


    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<script src="js/jquery.colorbox-min.js"></script>';
    } else if ($pagina == 'conferencia') {
        echo '<script src="js/lightbox.js"></script>';
    }
    ?>

    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>



    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview');
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>

    <!-- SCRIPT PAGO CON PAYPAL -->
    <script>
        paypal.Buttons({
            style: {
                shape: "pill",
                label: "pay",
            },
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '30.00'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                console.log("actiun", actions);
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    // alert('Pago completado por ' + details.payer.name.given_name);


                    // . <- punto por id
                    // # <- numeral por clase
                    var firstname = $('#fname').text();
                    var lastname = $('#lname').text();
                    var dni = $('#dni').text();
                    var precio = $('#precio').text();
                    var origen = $('#origen').text();
                    var destino = $('#destino').text();
                    var fecha = $('#fecha').text();
                    var hora = $('#hora').text();
                    var asiento = $('#asiento').text();
                    var payment_mode = "pagado por paypal";
                    var payment_id = details.id;

                    let data = new FormData();
                    data.append("firstname", firstname);
                    data.append("lastname", lastname);
                    data.append("dni", dni);
                    data.append("precio", precio);
                    data.append("origen", origen);
                    data.append("destino", destino);
                    data.append("fecha", fecha);
                    data.append("hora", hora);
                    data.append("asiento", asiento);
                    data.append("payment_mode", payment_mode);
                    data.append("payment_id", payment_id);

                    axios
                        .post('/pagado', data).then(function(response) {
                            // console.log(response.data);
                            let resultado = response.data;
                            
                            if (resultado == "EXITO") {
                                Swal.fire({
                                    icon: "success",
                                    title: "¡EXITO!",
                                    text: "Pago registrada por " + details.payer.name.given_name,
                                    allowOutsideClick: false,
                                    confirmButtonText: 'Aceptar',
                                    preConfirm: (result) => {
                                        window.location.href = "{{route('paypalPay')}}";
                                    },
                                });
                            }
                            // window.location.href = "/";

                        })

                    // var paypalForm = document.getElementById('paypal-form');
                    // var detailsInput = document.getElementById('details-input');

                    // var jsonDetails = JSON.stringify(details); 

                    // detailsInput.value = jsonDetails;
                    // console.log(detailsInput);
                    // paypalForm.submit();
                });

            }

        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>
</body>

</html>