<?php 

class Clientes extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		// session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(3);
	}

	public function Clientes()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Clientes";
		$data['page_title'] = "CLIENTES <small>El mister</small>";
		$data['page_name'] = "clientes";
		$data['page_functions_js'] = "functions_clientes.js";
		$this->views->getView($this,"clientes",$data);
	}

	public function setCliente(){
		error_reporting(0);
		if($_POST){
			if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || 
			empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || 
			empty($_POST['txtEmail']) || empty($_POST['txtDireccion']) || 
			empty($_POST['txtNota']))
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{ 
				
				$intPersonaid = intval($_SESSION['userData']['idpersona']);
				$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);

				$idCliente = intval($_POST['idCliente']);
				$strIdentificacion = strClean($_POST['txtIdentificacion']);
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strApellido = ucwords(strClean($_POST['txtApellido']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$strDireccion = strClean($_POST['txtDireccion']);
				$strNota = strClean($_POST['txtNota']);
				$intStatus = 1;

				$strPassword = ""; //puesto por mientras hasta que lo saque
				$request_user = "";
				if($idCliente == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertCliente($strIdentificacion,
																			$strNombre, 
																			$strApellido, 
																			$intTelefono, 
																			$strEmail,
																			$strDireccion, 
																			$strNota,
																			$intPersonaid,
																			$intStatus 
																		);
						$request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Crear", $request_user , $intPersonaid);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateCliente($idCliente,
																			$strIdentificacion,
																			$strNombre, 
																			$strApellido, 
																			$intTelefono, 
																			$strEmail,
																			$strDireccion, 
																			$strNota,
																			$intPersonaid,
																			$intStatus);
						$request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Modificar", $idCliente , $intPersonaid);
					}
				}

				if($request_user > 0 )
				{
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				}else if($request_user == 'exist'){
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getClientes()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectClientes();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcliente'].')" title="Ver cliente"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idcliente'].')" title="Editar cliente"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){	
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcliente'].')" title="Eliminar cliente"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getCliente($idpersona){
		if($_SESSION['permisosMod']['r']){
			$idcliente = intval($idpersona);
			if($idcliente > 0)
			{
				$arrData = $this->model->selectCliente($idcliente);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function delCliente()
	{
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intPersonaid = intval($_SESSION['userData']['idpersona']);
				$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);
				
				$intIdpersona = intval($_POST['idCliente']);
				$requestDelete = $this->model->deleteCliente($intIdpersona);
				if($requestDelete)
				{
					$request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Eliminar", $intIdpersona , $intPersonaid);
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el cliente');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al cliente.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function getSelectClientes(){
		$htmlOptions = "";
		$arrData = $this->model->selectClientes();
		if(count($arrData) > 0 ){
			for ($i=0; $i < count($arrData); $i++) { 
				if($arrData[$i]['status'] == 1 ){
				$htmlOptions .= '<option value="'.$arrData[$i]['idcliente'].'">'.$arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'].' - '.$arrData[$i]['identificacion'].'</option>';
				}
			}
		}
		echo $htmlOptions;
		die();	
	}
}
?>