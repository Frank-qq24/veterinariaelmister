<?php 

	class Registro extends Controllers{
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
			getPermisos(2);
		}

		public function registro()
		{
			// $data['page_id'] = 5;
			$data['page_tag'] = "Registro de Actividad";
			$data['page_title'] = "Registro de Actividad - Veterinaria el Mister";
			$data['page_name'] = "Registro de Actividad";
			$data['page_functions_js'] = "functions_registro.js";
			$this->views->getView($this,"registro",$data);
		}

        public function getRegistros()
	    {
            if($_SESSION['permisosMod']['r']){
                $arrData = $this->model->selectRegistros();
				for ($i=0; $i < count($arrData); $i++) {
					switch($arrData[$i]['accion']){
						case 'Crear': $arrData[$i]['accion'] = '<span class="badge badge-success">'.$arrData[$i]['accion'].'</span>'; break;
						case 'Modificar': $arrData[$i]['accion'] = '<span class="badge badge-warning">'.$arrData[$i]['accion'].'</span>'; break;
						case 'Eliminar': $arrData[$i]['accion'] = '<span class="badge badge-danger">'.$arrData[$i]['accion'].'</span>'; break;
					}
					
			   }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            }
            die();
	    }
	}
 ?>