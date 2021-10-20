<template>
  <layout ref="layout">
    <div class="slot_body" slot="component-view">
      <div class="content" style="display: block">
        <div class="card">
          <headerClose :title="'MIS DATOS PERSONALES'"></headerClose>
          <div class="card-title">INFORMACIÓN DE USUARIO</div>
          <div class="card-body card-block">
            <div class="text-left">
              <button
                class="btn btn-action btn-icon-split"
                id="btnEditarDatos"
                @click="ModoEditar"
                :disabled="frmDatosUsuario.modo == 'EDITAR'"
              >
                <span class="icon text-white-50">
                  <i class="fas fa-edit" style="color: white"></i>
                </span>
                <span class="text font-size-layout">Editar datos</span>
              </button>
            </div>
            <br />
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label for="inpdni" class="form-control-label label-title"
                  >DNI</label
                >
                <input
                  type="text"
                  class="form-control center"
                  style="max-width: 200px"
                  id="inpdni"
                  v-model="frmDatosUsuario.dni"
                  :disabled="true"
                />
              </div>
              <div class="form-group col-sm-4">
                <label for="inpUsuario" class="form-control-label label-title"
                  >USUARIO</label
                >
                <input
                  type="text"
                  id="inpUsuario"
                  name="usuario"
                  class="form-control center"
                  style="max-width: 200px"
                  v-model="frmDatosUsuario.usuario"
                  :disabled="true"
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div
                  v-if="submited && !$v.frmDatosUsuario.usuario.required"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label
                  for="dtpFechaNacimiento"
                  class="form-control-label label-title"
                  >FECHA NACIMIENTO</label
                >
                <input
                  type="date"
                  id="dtpFechaNacimiento"
                  name="fechaNacimiento"
                  class="form-control center"
                  style="max-width: 200px"
                  v-model="frmDatosUsuario.fechaNacimiento"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div
                  v-if="
                    submited && !$v.frmDatosUsuario.fechaNacimiento.required
                  "
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label
                  for="inpApellidoPaterno"
                  class="form-control-label label-title"
                  >AP. PATERNO</label
                >
                <textarea
                  type="text"
                  class="form-control"
                  style="max-width: 300px"
                  id="inpApellidoPaterno"
                  name="apellidoPaterno"
                  v-model="frmDatosUsuario.apellidoPaterno"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                ></textarea>
                <div
                  v-if="
                    submited && !$v.frmDatosUsuario.apellidoPaterno.required
                  "
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label
                  for="inpApellidoMaterno"
                  class="form-control-label label-title"
                  >AP. MATERNO</label
                >
                <textarea
                  type="text"
                  class="form-control"
                  style="max-width: 300px"
                  id="inpApellidoMaterno"
                  name="apellidoMaterno"
                  v-model="frmDatosUsuario.apellidoMaterno"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                ></textarea>
                <div
                  v-if="
                    submited && !$v.frmDatosUsuario.apellidoMaterno.required
                  "
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label for="inpNombre" class="form-control-label label-title"
                  >NOMBRES</label
                >
                <textarea
                  type="text"
                  class="form-control"
                  style="max-width: 300px"
                  id="inpNombre"
                  name="nombres"
                  v-model="frmDatosUsuario.nombres"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                ></textarea>
                <div
                  v-if="submited && !$v.frmDatosUsuario.nombres.required"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label for="slcGenero" class="form-control-label label-title"
                  >GÉNERO</label
                >
                <select
                  class="form-control center"
                  style="max-width: 200px"
                  id="slcGenero"
                  name="genero"
                  v-model="frmDatosUsuario.sexo"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <option value="0">Seleccione...</option>
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
                </select>
                <div
                  v-if="submited && !$v.frmDatosUsuario.sexo.noZero"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label for="txtDireccion" class="form-control-label label-title"
                  >DIRECCIÓN</label
                >
                <textarea
                  type="text"
                  id="txtDireccion"
                  style="max-width: 300px"
                  name="direccion"
                  class="form-control"
                  v-model="frmDatosUsuario.direccion"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                ></textarea>
                <div
                  v-if="submited && !$v.frmDatosUsuario.direccion.required"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-sm-4">
                <label
                  for="slcDepartamentos"
                  class="form-control-label label-title"
                  >DEPARTAMENTO</label
                >
                <select
                  type="text"
                  class="form-control center"
                  style="max-width: 300px"
                  id="slcDepartamentos"
                  name="departamento"
                  @change="FiltrarProvincias"
                  v-model="frmDatosUsuario.id_departamento"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <option value="0">Seleccione...</option>
                  <option
                    v-for="departamento in departamentos"
                    :key="departamento.id"
                    :value="departamento.id"
                  >
                    {{ departamento.name }}
                  </option>
                </select>
                <div
                  v-if="submited && !$v.frmDatosUsuario.id_departamento.noZero"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label
                  for="slcProvincias"
                  class="form-control-label label-title"
                  >PROVINCIA</label
                >
                <select
                  type="text"
                  class="form-control center"
                  style="max-width: 300px"
                  id="slcProvincias"
                  name="provincia"
                  @change="FiltrarDistritos"
                  v-model="frmDatosUsuario.id_provincia"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <option value="0">Seleccione...</option>
                  <option
                    v-for="provincia in provincias_filtradas"
                    :key="provincia.id"
                    :value="provincia.id"
                  >
                    {{ provincia.name }}
                  </option>
                </select>
                <div
                  v-if="submited && !$v.frmDatosUsuario.id_provincia.noZero"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label for="slcDistritos" class="form-control-label label-title"
                  >DISTRITO</label
                >
                <select
                  type="text"
                  class="form-control center"
                  style="max-width: 300px"
                  id="slcDistritos"
                  name="distrito"
                  v-model="frmDatosUsuario.id_distrito"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <option value="0">Seleccione...</option>
                  <option
                    v-for="distrito in distritos_filtrados"
                    :key="distrito.id"
                    :value="distrito.id"
                  >
                    {{ distrito.name }}
                  </option>
                </select>
                <div
                  v-if="submited && !$v.frmDatosUsuario.id_distrito.noZero"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label for="text-input" class="form-control-label label-title"
                  >TELÉFONO</label
                >
                <input
                  type="number"
                  class="form-control center"
                  style="max-width: 200px"
                  maxlength="9"
                  id="inpTelefono"
                  name="telefono"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  v-model="frmDatosUsuario.telefono"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div
                  v-if="submited && !$v.frmDatosUsuario.telefono.required"
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label for="text-input" class="form-control-label label-title"
                  >CORREO</label
                >
                <input
                  type="text"
                  id="inpCorreo_principal"
                  name="correoPrincipal"
                  class="form-control"
                  style="max-width: 500px"
                  v-model="frmDatosUsuario.correoPrincipal"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div
                  v-if="
                    submited && !$v.frmDatosUsuario.correoPrincipal.required
                  "
                  style="color: red; font-size: 12px"
                >
                  *Campo obligatorio
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label for="inpAgencia" class="form-control-label label-title"
                  >AGENCIA</label
                >
                <input
                  type="text"
                  class="form-control center"
                  style="max-width: 300px"
                  id="inpAgencia"
                  name="agencia"
                  v-model="frmDatosUsuario.nombre_agencia"
                  :disabled="true"
                />
              </div>
              <div class="form-group col-sm-4">
                <label for="inpCargo" class="form-control-label label-title"
                  >CARGO</label
                >
                <input
                  type="text"
                  class="form-control"
                  style="max-width: 500px"
                  id="inpCargo"
                  name="cargo"
                  v-model="frmDatosUsuario.nombre_cargo"
                  :disabled="true"
                />
              </div>
            </div>
            <br />
            <div class="text-center">
              <div class="btn-group" role="group">
                <button
                  class="btn btn-action btn-icon-split"
                  id="btnGuardarCambios"
                  @click="GuardarCambios"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <span class="icon text-white-50">
                    <i class="fas fa-save" style="color: white"></i>
                  </span>
                  <span class="text font-size-layout">Guardar</span>
                </button>

                <button
                  class="btn btn-cancel btn-icon-split"
                  id="btnCancelar"
                  @click="CancelarCambios"
                  :disabled="frmDatosUsuario.modo == 'VISTA'"
                >
                  <span class="icon text-white-50">
                    <i class="fas fa-times" style="color: white"></i>
                  </span>
                  <span class="text font-size-layout">Cancelar</span>
                </button>
              </div>
            </div>
          </div>

          <div class="card-title">HORARIO ASIGNADO</div>
          <div class="card-body card-block">
            <table class="table table-hover" id="tblHorarioAsignado">
              <thead>
                <tr>
                  <th style="width: 70px !important">NOMBRE HORARIO</th>
                  <th>INGRESO MAÑANA<br />(L-V)</th>
                  <th>SALIDA MAÑANA<br />(L-V)</th>
                  <th>INGRESO TARDE<br />(L-V)</th>
                  <th>SALIDA TARDE<br />(L-V)</th>
                  <th>INGRESO MAÑANA<br />(SAB)</th>
                  <th>SALIDA MAÑANA<br />(SAB)</th>
                  <th>TOLERANCIA HORARIO</th>
                  <th>TOLERANCIA PERSONAL</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].nombre_horario }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_entrada_maniana }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_salida_maniana }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_entrada_tarde }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_salida_tarde }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_entrada_maniana_s }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].hora_salida_maniana_s }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].toleranciaHorario }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ mi_usuario[0].toleranciaPersonal }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import layout from "./../Components/layout_gth";
import headerClose from "./../Components/header_close";
import { required } from "vuelidate/lib/validators";
const diferentThanZero = (value) => value != 0;
export default {
  components: { layout, headerClose },
  props: {
    mi_usuario: Array,
    distritos: Array,
    provincias: Array,
    departamentos: Array,
  },
  data() {
    return {
      submited: false,
      distritos_filtrados: this.distritos,
      provincias_filtradas: this.provincias,
      frmDatosUsuario: {
        modo: "VISTA",
        dni: this.mi_usuario[0].dni,
        usuario: this.mi_usuario[0].usuario,
        nombres: this.mi_usuario[0].nombres,
        apellidoPaterno: this.mi_usuario[0].apellidoPaterno,
        apellidoMaterno: this.mi_usuario[0].apellidoMaterno,
        sexo: this.mi_usuario[0].sexo,
        direccion: this.mi_usuario[0].direccion,
        id_distrito: this.mi_usuario[0].id_distrito,
        id_provincia: this.mi_usuario[0].id_provincia,
        id_departamento: this.mi_usuario[0].id_departamento,
        fechaNacimiento: this.mi_usuario[0].fechaNacimiento,
        telefono: this.mi_usuario[0].telefono,
        correoPrincipal: this.mi_usuario[0].correoPrincipal,
        nombre_cargo: this.mi_usuario[0].nombre_cargo,
        nombre_agencia: this.mi_usuario[0].nombre_agencia,
      },
    };
  },
  validations: {
    frmDatosUsuario: {
      usuario: { required },
      nombres: { required },
      apellidoPaterno: { required },
      apellidoMaterno: { required },
      sexo: { noZero: diferentThanZero },
      direccion: { required },
      id_distrito: { noZero: diferentThanZero },
      id_provincia: { noZero: diferentThanZero },
      id_departamento: { noZero: diferentThanZero },
      fechaNacimiento: { required },
      telefono: { required },
      correoPrincipal: { required },
    },
  },
  mounted() {
    self = this;
    if (screen.width < 1000) {
      $("#tblHorarioAsignado").addClass("table-responsive");
    }

    this.provincias_filtradas = this.provincias.filter(
      (item) => item.department_id == self.frmDatosUsuario.id_departamento
    );
    this.distritos_filtrados = this.distritos.filter(
      (item) => item.department_id == self.frmDatosUsuario.id_departamento
    );
  },
  methods: {
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    FiltrarProvincias(e) {
      let id_departamento = e.target.value;

      if (!id_departamento == 0) {
        this.provincias_filtradas = this.provincias.filter(
          (item) => item.department_id == id_departamento
        );
        this.distritos_filtrados = this.distritos.filter(
          (item) => item.department_id == id_departamento
        );
      } else {
        this.provincias_filtradas = this.provincias;
        this.distritos_filtrados = this.distritos;
      }

      this.frmDatosUsuario.id_provincia = 0;
      this.frmDatosUsuario.id_distrito = 0;
    },
    FiltrarDistritos(e) {
      let id_provincia = e.target.value;

      if (!id_provincia == 0) {
        this.distritos_filtrados = this.distritos.filter(
          (item) => item.province_id == id_provincia
        );
      } else {
        this.distritos_filtrados = this.distritos;
      }

      this.frmDatosUsuario.id_distrito = 0;
    },
    ModoEditar() {
      this.frmDatosUsuario.modo = "EDITAR";
    },
    GuardarCambios() {
      let self = this;
      this.submited = true;
      if (this.$v.frmDatosUsuario.$invalid) {
        return false;
      } else {
        axios
          .post(route("mis_datos_personales.verificar"), {
            usuario: self.frmDatosUsuario.usuario,
          })
          .then(function (response) {
            let resultado = response.data;
            if (resultado == "INCORRECTO") {
              Swal.fire({
                icon: "error",
                title: "¡Ups!",
                text: "El USUARIO ingresado, ya está registrado, intente nuevamente.",
              });
              return false;
            } else if (resultado == "CORRECTO") {
              Swal.fire({
                title: "GUARDAR CAMBIOS",
                text: "¿Desea continuar?",
                confirmButtonText:
                  '<i class="fas fa-check" style="color:white;"></i>   Si',
                confirmButtonColor: "var(--colorAlto)",
                showCancelButton: true,
                cancelButtonText: '<i class="fas fa-times"></i>   No',
                cancelButtonColor: "var(--plomoOscuroEmpresarial)",
                allowOutsideClick: false,
                preConfirm: (result) => {
                  axios
                    .post(
                      route("mis_datos_personales.guardar"),
                      self.frmDatosUsuario
                    )
                    .then(function (response) {
                      let resultado = response.data;
                      if (resultado == "EXITO") {
                        Swal.fire({
                          icon: "success",
                          title: "¡EXITO!",
                          text: "Información registrada",
                          allowOutsideClick: false,
                          preConfirm: (result) => {
                            self.$inertia.get(
                              route("mi_panel_gth.mis_datos_personales")
                            );
                          },
                        });
                      } else {
                        Swal.fire({
                          icon: "error",
                          title: "¡Ups!",
                          text: "Algo salió mal",
                        });
                      }
                    });
                },
              });
            }
          });
      }
    },
    CancelarCambios() {
      this.frmDatosUsuario.modo = "VISTA";
    },
  },
};
</script>

<style>
</style>
