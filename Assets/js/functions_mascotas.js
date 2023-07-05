let tableMascotas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
const formMascota = document.querySelector('#modalFormMascotas');

document.addEventListener("DOMContentLoaded", function () {
    cargarTabla();
    fntCreateInfo();
    selectIMG();
},false);

window.addEventListener('load', function() {
    fntClientes();
}, false);

function cargarTabla(){
  tableMascotas = $('#tableMascotas').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/Mascotas/getMascotas",
        "dataSrc":""
    },
    "columns":[
          { data: "idmascota" },
          { data: "nombre" },
          { data: "especie" },
          { data: "raza" },
          { data: "sexo" },
          { data: "fecha_nacimiento"},
          { data: "dueño_nombre" },
          { data: "status" },
          { data: "opciones"},
    ],
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary"
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success"
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger"
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info"
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});
}

function fntCreateInfo(){
    if(document.querySelector("#formMascotas")){
        let formMascota = document.querySelector("#formMascotas");
        formMascota.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            //se envian los datos por medio de ajax
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Mascotas/setMascota'; // lo envia esta dirección
            let formData = new FormData(formMascota);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    console.log(objData);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableMascotas.api().ajax.reload();
                        }else{
                            cargarTabla()
                            rowTable = "";
                        }
                        // oculta el formulario 
                        $('#modalFormMascotas').modal("hide");
                        // resetea el formulario
                        formMascota.reset();
                        removePhoto();
                        swal("Mascotas", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}
function fntEditInfo(element,idmascota){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Editar datos de Mascota";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Mascotas/getMascota/'+idmascota;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idMascota").value = objData.data.idmascota;
                document.querySelector("#listClientes").value = objData.data.idcliente;
                $('#listClientes').selectpicker('render');
                document.querySelector("#txtNombre_mas").value = objData.data.nombre;
                document.querySelector("#listEspecie").value = objData.data.especie;
                $('#listEspecie').selectpicker('render');
                document.querySelector("#txtRaza").value = objData.data.raza;
                document.querySelector("#listsexo").value = objData.data.sexo;
                $('#listsexo').selectpicker('render');
                document.querySelector("#txtnacimiento").value =objData.data.fecha_nacimiento;
                document.querySelector("#txtDescripcion").value =objData.data.descripcion;
                document.querySelector('#foto_actual').value = objData.data.foto;
                document.querySelector("#foto_remove").value= 0;
                if(document.querySelector('#img')){
                    document.querySelector('#img').src = objData.data.url_foto;
                }else{
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_foto+">";
                }
                if(objData.data.portada == 'alter_pet.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
            }
        }
        $('#modalFormMascotas').modal('show');
    }
}
function fntViewInfo(idmascota){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Mascotas/getMascota/'+idmascota;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#txtMas_nombre").innerHTML = objData.data.nombre;
                document.querySelector("#txtMas_especie").innerHTML = objData.data.especie;
                document.querySelector("#txtMas_sexo").innerHTML = objData.data.sexo;
                document.querySelector("#txtMas_raza").innerHTML = objData.data.raza;
                document.querySelector("#txtMas_nacimiento").innerHTML = objData.data.fecha_nacimiento;
                document.querySelector("#txtMas_dueño").innerHTML = objData.data.d_nombre +" "+ objData.data.apellidos;
                document.querySelector("#txtMas_email").innerHTML = objData.data.email_cliente;
                document.querySelector("#txtMas_dni").innerHTML = objData.data.identificacion;
                document.querySelector("#txtMas_telefono").innerHTML = objData.data.telefono;
                document.querySelector("#txtMas_direccion").innerHTML = objData.data.direccion;
                document.querySelector('#imgVistaMascota').src=objData.data.url_foto;
                swal(" "+objData.data.nombre, "Vista lateral de la mascota", "success"); 
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(id_mascota){
    swal({
        title: "Eliminar la Mascota",
        text: "¿Realmente quiere eliminar a la Mascota?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Mascotas/delMascota';
            let strData = "idmascota="+id_mascota;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminado!", objData.msg , "success");
                        tableMascotas.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });
}
function fntClientes(){
    if(document.querySelector('#listClientes')){
        let ajaxUrl = base_url+'/Clientes/getSelectClientes';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listClientes').innerHTML = request.responseText;
                $('#listClientes').selectpicker('render');
            }
        }
    }
}
function selectIMG(){
    if(document.querySelector("#foto")){
	    let foto = document.querySelector("#foto");
	    foto.onchange = function(e) {
	        let uploadFoto = document.querySelector("#foto").value;
	        let fileimg = document.querySelector("#foto").files;
	        let nav = window.URL || window.webkitURL;
	        let contactAlert = document.querySelector('#form_alert');
	        if(uploadFoto !=''){
	            let type = fileimg[0].type;
	            let name = fileimg[0].name;
	            if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
	                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
	                if(document.querySelector('#img')){
	                    document.querySelector('#img').remove();
	                }
	                document.querySelector('.delPhoto').classList.add("notBlock");
	                foto.value="";
	                return false;
	            }else{  
	                    contactAlert.innerHTML='';
	                    if(document.querySelector('#img')){
	                        document.querySelector('#img').remove();
	                    }
	                    document.querySelector('.delPhoto').classList.remove("notBlock");
	                    let objeto_url = nav.createObjectURL(this.files[0]);
	                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
	                }
	        }else{
	            alert("No selecciono foto");
	            if(document.querySelector('#img')){
	                document.querySelector('#img').remove();
	            }
	        }
	    }
	}
	if(document.querySelector(".delPhoto")){
	    let delPhoto = document.querySelector(".delPhoto");
	    delPhoto.onclick = function(e) {
            document.querySelector("#foto_remove").value= 1;
	        removePhoto();
	    }
	}
}
function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}
function openModal() {
    rowTable = "";
    document.querySelector('#idMascota').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Mascota";
    document.querySelector("#formMascotas").reset();
    removePhoto();
    $("#modalFormMascotas").modal("show");
  }
function openModal2() {
    $("#modalAgregarCliente").modal("show");
  }