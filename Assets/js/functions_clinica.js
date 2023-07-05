let TableUltimasHistorias;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener(
  "DOMContentLoaded",
  function () {
    fntCreateConsulta();
    fntCreateVacuna();
    fntCreateAnalisis()
    loadTable();
  },
  false
);

window.addEventListener(
  "load",
  function () {
    fntClientes();
  },
  false
);

function loadTable() {
  TableUltimasHistorias = $("#table_Ultimas_Historias").DataTable({
      "aProcessing":true,
      "aServerSide":true,
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      "ajax":{
          "url": " "+ base_url +"/Clinica/getClinicaPrueba",
          "dataSrc":""
      },
      "columns":[
          {"data":"idhistorial"},
          {"data":"nombre"},
          {"data":"especie"},
          {"data":"d_nombre"},
          {"data":"apellidos"},
          {"data":"identificacion"},
          {"data":"ver"}
      ],
      "resonsieve":"true",
      "bDestroy": true,
      "iDisplayLength": 10,
      "order":[[0,"desc"]]  
  });
}
// =============================== FOMULARIOS ================================== //
// Crea formularios para Consulta - vacuna - Analisis
function fntCreateConsulta() {
  if (document.querySelector("#formConsulta")) {
    let formConsulta = document.querySelector("#formConsulta");
    formConsulta.onsubmit = function (e) {
      e.preventDefault();
      divLoading.style.display = "flex";
      let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Clinica/setConsulta"; // lo envia esta dirección
      let formData = new FormData(formConsulta);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            if (rowTable == "") {
              TableUltimasHistorias.ajax.reload();
            } else {
              loadTable();
              rowTable = "";
            }
            $("#modalClinicaConsulta").modal("hide");
            formConsulta.reset();
            swal("Mascotas", objData.msg, "success");
          } else {
            swal("Error", objData.msg, "error");
          }
        }
        divLoading.style.display = "none";
        return false;
      };
    };
  }
}
function fntCreateVacuna() {
  if (document.querySelector("#formVacuna")) {
    let formVacuna = document.querySelector("#formVacuna");
    formVacuna.onsubmit = function (e) {
      e.preventDefault();
      divLoading.style.display = "flex";
      //se envian los datos por medio de ajax
      let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Clinica/setVacuna"; // lo envia esta dirección
      let formData = new FormData(formVacuna);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            if (rowTable == "") {
              TableUltimasHistorias.ajax.reload();
            } else {
              loadTable();
              rowTable = "";
            }
            $("#modalClinicaVacuna").modal("hide");
            formVacuna.reset();
            swal("Vacunacion", objData.msg, "success");
          } else {
            swal("Error", objData.msg, "error");
          }
        }
        divLoading.style.display = "none";
        return false;
      };
    };
  }
}
function fntCreateAnalisis() {
  if (document.querySelector("#formAnalisis")) {
    let formAnalisis = document.querySelector("#formAnalisis");
    formAnalisis.onsubmit = function (e) {
      e.preventDefault();
      divLoading.style.display = "flex";
      //se envian los datos por medio de ajax
      let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Clinica/setAnalisis"; // lo envia esta dirección
      let formData = new FormData(formAnalisis);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            if (rowTable == "") {
              TableUltimasHistorias.ajax.reload();
            } else {
              // cargarTabla();
              rowTable = "";
            }
            $("#modalClinicaAnalisis").modal("hide");
            formAnalisis.reset();
            swal("Mascotas", objData.msg, "success");
          } else {
            swal("Error", objData.msg, "error");
          }
        }
        divLoading.style.display = "none";
        return false;
      };
    };
  }
}
// =============================== SOLO PARA TRAER DATOS================================== //
// Cargar Lista de clientes en Consulta - Vacuna - Analisis
function fntClientes() {
  if (document.querySelector("#listClientes")) {
    let ajaxUrl = base_url + "/Clientes/getSelectClientes";
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        document.querySelector("#listClientes").innerHTML =
          request.responseText;
        document.querySelector("#listClientes").value = 0;
        $("#listClientes").selectpicker("render");
        document.querySelector("#listClientes1").innerHTML =
          request.responseText;
        document.querySelector("#listClientes1").value = 0;
        $("#listClientes1").selectpicker("render");
        document.querySelector("#listClientes2").innerHTML =
          request.responseText;
        document.querySelector("#listClientes2").value = 0;
        $("#listClientes2").selectpicker("render");
      }
    };
  }
}
// Carga para el list de mascotas
function ftnCargarMascotas_consulta() {
  var idcliente = document.querySelector("#listClientes").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getSelectMascotas/" + idcliente;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      document.querySelector("#listMascotas").innerHTML = request.responseText;
      document.querySelector("#listMascotas").value = "";
      $("#listMascotas").selectpicker("refresh");
    }
  };
}
function ftnCargarMascotas_vacuna() {
  var idcliente = document.querySelector("#listClientes1").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getSelectMascotas/" + idcliente;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      document.querySelector("#listMascotas1").innerHTML = request.responseText;
      document.querySelector("#listMascotas1").value = "";
      $("#listMascotas1").selectpicker("refresh");
    }
  };
}
function ftnCargarMascotas_analisis() {
  var idcliente = document.querySelector("#listClientes2").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getSelectMascotas/" + idcliente;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      document.querySelector("#listMascotas2").innerHTML = request.responseText;
      document.querySelector("#listMascotas2").value = "";
      $("#listMascotas2").selectpicker("refresh");
    }
  };
}
// carga para el input id de hostorial de la mascota
function ftnCargarIdHistorial_consulta() {
  var idmascota = document.querySelector("#listMascotas").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getIdHistorial/" + idmascota;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      document.querySelector("#idhistorial_consulta").value =
        objData.idhistorial;
      // Asignar valores a los labels
      document.getElementById("hl_dueño_co").innerText =
        objData.d_nombre + " " + objData.apellidos;
      document.getElementById("hl_dni_co").innerText = objData.identificacion;
      document.getElementById("hl_correo_co").innerText = objData.email_cliente;
      document.getElementById("hl_telefono_co").innerText = objData.telefono;

      document.getElementById("hl_mascota_co").innerText = objData.nombre;
      document.getElementById("hl_especie_co").innerText = objData.especie;
      document.getElementById("hl_sexo_co").innerText = objData.sexo;
      document.getElementById("hl_raza_co").innerText = objData.raza;
    }
  };
}
function ftnCargarIdHistorial_vacuna() {
  var idmascota = document.querySelector("#listMascotas1").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getIdHistorial/" + idmascota;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      document.querySelector("#idhistorial_vacuna").value = objData.idhistorial;
      // Asignar valores a los labels
      document.getElementById("hl_dueño_va").innerText =
        objData.d_nombre + " " + objData.apellidos;
      document.getElementById("hl_dni_va").innerText = objData.identificacion;
      document.getElementById("hl_correo_va").innerText = objData.email_cliente;
      document.getElementById("hl_telefono_va").innerText = objData.telefono;

      document.getElementById("hl_mascota_va").innerText = objData.nombre;
      document.getElementById("hl_especie_va").innerText = objData.especie;
      document.getElementById("hl_sexo_va").innerText = objData.sexo;
      document.getElementById("hl_raza_va").innerText = objData.raza;
    }
  };
}
function ftnCargarIdHistorial_analisis() {
  var idmascota = document.querySelector("#listMascotas2").value;
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Mascotas/getIdHistorial/" + idmascota;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      document.querySelector("#idhistorial_analisis").value =
        objData.idhistorial;
      // Asignar valores a los labels
      document.getElementById("hl_dueño_an").innerText =
        objData.d_nombre + " " + objData.apellidos;
      document.getElementById("hl_dni_an").innerText = objData.identificacion;
      document.getElementById("hl_correo_an").innerText = objData.email_cliente;
      document.getElementById("hl_telefono_an").innerText = objData.telefono;

      document.getElementById("hl_mascota_an").innerText = objData.nombre;
      document.getElementById("hl_especie_an").innerText = objData.especie;
      document.getElementById("hl_sexo_an").innerText = objData.sexo;
      document.getElementById("hl_raza_an").innerText = objData.raza;
    }
  };
}

// =============================== OPEN MODALS================================== //
function openModalCosulta() {
  rowTable = "";
  // document.querySelector('#idMascota').value ="";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#titleModal").innerHTML = "Nueva Consulta Medica";
  // document.querySelector("#formMascotas").reset();
  $("#modalClinicaConsulta").modal("show");
}
function openModalVacunacion() {
  rowTable = "";
  // document.querySelector('#idMascota').value ="";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#titleModal").innerHTML = "Nueva Vacuna Medica";
  // document.querySelector("#formMascotas").reset();
  $("#modalClinicaVacuna").modal("show");
}
function openModalAnalisis() {
  rowTable = "";
  // document.querySelector('#idMascota').value ="";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#titleModal").innerHTML = "Nuevo Analisis Medico";
  // document.querySelector("#formMascotas").reset();
  $("#modalClinicaAnalisis").modal("show");
}

function cleanModal() {
  let formConsulta = document.querySelector("#formConsulta");
  formConsulta.reset();
  let formVacuna = document.querySelector("#formVacuna");
  formVacuna.reset();
  let formAnalisis = document.querySelector("#formAnalisis");
  formAnalisis.reset();
}