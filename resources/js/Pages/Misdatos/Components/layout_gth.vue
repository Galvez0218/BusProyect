<template>
  <div style="height: 100% !important">
    <div class="container">
      <inertia-link class="logo-system" :href="$route('menu.index')"
        ><img :src="'/images/general/logo-blanco.svg'" alt="Logo" width="180px"
      /></inertia-link>

      <!-- <nav>
        <div class="nav-fostrap text-left always-over" id="navbar-responsive">
          <ul>
            <li>
              <a href="javascript:void(0)"
                >Usuarios<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('usuarios_gestion')"
                    >Gestión</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('usuarios_horarios')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/HORARIOS DEL PERSONAL'
                      )
                    "
                    >Horarios de personal</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('usuarios_cesados')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/CESADOS'
                      )
                    "
                    >Cesados</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('#')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS DATOS PERSONALES'
                      )
                    "
                    >Mis datos personales</inertia-link
                  >
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)"
                >Marcaje<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('asistencias')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/ASISTENCIAS'
                      )
                    "
                    >Asistencias</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('tardanzas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/TARDANZAS'
                      )
                    "
                    >Tardanzas</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('faltas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/FALTAS'
                      )
                    "
                    >Faltas</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('justificaciones')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/JUSTIFICACIONES'
                      )
                    "
                    >Justificaciones</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('us_as.general')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/REPORTE GENERAL'
                      )
                    "
                    >General</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.mis_asistencias')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS ASISTENCIAS'
                      )
                    "
                    >Mis asistencias</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.mis_tardanzas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS TARDANZAS'
                      )
                    "
                    >Mis tardanzas</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.mis_faltas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS FALTAS'
                      )
                    "
                    >Mis faltas</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.mis_justificaciones')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS JUSTIFICACIONES'
                      )
                    "
                    >Mis justificaciones</inertia-link
                  >
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)"
                >Colaborador del mes<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.lista_preguntas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/LISTA DE PREGUNTAS'
                      )
                    "
                    >Lista de preguntas</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.lista_categorias')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/LISTA DE CATEGORIAS'
                      )
                    "
                    >Lista de categorías</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.lista_equipos')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/LISTA DE EQUIPOS'
                      )
                    "
                    >Lista de equipos</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.integrantes_equipo')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/INTEGRANTES DE EQUIPO'
                      )
                    "
                    >Integrantes de equipo</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.crear_examen')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/CREAR EXAMEN'
                      )
                    "
                    >Crear examen</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.examenes_disponibles')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/EXAMENES DISPONIBLES'
                      )
                    "
                    >Examenes disponibles</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('colaborador_mes.asignar_evaluacion')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'COLABORADOR DEL MES/ASIGNAR EVALUACIÓN'
                      )
                    "
                    >Asignar evaluación</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.mis_evaluaciones_pendientes')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'MI PANEL GTH/MIS EVALUACIONES PENDIENTES'
                      )
                    "
                    >Mis eval. pendientes</inertia-link
                  >
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)"
                >Planillas<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('planillas.datos_usuarios')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/DATOS USUARIOS'
                      )
                    "
                    >Datos Usuarios</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    href="/gth/planillas/vacaciones"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/ASIGNAR VACACIONES'
                      )
                    "
                    >Vacaciones</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('planillas.planilla_general')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/PLANILLA GENERAL'
                      )
                    "
                    >Planilla General
                  </inertia-link>
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('planillas.historial_vacaciones')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/HISTORIAL DE VACACIONES'
                      )
                    "
                    >Historial Vacaciones</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('planillas.historial_planillas')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/HISTORIAL PLANILLA'
                      )
                    "
                    >Historial Planillas</inertia-link
                  >
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0)"
                >Mantenimiento<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('horarios')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'USUARIOS Y ASISTENCIA/GESTIÓN DE HORARIOS'
                      )
                    "
                    >Gestión de horarios</inertia-link
                  >
                </li>
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('planillas.sistema_pensiones')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'PLANILLAS/SISTEMA DE PENSIONES'
                      )
                    "
                    >Sistema de Pensiones</inertia-link
                  >
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)"
                >Aplicación<span class="arrow-down"></span
              ></a>
              <ul class="dropdown text-left always-over">
                <li>
                  <inertia-link
                    class="collapse-item"
                    :href="$route('mi_panel_gth.cierre_dia')"
                    v-if="
                      $page.props.user_permissions.permisos.includes(
                        'APLICACIÓN-GTH/CIERRE DE DÍA'
                      )
                    "
                    >Cierre de día</inertia-link
                  >
                </li>
              </ul>
            </li>

            <li>
              <a href="/home">Salir</a>
            </li>
          </ul>
        </div>
        <div class="nav-bg-fostrap always-over">
          <div class="navbar-fostrap">
            <span></span> <span></span> <span></span>
          </div>
          <inertia-link class="title-mobile" :href="$route('cre.index')"
            ><img
              :src="'/images/general/logo-blanco.svg'"
              alt="Logo"
              width="120px"
          /></inertia-link>
        </div>
      </nav> -->
    </div>

    <div class="slot-content">
      <slot name="component-view"></slot>
    </div>

    <!-- Footer -->
    <!-- <footer class="text-center text-lg-start" id="footer-navigator">
      <div class="text-right p-1 footer-text">
        <span
          >{{ $page.props.user_session.nombres }}/
          {{ $page.props.user_session.usuario }}
        </span>

        <span class="ml-3">
          {{ $page.props.user_session.nombre_cargo }}
        </span>

        <span class="ml-3 text-white">{{ fecha_actual }}</span>

        <span class="ml-3">
          {{
            $page.props.user_session.dispositivo.tipo +
            " - " +
            $page.props.user_session.dispositivo.nombre
          }}
        </span>

        <span class="ml-3 text-white">
          {{ $page.props.application.version[0].numeroVersion }}
        </span>

        <span class="ml-3 mr-3" style="text-transform: uppercase">
          .::AGENCIA {{ $page.props.user_session.nombre_agencia }}::.
        </span>
      </div>
    </footer> -->
    <!-- Footer -->
  </div>
</template>

<script>
// export default {
//   data() {
//     return { fecha_actual: null };
//   },
//   mounted() {
//     document.title = "Gth";
//     document.body.style.backgroundImage =
//       "url('/images/gth/fondo_principal.png')";

//     document.body.style.backgroundPosition = "center center";
//     document.body.style.backgroundRepeat = "repeat-yt";
//     document.body.style.backgroundAttachment = "fixed";
//     document.body.style.backgroundSize = "cover";
//     document.body.style.fontFamily = "Roboto, sans-serif";

//     let parts = this.$page.props.application.data
//       .filter(
//         (item) =>
//           item.descripcion == "FECHA_GTH" &&
//           item.id_agencia == this.$page.props.user_session.id_agencia
//       )[0]
//       .valorFecha.split("-");

//     let options = {
//       weekday: "long",
//       year: "numeric",
//       month: "long",
//       day: "numeric",
//     };

//     let date = new Date(+parts[0], parts[1] - 1, +parts[2]);

//     this.fecha_actual = date.toLocaleDateString("es-ES", options);

//     $(".navbar-fostrap").click(function () {
//       $(".nav-fostrap").toggleClass("visible");
//       $("body").toggleClass("cover-bg");
//     });

//     $(".slot-content").click(function () {
//       if ($("#navbar-responsive").hasClass("visible")) {
//         $("#navbar-responsive").removeClass("visible");
//         $("body").removeClass("cover-bg");
//       }
//     });

//     document.addEventListener("contextmenu", (event) => event.preventDefault());
//   },
//   methods: {
//     hide_nav() {
//       if (screen.width < 1000) {
//         parent.document.getElementById("footer-navigator").style.display =
//           "none";
//       }
//     },

//     show_nav() {
//       if (screen.width < 1000) {
//         parent.document.getElementById("footer-navigator").style.display =
//           "flex";
//       }
//     },
//     round(value, decimal_places) {
//       return parseFloat(value).toFixed(decimal_places);
//     },
//   },
// };
</script>

<style lang="css">
:root {
  --colorBajo: #feebda !important;
  --colorMedio: #f5ac6b !important;
  --colorAlto: #da7925 !important;
}
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}
body,
html {
  width: 100%;
  height: 100%;
}

body {
  font-size: 15px;
  color: #666;
}

.content {
  margin-left: 0px !important;
  height: 200px;
}

a {
  text-decoration: none;
}

a:link,
a:visited,
a:active {
  text-decoration: none;
}

.container {
  max-width: 80%;
  margin: 0 auto;
  width: 100%;
  margin-left: 20%;
}

.nav-fostrap {
  display: block;
  margin-bottom: 15px 0;

  background: var(--colorAlto);
  -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -ms-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -o-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  border-bottom-left-radius: 20px;

  width: 100%;
}

.nav-fostrap ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: block;
}

.nav-fostrap li {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: inline-block;
  position: relative;
  font-size: 14;
  color: white;
}

.nav-fostrap li a {
  padding: 15px 20px;
  font-size: 14;
  color: white;
  display: inline-block;
  outline: 0;
  font-weight: 400;
}

.nav-fostrap li:hover ul.dropdown {
  display: block;
}

.nav-fostrap li ul.dropdown {
  position: absolute;
  display: none;
  width: 280px;
  background: var(--colorAlto);

  -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -ms-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  -o-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  padding-top: 0;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.nav-fostrap li ul.dropdown li {
  display: block;
  list-style-type: none;
}

.nav-fostrap li ul.dropdown li a {
  padding: 8px 15px;
  font-size: 15px;
  color: var(--plomoOscuroEmpresarial);
  display: block;
  font-weight: 400;
}

.nav-fostrap li ul.dropdown li:last-child a {
  border-bottom: none;
}

.nav-fostrap li:hover a {
  background: white;
  color: var(--colorAlto);
}

.nav-fostrap li:first-child:hover a {
  border-radius: 3px 0 0 3px;
}

.nav-fostrap li ul.dropdown li:hover a {
  background: var(--plomoOscuroEmpresarial);
  color: white !important;
}

.nav-fostrap li ul.dropdown li:first-child:hover a {
  border-radius: 0;
}

.nav-fostrap li:hover .arrow-down {
  border-top: 5px solid var(--colorAlto);
}

.arrow-down {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #def1f0;
  position: relative;
  top: 15px;
  right: -5px;
  content: "";
}

.title-mobile {
  display: none;
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
}

footer {
  position: absolute;
  bottom: 0;
  width: 90%;
  border-top-right-radius: 20px;

  color: white;
}

.footer-text {
  border-top-right-radius: 20px;
  background: var(--plomoOscuroEmpresarial);
  font-size: 0.7rem;
  color: var(--colorAlto);
  font-weight: bolder;
}

.logo-system {
  position: absolute;
  top: 10px;
  left: 5%;
}

.modal-content {
  top: 8% !important;
}

.slot-content {
  position: relative;
  overflow-x: hidden;
}

.slot-content::-webkit-scrollbar {
  width: 0.5rem;
}

.slot-content::-webkit-scrollbar-track {
  background: transparent;
}

.slot-content::-webkit-scrollbar-thumb {
  background: var(--plomoOscuroEmpresarial);
  border-radius: 5px;
}

.slot-content::-webkit-scrollbar-thumb:active {
  background: var(--plomoOscuroEmpresarial);
}

.always-over {
  z-index: 20 !important;
}

.slot_body {
  width: 80% !important;

  margin-top: 2%;
  margin-left: 10%;
  z-index: 2 !important;
}

.slot-content {
  overflow-y: scroll;
  height: 85%;
}

body.swal2-height-auto {
  height: 100% !important;
}

td:hover {
  background-color: #c3e2ff;
}

@media only screen and (max-width: 900px) {
  .nav-fostrap {
    background: #fff;
    opacity: 0.95;
    width: 300px;
    height: 80% !important;
    top: 10% !important;
    display: block;
    position: fixed;
    left: -300px;
    top: 0px;
    -webkit-transition: left 0.25s ease;
    -moz-transition: left 0.25s ease;
    -ms-transition: left 0.25s ease;
    -o-transition: left 0.25s ease;
    transition: left 0.25s ease;
    margin: 0;
    border: 0;
    border-radius: 0;
    overflow-y: auto;
    overflow-x: hidden;
    height: 100%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
  }

  .title-mobile {
    position: fixed;
    display: block;
    top: 10px;
    left: 100px;
    right: 100px;
    text-align: center;
  }

  .nav-fostrap.visible {
    left: 0px;
    -webkit-transition: left 0.25s ease;
    -moz-transition: left 0.25s ease;
    -ms-transition: left 0.25s ease;
    -o-transition: left 0.25s ease;
    transition: left 0.25s ease;
  }

  .nav-bg-fostrap {
    display: inline-block;
    vertical-align: middle;
    width: 100%;
    height: 50px;
    margin: 0;
    position: absolute;
    top: 0px;
    left: 0px;
    background: var(--colorAlto);
    padding: 12px 0 0 10px;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    -ms-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    -o-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
  }

  .navbar-fostrap {
    display: inline-block;
    vertical-align: middle;
    height: 50px;
    cursor: pointer;
    margin: 0;
    position: absolute;
    top: 0;
    left: 0;
    padding: 12px;
  }

  .navbar-fostrap span {
    height: 2px;
    background: #fff;
    margin: 5px;
    display: block;
    width: 20px;
  }

  .navbar-fostrap span:nth-child(2) {
    width: 20px;
  }

  .navbar-fostrap span:nth-child(3) {
    width: 20px;
  }

  .nav-fostrap ul {
    padding-top: 20px;
  }

  .nav-fostrap li {
    display: block;
  }

  .nav-fostrap li a {
    display: block;
    color: #505050;
    font-weight: 600;
  }

  .nav-fostrap li:first-child:hover a {
    border-radius: 0;
  }

  .nav-fostrap li ul.dropdown {
    position: relative;
  }

  .nav-fostrap li ul.dropdown li a {
    background: white !important;
    border-bottom: none;
    color: var(--plomoOscuroEmpresarial) !important;
  }

  .nav-fostrap li:hover a {
    background: var(--colorAlto);
    color: #fff !important;
  }

  .nav-fostrap li ul.dropdown li:hover a {
    background: var(--plomoOscuroEmpresarial) !important;
    color: #fff !important;
  }

  .nav-fostrap li ul.dropdown li a {
    padding: 5px 5px 5px 30px;
  }

  .nav-fostrap li:hover .arrow-down {
    border-top: 5px solid #fff;
  }

  .arrow-down {
    border-top: 5px solid #505050;
    position: absolute;
    top: 20px;
    right: 10px;
  }

  .cover-bg {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
  }

  .logo-system {
    display: none;
  }

  .footer-text {
    font-size: 8px;
  }

  .slot_body {
    width: 97% !important;
    margin-top: 60px;
    margin-left: 2%;
  }

  .slot-content {
    overflow-y: scroll;
    overflow-x: scroll;
    height: 92%;
  }

  .modal-content {
    top: 0 !important;
  }
}

@media only screen and (max-width: 1199px) {
  .container {
    width: 96%;
  }
}
</style>
