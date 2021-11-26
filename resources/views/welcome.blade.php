<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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



    @routes
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
            icon: 'success',
            title: 'Gracias! El pago se ha realizado correctamente',
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
                        <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 01-02 Julio</p>
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
    <app-form-busqueda _ngcontent-serverApp-c3 _nghost-serverapp-c3>
        <div _ngcontent-serverApp-c3 class="ng-gradient ng-star-inserted" id="section_busqueda">
            <div _ngcontent-serverapp-c3 class="busqueda-container" style="max-width:1040px;">
                <form action="/realizarPago" method="get" _ngcontent-serverapp-c3 autocomplete="off" class="wrapper-form ant-form ant-form-horizontal ng-untouched ng-pristine ng-invalid" novalidate="" nz-form="" style="max-width: 900px;">
                    <!-- ORIGEN -->

                    <div _ngcontent-serverapp-c3="" class="row-form ng-star-inserted">
                        <div _ngcontent-serverapp-c3="" class="text-center-barra descripcion" style="font-size: 1.3rem;font-weight: bold; width: 100%; margin-bottom: 14px; color: var(--shimaMoraDark); text-align: center"> Hola, ¿A dónde nos vamos de viaje? </div>
                        <div _ngcontent-serverapp-c3="" class="columns-inputs-group">
                            <div _ngcontent-serverapp-c3="" class="input-field column-origen">
                                <select name="origens" class="form-control" id="cmbAgenciasUC" style="max-width: 200px" data-index="4">
                                    <span class="ant-form-item-children">
                                        <i _ngcontent-serverapp-c3="" class="" style="position: absolute; top: 2px; left: 10px; z-index: 10; border: 3px solid var(--shimaAmarillo); height: 12px; width: 12px; border-radius: 100%"></i></span>
                                    <option value="0">origen</option>
                                    @foreach ($origenes as $origen)
                                    <option value="{{$origen['id']}}">{{$origen['nombre_origen']}}</option>
                                    @endforeach


                                    <span class="ant-select-search__field__mirror ng-tns-c15-4 ng-star-inserted"></span>
                                </select>
                            </div>

                            <!-- DESTINO -->
                            <div _ngcontent-serverapp-c3="" class="input-field column-destino">
                                <nz-form-item _ngcontent-serverapp-c3="" nzspan="24" style="margin: 0px" class="ant-form-item ant-row">
                                    <nz-form-control _ngcontent-serverapp-c3="" nzerrortip="" class="ng-tns-c8-2 ant-form-item-control-wrapper ant-col ng-star-inserted">
                                        <div class="ant-form-item-control">
                                            <select name="destinos" class="form-control" id="cmbAgenciasUC" style="max-width: 200px" data-index="4">
                                                <span class="ant-form-item-children">
                                                    <i _ngcontent-serverapp-c3="" class="" style="position: absolute; top: 2px; left: 10px; z-index: 10; border: 3px solid var(--shimaAmarillo); height: 12px; width: 12px; border-radius: 100%"></i></span>
                                                <option value="0">Destino</option>
                                                @foreach ($origenes as $origen)
                                                <option value="{{$origen['id']}}">{{$origen['nombre_origen']}}</option>
                                                @endforeach
                                                <span class="ant-select-search__field__mirror ng-tns-c15-4 ng-star-inserted"></span>
                                                required
                                            </select>
                                            <nz-select _ngcontent-serverapp-c3="" formcontrolname="destino" nzallowclear="" nzshowsearch="" nzsize="large" class="ng-tns-c9-3 ant-select ant-select-lg ant-select-enabled ant-select-allow-clear ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                            </nz-select>
                                        </div>
                                    </nz-form-control>
                                </nz-form-item>
                            </div>
                            <!-- FECHA DE SALIDA -->
                            <div _ngcontent-serverapp-c3="" class="input column-fechaIda">
                                <div _ngcontent-serverapp-c3="" class="w-form">
                                    <div _ngcontent-serverapp-c3="" class="input-group mb-0">
                                        @foreach ($orders as $order)
                                        @endforeach
                                        <label class="form-control-label label-title">Salida:</label>
                                        <input type="date" name="fechasalidas" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" value="{{$order->fecha}}" :disabled="true"></input>
                                        <input hidden type="text" name="nombres" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->nombres}}"></input>
                                        <input hidden type="text" name="apellidos" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->apellidos}}"></input>
                                        <input hidden type="text" name="origen" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->origen}}"></input>
                                        <input hidden type="text" name="destino" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->destino}}"></input>
                                        <input hidden type="number" name="precio" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->precio}}"></input>
                                        <input hidden type="number" name="dni" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true" value="{{$order->dni}}">
                                        </input>
                                        <input hidden type="number" name="asiento" value="{{$order->asiento}}" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true">
                                        </input>
                                        <input hidden name="fechasalida" value="{{$order->fecha}}" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true">
                                        </input>
                                        <input hidden name="hora_sal" value="{{$order->hora}}" class="form-control center" style="max-width: 200px" v-model="form_datos_cesado.fechaNacimiento" :disabled="true">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div _ngcontent-serverapp-c3="" class="input column-fechaIda">
                            <button _ngcontent-serverapp-c3="" id="btnBuscarItinerario" type="submit" class="btn mb-2 btn-buscar-home">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </app-form-busqueda>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section class="seccion contenedor">
        <h2>El mejor transporte para tus viajes</h2>
        <p>
            Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula.
            Morbi porttitor tempus euismod.
        </p>
    </section>

    <section class="programa">
        <!-- <div class="contenedor-video"> -->
        <!-- <video autoplay loop poster="images/contenedor.jpg"> -->
        <!-- <source src="images/contenedor2.jpg"> -->
        <!-- <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogg"> -->
        <!-- </video> -->
        <!-- <img src="images/contenedor2.jpg" alt=""> -->
        <video autoplay loop poster="images/contenedor3.jpg"></video>
        </div>

    </section>
    <!--.programa-->

    <!-- START .destinos -->
    <section class="invitados contenedor seccion">
        <h2>Nuestros Destinos</h2>
        <ul class="lista-invitados clearfix">
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado1">
                        <img src="/images/destinos/destino1.jpg" alt="Imagen invitado">
                        <p>Satipo</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">
                <div class="invitado-info" id="invitado1">
                    <h2>Rafael </h2>
                    <img src="images/destinos/destino1.jpg" alt="">
                    <!-- <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.</p> -->
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#destino2">
                        <img src="/images/destinos/destino2.jpg" alt="Imagen invitado">
                        <p>HUANCAYO</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="destino2">
                    <h2>Shari</h2>
                    <img src="images/destinos/destino2.jpg" alt="">
                    <p>Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#destino3">
                        <img src="/images/destinos/destino3.jpg" alt="Imagen invitado">
                        <p>LA MERCED</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="destino3">
                    <h2>Juan</h2>
                    <img src="images/destinos/destino3.jpg" alt="">
                    <p>placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#destino4">
                        <img src="/images/destinos/destino4.jpg" alt="Imagen invitado">
                        <p>PICHANAKI</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="destino4">
                    <h2>Susana</h2>
                    <img src="images/destinos/destino4.jpg" alt="">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus</p>
                </div>

            </div>


        </ul>
        <!-- END lista-invitados -->
    </section>
    <!-- END .invitados -->

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
        <div style="display:none;">
            <div id="mc_embed_signup">
                <form action="//easy-webdev.us11.list-manage.com/subscribe/post?u=b3bb37039b6fbf3db0c1a8331&amp;id=20463b69f2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
                        <div class="mc-field-group">
                            <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
                            </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b3bb37039b6fbf3db0c1a8331_20463b69f2" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
            <script type='text/javascript'>
                (function($) {
                    window.fnames = new Array();
                    window.ftypes = new Array();
                    fnames[0] = 'EMAIL';
                    ftypes[0] = 'email';
                    fnames[1] = 'FNAME';
                    ftypes[1] = 'text';
                    fnames[2] = 'LNAME';
                    ftypes[2] = 'text';
                }(jQuery));
                var $mcj = jQuery.noConflict(true);
            </script>
            <!--End mc_embed_signup-->
        </div>
    </footer>
</body>

</html>