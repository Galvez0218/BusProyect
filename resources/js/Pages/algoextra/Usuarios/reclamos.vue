<template>
  <layout ref="layout">
    <div class="slot_body" slot="component-view">
      <div class="content" style="display: block">
        <div class="card">
          <headerClose :title="'RECLAMOS'"></headerClose>
          <div class="card-title">LISTA DE RESULTADOS</div>
          <div class="card-body card-block">
            <div class="text-center">
              <button class="btn btn-action btn-icon-split mb-1" @click="NuevoTipo()">
                <span class="icon text-white-50">
                  <i class="fas fa-plus" style="color: white"></i>
                </span>
                <span class="text font-size-layout">Nuevo</span>
              </button>
            </div>
            <br />
            <div id="search-content_ts">
              <div class="input-group row col-md-3 mb-1 input-search" id="s_content_te">
                <input
                  class="form-control"
                  type="text"
                  id="inpBuscar_ts"
                  placeholder="Buscar..."
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div class="input-group-append">
                  <button class="btn btn-action" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>

            <div id="tabla_tipo_suministros">
              <table class="table table-hover" id="t_reclamos">
                <thead>
                  <tr>
                    <th style="width: 70px !important">EDITAR</th>
                    <th>RECLAMOS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="reclamo in reclamos" :key="reclamo.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarTipo(reclamo)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{ reclamo.reclamos }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <br />
            <br />
          </div>
        </div>
      </div>

      <!-- The Modal -->
      <div id="modalRegistrarReclamos" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="content" style="display: block">
            <div class="card">
              <div class="card-header">
                <div id="c_titulo">
                  <strong id="title">{{ title_modal }}</strong>
                </div>
              </div>
              <div class="card-title">DATOS</div>
              <div class="card-body card-block">
                <form @submit.prevent="GuardarTipo">
                  <input
                    type="text"
                    id="txtModo"
                    name="modo"
                    v-model="frmRegistrarReclamos.modo"
                    hidden
                  />
                  <input
                    type="text"
                    id="txtIdTipoSuministro"
                    name="id_tipo_suministro"
                    v-model="frmRegistrarReclamos.id"
                    hidden
                  />
                  <div class="form-row">
                    <div class="form-group col-sm-6">
                      <label for="txtNombreTipo" class="form-control-label label-title"
                        >Reclamo</label
                      >
                      <textarea
                        type="text"
                        class="form-control"
                        rows="1"
                        style="max-width: 400px"
                        maxlength="1000"
                        id="txtNombreTipo"
                        name="nombre_tipo"
                        v-model="frmRegistrarReclamos.reclamo"
                      ></textarea>
                      <div
                        v-if="submited && !$v.frmRegistrarReclamos.reclamo.required"
                        style="color: red; font-size: 12px"
                      >
                        *Campo obligatorio
                      </div>
                    </div>
                
                  </div>
                </form>
                <hr />
                <div class="text-right">
                  <button
                    class="btn btn-action btn-icon-split mb-1"
                    id="btnGuardarCambios"
                    @click="GuardarTipo()"
                  >
                    <span class="icon text-white-50">
                      <i class="fas fa-save" style="color: white"></i>
                    </span>
                    <span class="text">Guardar</span>
                  </button>
                  <button class="btn btn-cancel btn-icon-split mb-1" id="btnCancelar">
                    <span class="icon text-white-50">
                      <i class="fas fa-times" style="color: white"></i>
                    </span>
                    <span class="text" style="color: white">Cancelar</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import { required } from "vuelidate/lib/validators";
import layout from "./../Components/layout_gth";
import headerClose from "./../Components/header_close";
export default {
  components: {
    layout,
    headerClose,
  },

  props: {
    reclamos: Array,
  },

  data() {
    return {
      submited: false,
      title_modal: "NUEVO RECLAMO",
      frmRegistrarReclamos: {
        modo: "",
        id: "",
        reclamo: "",
        dni: "",
      },
    };
  },

  validations: {
    frmRegistrarReclamos: {
      reclamo: { required },
    },
  },

  mounted() {
    this.TablaTipoSuministros();

    var elemento = document.getElementById("t_reclamos");
    if (elemento != null) {
      if (screen.width < 1000) {
        elemento.classList.add("table-responsive");
      }
    }
  },

  watch: {
    tipos() {
      $("#t_reclamos").DataTable().destroy();
      this.TablaTipoSuministros();
    },
  },

  methods: {
    TablaTipoSuministros() {
      this.$nextTick(() => {
        var table = $("#t_reclamos").DataTable({
          scrollY: "350px",
          scrollCollapse: true,
          paging: false,
          order: [[1, "asc"]],
          fixedHeader: true,
          language: {
            retrieve: true,
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
            infoEmpty: "No se encontraron registros",
            infoFiltered: "(filtrado de _MAX_ registros)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Agrupar por _MENU_ filas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros",
            paginate: {
              first: "Primera",
              last: "Ultima",
              next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
              previous:
                '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
            },
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,
          dom:
            '<"top"Bf>rt<"row"<"col-sm-12 col-md-5 mb-2"i><"col-sm-12 col-md-7 mb-2"p><"col-sm-12 col-md-5 mb-2"l>><"clear">',
          buttons: [
            {
              extend: "excelHtml5",
              text: '<i class="fas fa-file-excel"></i> ',
              titleAttr: "Exportar a Excel",
              className: "btn btn-action",
            },
            {
              extend: "pdfHtml5",
              text: '<i class="fas fa-file-pdf"></i> ',
              titleAttr: "Exportar a PDF",
              className: "btn btn-cancel",
            },
            {
              extend: "print",
              text: '<i class="fa fa-print"></i> ',
              titleAttr: "Imprimir",
              className: "btn btn-action",
            },
          ],
        });

        $("#inpBuscar_ts").keyup(function () {
          table.search(this.value).draw();
        });
      });
    },
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    EditarTipo(reclamo) {
      this.submited = false;
      this.title_modal = "EDITAR RECLAMO";
      this.frmRegistrarReclamos.id = reclamo.id;
      this.frmRegistrarReclamos.nombre_tipo = reclamo.nombre_tipo;
      this.frmRegistrarReclamos.dni = this.$inertia.page.props.user_session.dni_registrado;
      this.frmRegistrarReclamos.modo = "EDITAR";

      document.getElementById("modalRegistrarReclamos").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRegistrarReclamos").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display = "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    NuevoTipo() {
      this.submited = false;
      this.title_modal = "NUEVA RECLAMO";
      this.frmRegistrarReclamos.id = 0;
      this.frmRegistrarReclamos.reclamos = "";
      this.frmRegistrarReclamos.dni = this.$inertia.page.props.user_session.dni_registrado;
      this.frmRegistrarReclamos.modo = "NUEVO";

      document.getElementById("modalRegistrarReclamos").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRegistrarReclamos").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display = "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },

    GuardarTipo() {
        console.log("ingrese");
      this.submited = true;
      if (this.$v.$invalid) {
        return false;
      } else {
        let params = Object.assign({}, this.frmRegistrarReclamos);
        var self = this;
              Swal.fire({
                title: "GUARDAR CAMBIOS",
                text: "¿Desea continuar?",
                confirmButtonText:
                  '<i class="fas fa-check" style="color:white;"></i>   Si',
                confirmButtonColor: "#17a673",
                showCancelButton: true,
                cancelButtonText: '<i class="fas fa-times"></i>   No',
                cancelButtonColor: "var(--plomoOscuroEmpresarial)",
                allowOutsideClick: false,
                preConfirm: (result) => {
                  self.$inertia.post(route("reclamo.guardar"), self.frmRegistrarReclamos, {
                    preserveScroll: true,
                    onStart: (visit) => {
                      let timerInterval;
                      Swal.fire({
                        title: "ESPERE POR FAVOR...",
                        timer: 5000,
                        allowOutsideClick: false,
                        timerProgressBar: true,
                        didOpen: () => {
                          Swal.showLoading();
                          timerInterval = setInterval(() => {
                            const content = Swal.getContent();
                            if (content) {
                              const b = content.querySelector("b");
                              if (b) {
                                b.textContent = Swal.getTimerLeft();
                              }
                            }
                          }, 100);
                        },
                        willClose: () => {
                          clearInterval(timerInterval);
                        },
                      });
                    },
                    onSuccess: () => {
                      Swal.fire({
                        icon: "success",
                        title: "¡ÉXITO!",
                        text: "RECLAMO REGISTRADO",
                        allowOutsideClick: false,
                        preConfirm: (result) => {
                          $("#modalRegistrarReclamos").css("display", "none");
                        },
                      });
                    },
                  });
                },
              });
           
      }
    },
  },
};
</script>

<style></style>
