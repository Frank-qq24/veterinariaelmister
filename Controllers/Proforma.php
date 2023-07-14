<?php 

	class Proforma extends Controllers{
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
            getPermisos(7);
		}

		public function Proforma()
		{
			$data['page_id'] = 7;
			$data['page_tag'] = "Proforma";
			$data['page_title'] = "Proforma";
			$data['page_name'] = "proforma";
            $data['page_functions_js'] = "functions_proforma.js";
			$this->views->getView($this,"proforma",$data);
		}

        public function setProforma()
		{
			dep($_POST);
            exit;
		}
	}
 ?>