<?php 

	class Errors extends Controllers{
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
			getPermisos(1);
		}

		public function notFound()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "No Encontrado";
			$data['page_functions_js'] = "functions_error.js";
			$this->views->getView($this,"error",$data);
		}
	}

	$notFound = new Errors();
	$notFound->notFound();
 ?>