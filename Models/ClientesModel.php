<?php 
class ClientesModel extends Mysql
{
	private $intIdUsuario;
	private $intIdCliente;
	private $strIdentificacion;
	private $strNombre;
	private $strApellido;
	private $intTelefono;
	private $strEmail;
	private $strDireccion;
	private $strNota;
	private $intPersonaid;
	private $intStatus;


	public function __construct()
	{
		parent::__construct();
	}	

	public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, 
		string $direccion, string $nota, int $personaid, int $status){

		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strDireccion = $direccion;
		$this->strNota = $nota;
		$this->intPersonaid = $personaid;
		$this->intStatus = $status;
		$return = 0;
		//
		$sql = "SELECT * FROM cliente WHERE 
				email_cliente = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO cliente(identificacion,nombres,apellidos,telefono,email_cliente,direccion,nota,personaid,status) 
							VALUES(?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->strIdentificacion,
							$this->strNombre,
							$this->strApellido,
							$this->intTelefono,
							$this->strEmail,
							$this->strDireccion,
							$this->strNota,
							$this->intPersonaid,
							$this->intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "exist";
		}
		return $return;
	}
	public function selectClientes()
	{
		$sql = "SELECT idcliente,identificacion,nombres,apellidos,telefono,email_cliente,direccion,nota,status 
				FROM cliente WHERE status=1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCliente(int $idcliente){
		$this->intIdCliente = $idcliente;
		$sql = "SELECT idcliente,identificacion,nombres,apellidos,telefono,email_cliente,direccion,nota,status, DATE_FORMAT(datacreated, '%d-%m-%Y') as fechaRegistro 
				FROM cliente
				WHERE idcliente = $this->intIdCliente";
		$request = $this->select($sql);
		return $request;
	}

	public function deleteCliente(int $intIdCliente)
	{
		$this->intIdCliente = $intIdCliente;
		$sql = "UPDATE cliente SET status = ? WHERE idcliente = $this->intIdCliente ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}

	public function updateCliente(int $idCliente, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, 
	string $direccion, string $nota){

		$this->intIdCliente = $idCliente;
		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strDireccion = $direccion;
		$this->strNota = $nota;

		$sql = "SELECT * FROM cliente WHERE (email_cliente = '{$this->strEmail}' AND idcliente != $this->intIdCliente)
									  OR (identificacion = '{$this->strIdentificacion}' AND idcliente != $this->intIdCliente) ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE cliente SET identificacion=?, nombres=?, apellidos=?, telefono=?, email_cliente=?, direccion=?, nota=? 
						WHERE idcliente = $this->intIdCliente ";
				$arrData = array($this->strIdentificacion,
								$this->strNombre,
								$this->strApellido,
								$this->intTelefono,
								$this->strEmail,
								$this->strDireccion,
								$this->strNota);
				$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}
}
 ?>