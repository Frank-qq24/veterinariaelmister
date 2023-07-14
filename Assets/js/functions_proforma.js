var tableProformas;

window.addEventListener('load',function(){
    fntCategorias();
}, false);

// se agregan los eventos al momento de cargar el documento
document.addEventListener('DOMContentLoaded', function(){
    tableProformas = $('#tablaProforma').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Proformas/getProformas",
            "dataSrc":""
        },
        "columns":[
            {"data":"pedidoid"},
            {"data":"fechaRegistro"},
            {"data":"encargado"},
            {"data":"options"},
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]] 
    });

}, false);

const tablaProforma = document.querySelector('#tablaProductosProformas');
const btnAñadir = document.querySelector('#btnAñadir');
const btnCancelarProforma = document.querySelector('#btnCancelarProforma');
const formProformas = document.querySelector('#formProformas');
let productosEnProforma = [];
let total = 0.0;

window.addEventListener('click',()=>{
    btnAñadir.addEventListener('click',agregarProductoAproforma);
    btnCancelarProforma.addEventListener('click',limpiarProductosDeProforma);
})

function limpiarProductosDeProforma(){
    const txtCantidad = document.querySelector('#txtCantidad');
    const listProducto = document.querySelector('#listProducto');

    productosEnProforma = [];
    mostrarProductosEnTablaHTML();
    formProformas.reset();
    txtCantidad.textContent = '1';
    listProducto.innerHTML = '';
    $('#listProducto').selectpicker('render');

}

function agregarProductoAproforma(e){

    e.preventDefault(); 
    // Capturo valores
    let precio = document.querySelector('#txtPrecio').value;
    let cantidad = document.querySelector('#txtCantidad').value;
    let stock = document.querySelector('#stockProducto').value;
    let nombre = document.querySelector('#listProducto').value;
    let selectElement = document.getElementById("listProducto");
    let selectedOption = selectElement.options[selectElement.selectedIndex];
    let nombre_producto = selectedOption.text;

    if(precio == ""){
        swal("Proformas", "Selecciona primero un producto.","info");
        return false;
    }

    if(parseInt(cantidad)<=0){
        swal("Proformas", "Seleccione una cantidad correcta.","info");
        return false;
    }

    if(cantidad == ""){
        swal("Proformas", "Elige una cantidad.","info");
        return false;
    }

    if(parseInt(stock)<parseInt(cantidad)){
        swal("Proformas", "stock insuficiente.","info");
        return false;
    }
    // guardo valores en un array
    let objetoProductoAagregar = {
        nombre_producto,
        precio,
        cantidad,
        nombre,
        subtotal : Number(cantidad)*Number(precio),
    }
    // si exite esta wevada producto
    const existeProducto = productosEnProforma.some((producto)=>{return producto.nombre === nombre});
    
    if(existeProducto){
        swal("Proformas", "Producto ya agregado a la lista.","info");
    }else{
        // guardando en memoria
        productosEnProforma.push(objetoProductoAagregar);
        mostrarProductosEnTablaHTML();
        total = total + (Number(cantidad)*Number(precio));
        document.querySelector('#txtTotal').value = total;
    }
    // console.log(productosEnProforma);
}

function mostrarProductosEnTablaHTML(){
    tablaProforma.innerHTML = `<thead>
    <tr>
    <th>Cantidad</th>
    <th>Producto</th>
    <th>Precio</th>
    <th>Subtotal</th>
    <th>Accion</th>
    </tr>
    </thead>`;
    // imprime nomas en toda la tabla
    const thead = document.createElement('thead');
    productosEnProforma.forEach(producto=>{
        thead.innerHTML += `<tr class="filaNumero${producto.nombre}">                                    
        <th>${producto.cantidad}</th>
        <th>${producto.nombre_producto}</th>
        <th>${producto.precio}</th>
        <th>${producto.subtotal}</th>
        <th>
        <div style="text-align: center;">
        <button type="button" class="btn btn-danger btn-sm" onclick="eliminarProductoEnProformar(${producto.nombre})" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>
        </div>
        </th>
        </tr>`
    })
    // actualiza la tabla.
    tablaProforma.appendChild(thead);
}

function eliminarProductoEnProformar(idProducto){
    let total = parseFloat(document.querySelector('#txtTotal').value); // Convertir a número decimal
  
    // Recuperar el precio y cantidad del producto eliminado
    let productoEliminado = productosEnProforma.find(producto => producto.nombre === idProducto);
    let precio = parseFloat(productoEliminado.precio);
    let cantidad = parseFloat(productoEliminado.cantidad);
    
    total -= cantidad * precio; // Restar del total el producto eliminado

    productosEnProforma = productosEnProforma.filter(producto=>{return producto.nombre != idProducto });
    const fila = document.querySelector(`.filaNumero${idProducto}`);
    fila.remove();
    document.querySelector('#txtTotal').value = total; 
}

// obtener categorias

function fntCategorias(){
    if(document.querySelector('#listCategoria')){
        let ajaxUrl = base_url+'/Categorias/getSelectCategorias';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listCategoria').innerHTML = request.responseText;
                document.querySelector('#listCategoria').value=0;
                $('#listCategoria').selectpicker('render');
            }
        }
    }
}

// obtener productos

function ftnProductos(){
	document.querySelector('#txtPrecio').value = "";
	document.querySelector('#txtCantidad').value = "1";
	var idCategoria = document.querySelector('#listCategoria').value;
	var ajaxUrl = base_url+'/Productos/getSelectProductos/'+idCategoria;
	var request = (window.XMLHttpRequest) ? 
					new XMLHttpRequest() : 
					new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status==200){
			document.querySelector('#listProducto').innerHTML = request.responseText;
			document.querySelector('#listProducto').value=100;
			$('#listProducto').selectpicker('refresh');			
		}
	}
}

// obtener precios

function ftnPrecio(){
	var idProducto = document.querySelector('#listProducto').value;
	document.querySelector('#txtCantidad').value = "1";
    var ajaxUrl = base_url+'/Productos/getSelectPrecios/'+idProducto;
	var request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status==200){
            var objData = JSON.parse(request.responseText);
        document.querySelector('#txtPrecio').value = objData.data.precio;
        document.querySelector('#stockProducto').value = objData.data.stock;
        }
	}
}

function CrearProforma(){
    let formProforma = document.querySelector("#formProformas");
    formProforma.onsubmit = function(e) {
        e.preventDefault();
        let numtotal = document.querySelector('#txtTotal').value; 
        if(numtotal <= 0)
        {
            swal("Atención", "No Tiene ningun producto en proforma." , "error");
            return false;
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Proforma/setProforma'; 
        let formData = new FormData(formProforma);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    if(rowTable == ""){
                        tableCategorias.ajax.reload();
                    }else{
                        rowTable = "";
                    }

                    $('#modalFormProformas').modal("hide");
                    formProforma.reset();
                    swal("ProformaCreada", objData.msg ,"success");
                    removePhoto();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            divLoading.style.display = "none";
            return false;
        }
    }
}

$('#tablaProforma').DataTable();
function openModal(){
    $('#modalFormProforma').modal('show');
}