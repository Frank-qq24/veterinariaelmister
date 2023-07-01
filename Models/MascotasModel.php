<?php 

	class MascotasModel extends Mysql {
		private $intIdmascota;
		private $strNombre;
		private $strEspecie;
		private $strRaza;
		private $strSexo;
		private $dateFecha_Nacimiento;
		private $strDescripcion;
		private $intClienteID;
		private $fileFoto;
		private $intStatus;



		public function __construct()
		{
			parent::__construct();
		}
		public function insertMascota(string $nombre, string $especie, string $raza,string $sexo,string $fecha, string $descripcion, int $clienteid, int $estado, string $fotito)
		{
			$return = 0;

			$this-> strNombre = $nombre;
			$this-> strEspecie = $especie;
			$this-> strRaza = $raza;
			$this-> strSexo = $sexo;
			$this-> dateFecha_Nacimiento = $fecha;
			$this-> strDescripcion = $descripcion;
			$this-> intClienteID = $clienteid;
			$this-> intStatus = $estado;
			$this-> fileFoto = $fotito;

			$query_insert  = "INSERT INTO `mascotas`(`nombre`, `especie`, `raza`, `sexo`, `fecha_nacimiento`, `descripcion`, `clienteid`, `status`, `foto`) 
									VALUES(?,?,?,?,?,?,?,?,?)";
			$arrData = array(	$this-> strNombre,
								$this-> strEspecie,
								$this-> strRaza ,
								$this-> strSexo,
								$this-> dateFecha_Nacimiento,
								$this-> strDescripcion,
								$this-> intClienteID,
								$this-> intStatus,
								$this-> fileFoto);
			$request_insert = $this->insert($query_insert,$arrData);
			
			$return = $request_insert;
			
			return $return;
		}
		
		public function selectMascotas(){
			$sql = "SELECT m.idmascota,m.nombre,m.especie,m.raza,m.sexo,m.fecha_nacimiento,m.descripcion,m.status,m.foto,
					c.nombres as dueño_nombre, c.apellidos as dueño_apellidos
					FROM mascotas m 
					INNER JOIN cliente c
					ON m.clienteid = c.idcliente
					WHERE m.status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}	
		public function selectMascota(int $idMascota){
			$this->intIdmascota = $idMascota;
			$sql = "SELECT m.idmascota,m.nombre,m.especie,m.raza,m.sexo,m.fecha_nacimiento,
					m.descripcion,m.status,m.foto, c.nombres as d_nombre, c.apellidos, c.identificacion,
					c.telefono, c.email_cliente, c.direccion, c.idcliente
			 		FROM mascotas m INNER JOIN cliente c ON m.clienteid = c.idcliente 
					WHERE m.idmascota = $this->intIdmascota";
			$request = $this->select($sql);
			return $request;
		}
		public function deleteMascota(int $idMascota)
		{
			$this->intIdmascota = $idMascota;
			$sql = "UPDATE mascotas SET status = ? WHERE idmascota = $this->intIdmascota ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function updateMascota(int $idmascota, string $nombre, string $especie, string $raza,string $sexo,string $fecha, string $descripcion, int $clienteid, int $estado,string $fotito){
			
			$this-> intIdmascota = $idmascota;
			$this-> strNombre = $nombre;
			$this-> strEspecie = $especie;
			$this-> strRaza = $raza;
			$this-> strSexo = $sexo;
			$this-> dateFecha_Nacimiento = $fecha;
			$this-> strDescripcion = $descripcion;
			$this-> intClienteID = $clienteid;
			$this-> intStatus = 1;
			$this-> fileFoto = $fotito;

			
			$sql = "UPDATE mascotas SET `nombre`=?,`especie`=?,`raza`=?,`sexo`=?,`fecha_nacimiento`=?, `descripcion`=?,`clienteid`=? ,`status`=?, `foto`=?
						WHERE idmascota = $this->intIdmascota ";
			$arrData = array(	
								$this-> strNombre,
								$this-> strEspecie,
								$this-> strRaza ,
								$this-> strSexo,
								$this-> dateFecha_Nacimiento,
								$this-> strDescripcion,
								$this-> intClienteID,
								$this-> intStatus,
								$this-> fileFoto);

			$request = $this->update($sql,$arrData);
			return $request;
		}
		// ====================================================================================================================
		// Para el registro de actividad, usuario es el que esta corriendo actualemente, es decir la persona logeada
		private $IdUsuario;
		private $NombreUsuario;
		private $tabla;
		private $Accion;
		private	$idDAto; //viene ha ser el id del campo, Ejemplo idcliente, idproducto.
		public function setRegistro( string $nombre_usu, string $nombre_tabla,string $accion,int $idDAto,int $idusu){
			$this-> NombreUsuario = $nombre_usu;
			$this-> tabla = $nombre_tabla;
			$this-> Accion = $accion;
			$this->	idDAto = $idDAto; 
			$this-> IdUsuario = $idusu;
			//`persona`, `tabla`, `accion`, `iddato`, `personaid`
			$sql = "INSERT INTO `registro`(`persona`, `tabla`, `accion`, `iddato`, `personaid` ) VALUES (?,?,?,?,?)";
			$arrRegis =array($this->NombreUsuario,$this->tabla,$this->Accion,$this->idDAto,$this->IdUsuario);
			$registro = $this->insert($sql,$arrRegis);
		}
	}
?>