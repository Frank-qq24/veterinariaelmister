<?php 

	class Clinica extends Controllers{
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
			getPermisos(5);
		}

		public function clinica(){
			$data['page_id'] = 5;
			$data['page_tag'] = "Clinica";
			$data['page_title'] = "Clinica - Veterinaria el Mister";
			$data['page_name'] = "clinica";
			$data['page_functions_js'] = "functions_clinica.js";
			$this->views->getView($this,"clinica",$data);
		}

		public function historial(int $idmascota) {
			$data['page_tag'] = "Historial";
			$data['page_title'] = "Historial Clinico de Mascota";
			$data['page_name'] = "Hitorial";
			// para el perfil
			$arrAnalisis = $this->model->selectAnalisis_hist($idmascota);
			$data['analisis'] = $arrAnalisis;
			$arrVacunas = $this->model->selectVacuna_hist($idmascota);
			$data['vacunas'] = $arrVacunas;
			$arrAnalisis = $this->model->selectConsulta_hist($idmascota);
			$data['consultas'] = $arrAnalisis;
			$arrPerfil = $this->model->selectMascota($idmascota);
			$data['perfil'] = $arrPerfil;
			$data['page_functions_js'] = "functions_clinica.js";
			$this->views->getView($this,"historial",$data);
		}

		public function getClinicaPrueba(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectHistorial();
				 for ($i=0; $i < count($arrData); $i++) {
				 	$arrData[$i]['ver'] = '<a href="'.base_url().'/Clinica/Historial/'.$arrData[$i]['idhistorial'].'"><i class="fa fa-eye" aria-hidden="true"> Ver Historial</i></a>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function setConsulta(){
			if($_POST){
				if(empty($_POST['idhistorial_consulta']) || empty($_POST['txtMotivo']) || 
				empty($_POST['txtAnamnesis']) || empty($_POST['txtDiagnostico'])
				|| empty($_POST['txtTratamiento'])){
					$arrResponse = array("status" => false, "msg" => 'Algun dato indispensable falta llenar.');
				}else{ 
					
					$intPersonaid = intval($_SESSION['userData']['idpersona']);
					$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);

					$idconsulta = intval($_POST['idconsulta']);
					$idHistorial = intval($_POST['idhistorial_consulta']);

					$decTemperatura = floatval(strClean($_POST['txtTemperatura']));
					$decPeso = floatval(strClean($_POST['txtPeso']));
					$intRespiracion= intval(strClean($_POST['txtRespiracion']));
					$strMotivo = strClean($_POST['txtMotivo']);
					$strAnamnesis = strClean($_POST['txtAnamnesis']);
					$strDiagnostico = strClean($_POST['txtDiagnostico']);
					$strTratamiento = strClean($_POST['txtTratamiento']);
					
					if($idconsulta == 0)
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_consulta = $this->model->insertConsulta($decTemperatura,
																			$decPeso, 
																			$intRespiracion, 
																			$strMotivo,
																			$strAnamnesis,
																			$strDiagnostico,
																			$strTratamiento,
																			$idHistorial,
																			$intPersonaid
																		);
							// $request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Crear", $request_user , $intPersonaid);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_consulta = $this->model->updateConsulta($idconsulta,
																			$decTemperatura,
																			$decPeso, 
																			$intRespiracion, 
																			$strMotivo,
																			$strAnamnesis,
																			$strDiagnostico,
																			$strDiagnostico,
																			$strTratamiento,
																			$idHistorial
																		);
							// $request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Modificar", $idCliente , $intPersonaid);
						}
					}

					if($request_consulta > 0 ){
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function setVacuna(){
			if($_POST){
				if(empty($_POST['idhistorial_vacuna']) || empty($_POST['txtVacuna']) || 
				empty($_POST['txtDosis']) || empty($_POST['txtCodigo'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					
					$intPersonaid = intval($_SESSION['userData']['idpersona']);
					$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);

					$idvacuna = intval($_POST['idvacuna']);
					$idHistorial = intval($_POST['idhistorial_vacuna']);
					$strVacuna = strClean($_POST['txtVacuna']);
					$intDosis= intval(strClean($_POST['txtDosis']));
					$strCodigo = strClean($_POST['txtCodigo']);
					$strNota = strClean($_POST['txtNotas']);
					
					if($idvacuna == 0)
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_vacuna = $this->model->insertVacuna(	$strVacuna,
																			$intDosis, 
																			$strCodigo, 
																			$strNota,
																			$idHistorial,
																			$intPersonaid);
							// $request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Crear", $request_user , $intPersonaid);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_vacuna = $this->model->updateVacuna($idvacuna,
																		$strVacuna,
																		$intDosis, 
																		$strCodigo, 
																		$strNota,
																		$idHistorial,
																		$intPersonaid);
							// $request_registro = $this->model->setRegistro($nombrePersona, "Cliente", "Modificar", $idCliente , $intPersonaid);
						}
					}

					if($request_vacuna > 0 ){
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function setAnalisis(){
			if($_POST){
				if(empty($_POST['idhistorial_analisis']) || empty($_POST['txtAnalisis']) || 
				empty($_POST['txtDiagnostico']) || empty($_POST['txtTratamiento'])){
					$arrResponse = array("status" => false, "msg" => 'Datos ingresadosa incorrectos.');
				}else{ 					
					$intPersonaid = intval($_SESSION['userData']['idpersona']);
					$nombrePersona = strClean($_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']);
					
					$idAnalisis = intval($_POST['idanalisis']);
					$idHistorial = intval($_POST['idhistorial_analisis']);
					$strTipo = strClean($_POST['txtAnalisis']);
					$strDiagnostico = strClean($_POST['txtDiagnostico']);
					$strTratamiento = strClean($_POST['txtTratamiento']);
					
					$pdfFile = $_FILES["file_Doc"];
					if ($pdfFile["type"] === "application/pdf") {
						$nombre_pdf = 'pdf_ana_'.md5(date('d-m-Y H:m:s')).'.pdf';
						if($idAnalisis == 0)
						{
							$option = 1;
							if($_SESSION['permisosMod']['w']){
								$request_analisis = $this->model->insertAnalisis($strTipo,
																				$nombre_pdf, 
																				$strDiagnostico, 
																				$strTratamiento,
																				$idHistorial,
																				$intPersonaid);
							}
						}else{
							$option = 2;
							if($_SESSION['permisosMod']['u']){
								$request_analisis = $this->model->updateAnalisis($idAnalisis,
																				$nombre_pdf, 
																				$strDiagnostico, 
																				$strTratamiento,
																				$idHistorial,
																				$intPersonaid);
							}
						}
						if($request_analisis > 0 ){
							if($option == 1){
								uploadPdf($pdfFile,$nombre_pdf);
								// $request_registro = $this->model->setRegistro($nombrePersona, "Analisis", "Crear", $request_user , $intPersonaid);
								$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							}else{
								// $request_registro = $this->model->setRegistro($nombrePersona, "Analisis", "Modificar", $idCliente , $intPersonaid);
								$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							}
						}else{
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}
					}else{
						$arrResponse = array("status" => false, "msg" => 'El archivo no es un pdf.');
					} 
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}
