let tableMascotas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
let rutaPDFanalisis = "";

function openModalAnalisis(){
    
    $("#modalHistorialAnalisis").modal("show");
};
function openModalConsulta(){
    $("#modalHistorialConsulta").modal("show");
};
function openModalComentario(){
    $("#modalHistorialComentarios").modal("show");
};
function verPDF_ana(){
    baseURL
    document.getElementById("idframePDF").src = baseURL+"/Assets/documents/uploads/"+rutaPDFanalisis;
    $("#modalVerpdf").modal("show");
};

function fntViewInfo(idcliente){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clientes/getCliente/'+idcliente;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
                document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celEmail").innerHTML = objData.data.email_cliente;
                document.querySelector("#celDireccion").innerHTML = objData.data.direccion;
                document.querySelector("#celNota").innerHTML = objData.data.nota;
                $srtEstado = "Inactivo";
                if(objData.data.status == 1){$srtEstado = "Activo"}; 
                document.querySelector("#celStatus").innerHTML = $srtEstado;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro; 
                $('#modalViewCliente').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntVacuna(idvacuna){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clinica/getVacuna/'+idvacuna;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                // Datos de VAcuna
                document.querySelector("#idhistorial_vacuna").value = objData.data.historialid;
                document.querySelector("#idvacuna").value = objData.data.idvacuna;
                document.querySelector("#txtVacuna").value = objData.data.vacuna;
                document.querySelector("#txtDosis").value = objData.data.dosis;
                document.querySelector("#txtCodigo").value = objData.data.codigo;
                document.querySelector("#txtNotas").value = objData.data.nota;

                document.getElementById("persona_nom_vacuna").innerText = objData.data.p_nombre + " " + objData.data.p_apellidos;
                document.getElementById("fecha_vacuna").innerText = objData.data.fecha;
                let miEnlace = document.getElementById("ImprimirVacuna");
                miEnlace.target = "_blank";
                miEnlace.href = baseURL+"/documento/printVacuna/"+objData.data.idvacuna;
                // DAtos de la ficha
                // document.getElementById("hl_dueño_va").innerText = objData.data.c_nombres + " " + objData.data.c_apellidos;
                // // document.getElementById("hl_dni_va").innerText = objData.data.identificacion;
                // // document.getElementById("hl_correo_va").innerText = objData.data.email_cliente;
                // document.getElementById("hl_telefono_va").innerText = objData.data.c_telefono;

                // document.getElementById("hl_mascota_va").innerText = objData.data.m_nombre;
                // document.getElementById("hl_especie_va").innerText = objData.data.especie;
                // document.getElementById("hl_sexo_va").innerText = objData.data.sexo;
                // document.getElementById("hl_raza_va").innerText = objData.data.raza;


            }
        }
        $('#modalHistorialVacuna').modal('show');
    }
}
function fntAnalisis(idana){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clinica/getAnalisis/'+idana;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idhistorial_analisis").value = objData.data.historialid;
                document.querySelector("#idanalisis").value = objData.data.idanalisis;
                document.querySelector("#txtAnalisis").value = objData.data.tipo;
                document.querySelector("#txtDiagnostico_ana").value = objData.data.diagnostico;
                document.querySelector("#txtTratamiento_ana").value = objData.data.tratamiento;
                rutaPDFanalisis = objData.data.rutafile;
                // Obtén una referencia al enlace <a>
                let miEnlace = document.getElementById("ImprimirAnalisis");
                miEnlace.target = "_blank";
                miEnlace.href = baseURL+"/documento/printAnalisis/"+objData.data.idanalisis;
                // DAtos de la ficha
                document.getElementById("persona_nom_analisis").innerText = objData.data.p_nombre + " " + objData.data.p_apellidos;
                // document.getElementById("hl_dni_va").innerText = objData.data.identificacion;
                // document.getElementById("hl_correo_va").innerText = objData.data.email_cliente;
                document.getElementById("fecha_analisis").innerText = objData.data.fecha;
            }
        }
        $('#modalHistorialAnalisis').modal('show');
    }
}
function fntConsulta(idcon){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clinica/getConsulta/'+idcon;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idhistorial_consulta").value = objData.data.historialid;
                document.querySelector("#idconsulta").value = objData.data.idconsulta;
                document.querySelector("#txtPeso").value = objData.data.peso;
                document.querySelector("#txtTemperatura").value = objData.data.temperatura;
                document.querySelector("#txtRespiracion").value = objData.data.frecuencia;
                document.querySelector("#txtMotivo").value = objData.data.motivo;
                document.querySelector("#txtAnamnesis").value = objData.data.anamnesis;
                document.querySelector("#txtDiagnostico").value = objData.data.diagnostico;
                document.querySelector("#txtTratamiento").value = objData.data.tratamiento;
                rutaPDFanalisis = objData.data.rutafile;
                // Obtén una referencia al enlace <a>
                let miEnlace = document.getElementById("ImprimirConsulta");
                miEnlace.target = "_blank";
                miEnlace.href = baseURL+"/documento/printConsulta/"+objData.data.idconsulta;
                // DAtos de la ficha
                document.getElementById("persona_nom_consulta").innerText = objData.data.p_nombre + " " + objData.data.p_apellidos;
                // document.getElementById("hl_dni_va").innerText = objData.data.identificacion;
                // document.getElementById("hl_correo_va").innerText = objData.data.email_cliente;
                document.getElementById("fecha_consulta").innerText = objData.data.fecha;
            }
        }
        $('#modalHistorialConsulta').modal('show');
    }
}
// document.getElementById('myButton').onclick = btnAnalisis;
// var btnAnalisis = function() {
    
//   };

