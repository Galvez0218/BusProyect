(function () {
    "use strict";
    var regalo = document.getElementById("regalo");

    document.addEventListener("DOMContentLoaded", function () {
        if (document.getElementById("calcular")) {
            var regalo = document.getElementById("regalo");

            // Campos Datos usuario
            var nombre = document.getElementById("nombre");
            var apellido = document.getElementById("apellido");
            var email = document.getElementById("email");

            // Campos pases
            var pase_dia = document.getElementById("pase_dia");
            var pase_dosdias = document.getElementById("pase_dosdias");
            var pase_completo = document.getElementById("pase_completo");

            // mostrar en editar
            var formulario_editar =
                document.getElementsByClassName("editar-registrado");
            if (formulario_editar.length > 0) {
                if (pase_dia.value || pase_dosdias.value || pase_completo) {
                    mostrarDias();
                }
            }

            //Botones y divs
            var calcular = document.getElementById("calcular");
            var errorDiv = document.getElementById("error");
            var botonRegistro = document.getElementById("btnRegistro");

            var lista_productos = document.getElementById("lista-productos");
            var suma = document.getElementById("suma-total");

            botonRegistro.disabled = true;

            calcular.addEventListener("click", calcularMontos);

            nombre.addEventListener("blur", validarCampos);
            apellido.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarMail);

            function validarCampos() {
                if (this.value == "") {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Este campo es obligatorio";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                } else {
                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc";
                }
            }

            function validarMail() {
                if (this.value.indexOf("@") > -1) {
                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc";
                } else {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Debe tener al menos una @";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                }
            }

            function calcularMontos(event) {
                event.preventDefault();

                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var totalPagar =
                    boletosDia * 30 + boletos2Dias * 45 + boletoCompleto * 50;

                var listadoProductos = [];

                if (boletosDia >= 1) {
                    listadoProductos.push(boletosDia + " Pases por día");
                }
                if (boletos2Dias >= 1) {
                    listadoProductos.push(boletos2Dias + " Pases por 2 días");
                }
                if (boletoCompleto >= 1) {
                    listadoProductos.push(boletoCompleto + " Pases Completos");
                }

                lista_productos.style.display = "block";
                lista_productos.innerHTML = "";
                for (var i = 0; i < listadoProductos.length; i++) {
                    lista_productos.innerHTML += listadoProductos[i] + "<br/>";
                }
                suma.innerHTML = "$ " + totalPagar.toFixed(2);

                botonRegistro.disabled = false;
                document.getElementById("total_pedido").value = totalPagar;
            }
        }

        // Mapa
        if (document.getElementById("mapa")) {
            var map = L.map("mapa").setView([-12.047736, -75.198755], 16);

            L.tileLayer(
                "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            ).addTo(map);

            L.marker([-12.047736, -75.198755])
                .addTo(map)
                .bindPopup("Aplicación Congreso, 2021-07-01")
                .openPopup();
        }
    });

    $(function () {
        var windowHeight = $(window).height();
        var barraAltura = $(".barra").innerHeight();
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > windowHeight) {
                $(".barra").addClass("fixed");
                $("body").css({ "margin-top": barraAltura + "px" });
            } else {
                $(".barra").removeClass("fixed");
                $("body").css({ "margin-top": "0px" });
            }
        });

        // Programa de Conferencias
        $(".programa-evento .info-curso:first").show();
        $(".menu-programa a:first").addClass("activo");

        $(".menu-programa a").on("click", function () {
            $(".menu-programa a").removeClass("activo");
            $(this).addClass("activo");
            $(".ocultar").hide();
            var enlace = $(this).attr("href");
            $(enlace).fadeIn(1000);
            return false;
        });

        // Animaciones para Numeros

        var resumenLista = jQuery(".resumen-evento");
        if (resumenLista.length > 0) {
            $(".resumen-evento").waypoint(
                function () {
                    $(".resumen-evento li:nth-child(1) p").animateNumber(
                        { number: 6 },
                        1200
                    );
                    $(".resumen-evento li:nth-child(2) p").animateNumber(
                        { number: 15 },
                        1200
                    );
                    $(".resumen-evento li:nth-child(3) p").animateNumber(
                        { number: 3 },
                        1500
                    );
                    $(".resumen-evento li:nth-child(4) p").animateNumber(
                        { number: 9 },
                        1500
                    );
                },
                {
                    offset: "60%",
                }
            );
        }

        // Cuenta Regresiva

        $(".cuenta-regresiva").countdown(
            "2021/07/01 09:00:00",
            function (event) {
                $("#dias").html(event.strftime("%D"));
                $("#horas").html(event.strftime("%H"));
                $("#minutos").html(event.strftime("%M"));
                $("#segundos").html(event.strftime("%S"));
            }
        );

        // Menu Responsive

        $(".menu-movil").on("click", function () {
            $(".navegacion-principal").slideToggle();
        });

        //Color Box

        $(".invitado-info").colorbox({ inline: true, width: "50%" });
        $(".boton_newsletter").colorbox({ inline: true, width: "50%" });

        // Agregar clase a menu

        $(
            'body.conferencia .navegacion-principal a:contains("Conferencia")'
        ).addClass("activo");

        $(
            'body.calendario .navegacion-principal a:contains("Calendario")'
        ).addClass("activo");

        $(
            'body.invitados .navegacion-principal a:contains("Invitados")'
        ).addClass("activo");
    });
})();
