<?php
	class Mascotas extends Controllers{
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
			getPermisos(3);
		}
        
        public function Mascotas()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Mascotas";
			$data['page_title'] = "Mascotas <small>El Mister</small>";
			$data['page_name'] = "mascotas";
			$data['page_functions_js'] = "functions_mascotas.js";
			$this->views->getView($this,"mascotas",$data);
		}
    }
?>