let tableClientes; 
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

// se agregan los eventos al momento de cargar el documento
document.addEventListener('DOMContentLoaded', function(){

    tableClientes = $('#tableClientes').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Clientes/getClientes",
            "dataSrc":""
        },
        "columns":[
            {"data":"idcliente"},
            {"data":"identificacion"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_cliente"},
            {"data":"telefono"},
            {"data":"options"}
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

    //valida la existencia de este formulario
	if(document.querySelector("#formCliente")){
        let formCliente = document.querySelector("#formCliente");

        formCliente.onsubmit = function(e) {
            e.preventDefault();
            // capturo los valores enviados desde el formulario
            let strIdentificacion = document.querySelector('#txtIdentificacion').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtApellido').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let strDireccion = document.querySelector('#txtDireccion').value;
            let srtNota = document.querySelector('#txtNota').value;
            
            // verifico que algunos campos no esten vacios
            if(strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strDireccion == '' || srtNota == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            // verifica en el css el valid en los campos del del formulario
            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 

            divLoading.style.display = "flex";
            //se envian los datos por medio de ajax
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Clientes/setCliente'; // lo envia esta dirección
            let formData = new FormData(formCliente);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableClientes.api().ajax.reload();
                        }else{
                           rowTable.cells[1].textContent =  strIdentificacion;
                           rowTable.cells[2].textContent =  strNombre;
                           rowTable.cells[3].textContent =  strApellido;
                           rowTable.cells[4].textContent =  strEmail;
                           rowTable.cells[5].textContent =  intTelefono;
                           rowTable = "";
                        }
                        // oculta el formulario 
                        $('#modalFormCliente').modal("hide");
                        // resetea el formulario
                        formCliente.reset();
                        swal("Clientes", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}, false);

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

function fntDelInfo(idcliente){
    swal({
        title: "Eliminar Cliente",
        text: "¿Realmente quiere eliminar al cliente?",
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
            let ajaxUrl = base_url+'/Clientes/delCliente';
            let strData = "idCliente="+idcliente;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableClientes.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });
}

function fntEditInfo(element, idcliente){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Cliente";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clientes/getCliente/'+idcliente;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idCliente").value = objData.data.idcliente;
                document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellido").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_cliente;
                document.querySelector("#txtDireccion").value =objData.data.direccion;
                document.querySelector("#txtNota").value =objData.data.nota;
            }
        }
        $('#modalFormCliente').modal('show');
    }
}

function openModal()
{
    rowTable = "";
    document.querySelector('#idCliente').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
    document.querySelector("#formCliente").reset();
    $('#modalFormCliente').modal('show');
}