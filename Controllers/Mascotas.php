<?php
	class Mascotas extends Controllers{
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
        
        public function Mascotas()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/mascotas');
			}
			$data['page_tag'] = "Mascotas";
			$data['page_title'] = "Mascotas <small>El Mister</small>";
			$data['page_name'] = "mascotas";
			$data['page_functions_js'] = "functions_mascotas.js";
			$this->views->getView($this,"mascotas",$data);
		}
		public function setMascota(){
			// error_reporting(0);
			if($_POST){
				if(empty($_POST['listClientes']) || empty($_POST['txtNombre_mas']) || 
				empty($_POST['listEspecie']) || empty($_POST['listEspecie']) || 
				empty($_POST['txtRaza']) || empty($_POST['listsexo']) || 
				empty($_POST['txtDescripcion']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					
					$intPersonaid = intval($_SESSION['userData']['idpersona']);
					$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);
	
					$idMascota = intval($_POST['idMascota']);
					$intClienteID = intval($_POST['listClientes']);
					$strNombre = ucwords(strClean($_POST['txtNombre_mas']));
					$strEspecie = ucwords(strClean($_POST['listEspecie']));
					$strRaza = ucwords(strClean($_POST['txtRaza']));
					$strSexo = ucwords(strClean($_POST['listsexo']));
					$dateNacimiento = new DateTime($_POST['txtnacimiento']);
					$dateNacimiento = $dateNacimiento->format('Y-m-d');
					$strDescripcion = strClean($_POST['txtDescripcion']);
					$intStatus = 1;
					
					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$imgPortada 	= 'alter_pet.png';

					if($nombre_foto != ''){
						$imgPortada = 'img_pet_'.md5(date('d-m-Y H:m:s')).'.jpg';
					}

					$request_mascota = "";
					if($idMascota == 0)
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_mascota = $this->model->insertMascota(	$strNombre,
																			$strEspecie, 
																			$strRaza, 
																			$strSexo, 
																			$dateNacimiento,
																			$strDescripcion,
																			$intClienteID,
																			$intStatus,
																			$imgPortada
																			);
						}
					}
					else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							if($nombre_foto == ''){
								if($_POST['foto_actual'] != 'alter_pet.png' && $_POST['foto_remove'] == 0 ){
									$imgPortada = $_POST['foto_actual'];
								}
							}
							$request_mascota = $this->model->updateMascota(	$idMascota,
																			$strNombre,
																			$strEspecie, 
																			$strRaza, 
																			$strSexo, 
																			$dateNacimiento,
																			$strDescripcion,
																			$intClienteID,
																			$intStatus,
																			$imgPortada
																			);
							
						}
					}
	
					if($request_mascota > 0 or $request_mascota == true)
					{
						if($option == 1){
							$request_registro = $this->model->setRegistro($nombrePersona, "Mascota", "Crear", $request_mascota , $intPersonaid);
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }
						}else{
							$request_registro = $this->model->setRegistro($nombrePersona, "Mascota", "Modificar", $idMascota , $intPersonaid);
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

							if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'alter_pet.png')
								|| ($nombre_foto != '' && $_POST['foto_actual'] != 'alter_pet.png')){
								deleteFile($_POST['foto_actual']);
							}
						}	
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function getMascotas()
		{
			$Mascotas = new MascotasModel();
			if($_SESSION['permisosMod']['r']){
				
				$arrData = $this->model->selectMascotas();
				 for ($i=0; $i < count($arrData); $i++) {
					 
					if($arrData[$i]['status'] == 1){
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}
						
						$btnView = '';
						$btnEdit = '';
						$btnDelete = '';
				 	if($_SESSION['permisosMod']['r']){
				 		$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idmascota'].')" title="Ver mascota"><i class="far fa-eye"></i></button>';
				 	}
				 	if($_SESSION['permisosMod']['u']){
				 		$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idmascota'].')" title="Editar mascota"><i class="fas fa-pencil-alt"></i></button>';
				 	}
				 	if($_SESSION['permisosMod']['d']){	
				 		$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idmascota'].')" title="Eliminar mascota"><i class="far fa-trash-alt"></i></button>';
				 	}
				 	$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function getMascota($idmascota){
			if($_SESSION['permisosMod']['r']){
				$idmascota = intval($idmascota);
				if($idmascota > 0)
				{
					$arrData = $this->model->selectMascota($idmascota);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrData['url_foto'] = media().'/images/uploads/'.$arrData['foto'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		public function delMascota()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intPersonaid = intval($_SESSION['userData']['idpersona']);
					$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);
					
					$idmascota = intval($_POST['idmascota']);
					$requestDelete = $this->model->deleteMascota($idmascota);
					if($requestDelete)
					{
						$request_registro = $this->model->setRegistro($nombrePersona, "Mascota", "Eliminar", $idmascota , $intPersonaid);
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la mascota','success' => true);
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al cliente.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
    }
?>