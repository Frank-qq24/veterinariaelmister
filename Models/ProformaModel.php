<?php 

	class ProformaModel extends Mysql
	{	
		// PARA PROFORMA
		private $Idproforma;
		private $Personaid;
		private $Total;
		private $Cantidad;
		private $Status;
		private $Clienteid;
		private $Datecreated;
		private $Ventaid;
		//DETALLE PROFORMA
		private $IdPDetallePro;
		private $ProformaId;
		private $ProductoId;
		// private $Cantidad;
		private $Precio;
		private $Subtotal;
		
		public function __construct()
		{
			parent::__construct();
		}	

		public function insertProforma(int $perso, float $tota, int $canti, string $estado){
			// $this->Idproforma = ;
			$this->Personaid = $perso;
			$this->Total = $tota;
			$this->Cantidad = $canti;
			$this->Status = $estado;
			// $this->Clienteid = $clien;
			// $this->Datecreated = $;
			// $this->Ventaid = $vent;
			$return = 0;
			$query_insert  = "INSERT INTO proforma( `personaid`, `total`, `cantidad`, `status`) 
								VALUES(?,?,?,?)";
			$arrData = array($this->Personaid,
							$this->Total,
							$this->Cantidad,
							$this->Status
						);
			$request_insert = $this->insert($query_insert,$arrData);
			$return = $request_insert;
			
	        return $return;
		}
		public function insertDetalle_pro(int $profo, int $produc, int $canti, float $prec, float $sub){
			// $this->IdPDetallePro = $;
			$this->ProformaId = $profo;
			$this->ProductoId = $produc;
			$this->Cantidad = $canti;
			$this->Precio = $prec;
			$this->Subtotal = $sub;
			
			$return = 0;

				$query_insert  = "INSERT INTO `detalle_pro`(`proformaid`, `productoid`, `cantidad`, `precio`, `subtotal`)
								  VALUES(?,?,?,?,?)";
	        	$arrData = array($this->ProformaId,
        						$this->ProductoId,
        						$this->Cantidad,
        						$this->Precio,
        						$this->Subtotal);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function deleteProforma(int $idProforma)
		{
			$this->Idproforma = $idProforma;
			$sql = "DELETE FROM `proforma` WHERE  idproforma = $this->Idproforma ";
			$request = $this->delete($sql);
			return $request;
		}
		public function deleteDetalleProforma(int $idProforma)
		{
			$this->Idproforma = $idProforma;
			$sql = "DELETE FROM `detalle_pro` WHERE idpdetalle_pro  = $this->Idproforma ";
			$request = $this->delete($sql);
			return $request;
		}

		public function selectProformas(){
			$sql = "SELECT
						p.idproforma,
						p.personaid,
						p.total,
						p.clienteid,
						p.datecreated,
						p.ventaid,
						p.status,
						ps.nombres AS nombres,
						ps.apellidos AS apellidos
					FROM
						proforma p
					INNER JOIN persona ps ON
						p.personaid = ps.idpersona
					WHERE
						p.status = 'Pendiente'";
					$request = $this->select_all($sql);
			return $request;
		}
		public function selectDetalle_pro(int $idProforma){
			$this->Idproforma = $idProforma;
			$sql = "SELECT * FROM `detalle_pro` 
					WHERE proformaid = $this->Idproforma;";
					$request = $this->select_all($sql);
			return $request;
		}

		public function updateProductoStock_D(int $idproducto, int $cantidad){
			$this->ProductoId = $idproducto;
			$this->Cantidad = $cantidad;
			$sql = "UPDATE producto SET stock = stock - ?
					WHERE idproducto = ? ";
			$arrData = array($this->Cantidad, $this->ProductoId);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function updateProductoStock_A(int $idproducto, int $cantidad){
			$this->ProductoId = $idproducto;
			$this->Cantidad = $cantidad;
			$return = 0;
			$sql = "UPDATE producto 
						SET stock = stock + ?
						WHERE idproducto = $this->ProductoId ";
			$arrData = array($this->Cantidad);
			$request = $this->update($sql,$arrData);
			$return = $request;
			return $return;
		}
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
