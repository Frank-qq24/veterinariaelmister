<?php 

	class RegistroModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		public function selectRegistros(){
			$sql = "SELECT `idregistro`, `persona`, `tabla`, `accion`, `iddato`, DATE_FORMAT(datecreated, '%d-%m-%Y %H:%i:%s') AS fechaRegistro 
					FROM `registro`";
			$request = $this->select_all($sql);
			return $request;
		}
	}
?>