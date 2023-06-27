<?php 

	class Clinica extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(5);
		}

		public function clinica()
		{
			$data['page_id'] = 5;
			$data['page_tag'] = "Clinica";
			$data['page_title'] = "Clinica - Veterinaria el Mister";
			$data['page_name'] = "clinica";
			$data['page_functions_js'] = "functions_clinica.js";
			$this->views->getView($this,"clinica",$data);
		}

	}
 ?>