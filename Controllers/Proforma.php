<?php

class Proforma extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		// session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(7);
	}

	public function Proforma()
	{
		$data['page_id'] = 7;
		$data['page_tag'] = "Proforma";
		$data['page_title'] = "Proforma";
		$data['page_name'] = "proforma";
		$data['page_functions_js'] = "functions_proforma.js";
		$this->views->getView($this, "proforma", $data);
	}

	public function setProformaAll()
	{
		if ($_POST) {
			if (empty($_POST['nombreEncargado'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {

				$intPersonaid = intval($_SESSION['userData']['idpersona']);
				$nombrePersona = strClean($_SESSION['userData']['nombres'] . " " . $_SESSION['userData']['apellidos']);

				$Total = intval($_POST['txtTotal']);
				$idProforma = intval($_POST['idProforma']);

				$arrayData = $_POST['arrayProductos']; // Obtener la cadena de texto del FormData
				$arrayDetalle = json_decode($arrayData);

				$request_proforma = "";
				$estado = "Pendiente"; // Pendiente 
				$cantidad = count($arrayDetalle);

				if ($idProforma == 0) {
					$option = 1;
					if ($_SESSION['permisosMod']['w']) {
						$request_proforma = $this->model->insertProforma($intPersonaid, $Total, $cantidad, $estado);
						
						$idProforma = $request_proforma;
						foreach ($arrayDetalle as $objeto) {
							$idproducto = intval($objeto->nombre);
							$nombre_producto = $objeto->nombre_producto;
							$precio = floatval($objeto->precio);
							$cantidad = intval($objeto->cantidad);
							$subtotal = floatval($objeto->subtotal);
							$request_detalle = $this->model->insertDetalle_pro($idProforma, $idproducto, $cantidad, $precio, $subtotal);
							$request_producto_actuliza = $this->model->updateProductoStock_D($idproducto, $cantidad);
							// echo $request_producto_actuliza;
						}
					}
				} else {
					$option = 2;
					if ($_SESSION['permisosMod']['u']) {
						// $request_proforma = $this->model->updateProducto($idProducto,
						// 											$strNombre,
						// 											$strDescripcion, 
						// 											$strCodigo, 
						// 											$intCategoriaId,
						// 											$strPrecio, 
						// 											$intStock, 
						// 											$intStatus);
					}
				}
				if ($request_proforma > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'IDproforma' => $request_proforma, 'msg' => 'Datos guardados correctamente.');
						$request_registro = $this->model->setRegistro($nombrePersona, "Proforma", "Crear", $request_proforma, $intPersonaid);
					} else {
						$request_registro = $this->model->setRegistro($nombrePersona, "Proforma", "Modificar", $idProforma, $intPersonaid);
						$arrResponse = array('status' => true, 'IDproforma' => $idProforma, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_proforma == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe un producto con el Código Ingresado.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getProformas()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectProformas();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					// $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewProforma(' . $arrData[$i]['idproforma'] . ')" title="Ver Proforma"><i class="far fa-eye"></i></button>';
					$btnImprimir = '<a class="btn btn-secondary btn-sm" id="ImprimirAnalisis" href="'.base_url().'/documento/printProforma/' . $arrData[$i]['idproforma'] . '" target="_blank"><i class="fa fa-fw fa-lg fa-print"></i></a>';
					
				}
				if ($_SESSION['permisosMod']['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelProforma(' . $arrData[$i]['idproforma'] . ')" title="Eliminar Proforma"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnImprimir . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function delProforma(){
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intPersonaid = intval($_SESSION['userData']['idpersona']);
				$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);
			
				$intidProforma = intval($_POST['idProforma']);

				$requestDetalle = $this->model->selectDetalle_pro($intidProforma);
				
				foreach ($requestDetalle as $objeto) {
					$iddetalle = intval($objeto['idpdetalle_pro']);
					$idproducto = intval($objeto['productoid']);
					$cantidad = intval($objeto['cantidad']);

					$request_producto_actuliza = $this->model->updateProductoStock_A($idproducto, $cantidad);
					$request_detalle = $this->model->deleteDetalleProforma($iddetalle);
				}
				$requestDelete = $this->model->deleteProforma($intidProforma);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado proforma');
					$request_registro = $this->model->setRegistro($nombrePersona, "Proforma", "Eliminar", $intidProforma , $intPersonaid);
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
