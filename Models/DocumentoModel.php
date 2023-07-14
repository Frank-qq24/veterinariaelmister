<?php 

	class DocumentoModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

        // GENERALES
        private $strDiagonsotico;
        private $strTratamiento;
        private $intPersonaID;
        private $intHistorialID;
        private $dateDatecreated;

        // PARA VACUNAS
        private $intIdvacuna;
        private $strVacuna;
        private $intDosis;
        private $strCodigo;
        private $strNota;
        
        // PARA CONSULTAS
        private $intIdconsulta;
        private $decTemperatura;
        private $decPeso;
        private $intFrecuencia;
        private $strMotivo;
        private $strAnamnesis;
        
        // PARA ANALISIS
        private $intIdAnalisis;
        private $strTipo;
        private $srtRutafile;

        // PARA CLIENTES
        private $intIdCliente;
        private $strIdentificacion;
        private $strNombre;
        private $strApellido;
        private $intTelefono;
        private $strEmail;
        private $strDireccion;
        // private $strNota;
        private $intPersonaid;
        private $intStatus;
        
        // PARA MASCOTAS
        // private $intIdmascota;
		// private $strNombre;
		private $strEspecie;
		private $strRaza;
		private $strSexo;
		private $dateFecha_Nacimiento;
		private $strDescripcion;
		private $intClienteID;
		private $fileFoto;
		// private $intStatus;
		// private $intPersonaID;

        // PARA USUARIOS
        private $intIdUsuario;
		// private $strIdentificacion;
		// private $strNombre;
		// private $strApellido;
		// private $intTelefono;
		// private $strEmail;
		private $strPassword;
		private $strToken;
		private $intTipoId;
		// private $intStatus;
		private $strNit;
		private $strNomFiscal;
		private $strDirFiscal;
        // -------------------------------MODELOS PARA VACUNAS--------------------------------- //

		public function selectVacuna(int $vacunaid){
            $this->intIdvacuna =$vacunaid;
			$sql = "SELECT v.idvacuna, v.vacuna, v.dosis, v.codigo, v.nota, v.historialid, v.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, p.identificacion AS p_dni, p.telefono as p_telefono, p.email_user as p_email_user, m.nombre AS m_nombre,
             m.especie, m.raza, m.sexo, m.fecha_nacimiento, c.nombres as c_nombres, c.apellidos as c_apellidos, c.telefono as c_telefono, c.direccion 
             FROM vacunas v INNER JOIN historial_clinico h ON h.idhistorial = v.historialid INNER JOIN mascotas m ON m.idmascota = h.mascotaid 
             INNER JOIN cliente c ON c.idcliente = m.clienteid INNER JOIN persona p ON p.idpersona = v.personaid WHERE v.idvacuna  = $this->intIdvacuna";
			$request = $this->select($sql);
			return $request;
		}
        // -------------------------------MODELOS PARA VACUNAS--------------------------------- //
        public function selectConsulta(int $consultaid){
            $this->intIdconsulta =$consultaid;
			$sql = "SELECT c.idconsulta, c.temperatura, c.peso, c.frecuencia, c.motivo, c.diagnostico, c.tratamiento, c.historialid, c.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, p.identificacion AS p_dni, p.telefono AS p_telefono, p.email_user AS p_email_user,
                m.nombre AS m_nombre, m.especie, m.raza, m.sexo, m.fecha_nacimiento, cl.nombres AS c_nombres, cl.apellidos AS c_apellidos, cl.telefono AS c_telefono, cl.direccion FROM consulta c INNER JOIN historial_clinico h ON h.idhistorial = c.historialid INNER JOIN mascotas m ON m.idmascota = h.mascotaid 
                INNER JOIN cliente cl ON cl.idcliente = m.clienteid INNER JOIN persona p ON p.idpersona = c.personaid WHERE c.idconsulta = = $this->intIdconsulta";
			$request = $this->select($sql);
			return $request;
		}
        // -------------------------------MODELOS PARA ANALISIS--------------------------------- //
        public function selectAnalisis(int $analisisid){
            $this->intIdAnalisis =$analisisid;
			$sql = "SELECT a.idanalisis, a.tipo, a.rutafile, a.diagnostico, a.historialid, a.tratamiento, a.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, p.identificacion AS p_dni, p.telefono AS p_telefono, p.email_user AS p_email_user, m.nombre AS m_nombre, m.especie, m.raza, m.sexo, m.fecha_nacimiento, c.nombres AS c_nombres, c.apellidos AS c_apellidos, c.telefono AS c_telefono, c.direccion FROM analisis a INNER JOIN historial_clinico h ON h.idhistorial = a.historialid 
            INNER JOIN mascotas m ON m.idmascota = h.mascotaid INNER JOIN cliente c ON c.idcliente = m.clienteid 
            INNER JOIN persona p ON p.idpersona = a.personaid WHERE a.idanalisis = $this->intIdAnalisis";
			$request = $this->select($sql);
			return $request;
		}
        // ============================================= MODELOS GENERALES==================================================== //
        private $intIdmascota;
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

        public function selectHistorial()
        {
            $sql = "SELECT h.idhistorial, m.idmascota, m.nombre, m.especie, m.status, c.nombres 
                    AS d_nombre, c.apellidos, c.identificacion, c.idcliente 
                    FROM historial_clinico h 
                    INNER JOIN mascotas m ON h.mascotaid = m.idmascota 
                    INNER JOIN cliente c ON m.clienteid = c.idcliente";
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
        
        public function selectUsuario(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT p.idpersona,p.identificacion,p.nombres,p.apellidos,p.telefono,p.email_user,p.nit,p.nombrefiscal,p.direccionfiscal,r.idrol,r.nombrerol,p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro 
					FROM persona p
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
        
        public function selectAnalisis_All(int $idAnalisis){
			$request = array();
            // =========================================== Analisis
			$sql = "SELECT `idanalisis`, `tipo`, `rutafile`, `diagnostico`, `tratamiento`, `historialid`, `personaid`, `datecreated` as fecha
                    FROM `analisis`
					WHERE idanalisis =  $idAnalisis ";
			$requestAnalisis = $this->select($sql);
            
			if(!empty($requestAnalisis)){
                // =========================================== Historial
				$idhistorial = $requestAnalisis['historialid'];
				$sql_Historia = "SELECT `idhistorial`, `mascotaid`, `personaid`, `datecreated`as fecha, `updated` 
                                FROM `historial_clinico`
                                WHERE idhistorial = $idhistorial ";
				$requestHistoria = $this->select($sql_Historia);
                // =========================================== Mascota
                $idMascota = $requestHistoria['mascotaid'];
				$sql_mascota = "SELECT `idmascota`, `nombre`, `especie`, `raza`, `sexo`, `fecha_nacimiento`, `descripcion`, `clienteid`, `foto`, `datecreated`, `status` 
                                FROM `mascotas`
								WHERE idmascota = $idMascota";
				$requestMascota = $this->select($sql_mascota);
                // =========================================== Cliente dueño de mascota
                $idCliente = $requestMascota['clienteid'];
				$sql_Cliente = "SELECT `idcliente`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_cliente`, `direccion`, `nota`, `status` 
                                FROM `cliente`
								WHERE idcliente = $idCliente";
				$requestCliente = $this->select($sql_Cliente);
                // =========================================== Veterinario que atendio
                $idPersona = $requestAnalisis['personaid'];
				$sql_persona = "SELECT `idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `nit`, `nombrefiscal`, `direccionfiscal`
                                FROM `persona`
								WHERE idpersona = $idPersona";
				$requestPersona = $this->select($sql_persona);
                // =========================================== Datos de Envio
				$request = array('analisis' => $requestAnalisis,
								'historia' => $requestHistoria,
								'mascota' => $requestMascota,
								'cliente' => $requestCliente,
								'persona' => $requestPersona
								);
			}
            if (empty($request)){
                $request = array('msg' => "Error en busqueda");
                return $request;
            }else{
                return $request;
            }
		}
        public function selectVacuna_All(int $idVacuna){
			$request = array();
            // =========================================== Analisis
			$sql = "SELECT `idvacuna`, `vacuna`, `dosis`, `codigo`, `nota`, `historialid`, `personaid`, `datecreated` as fecha
                    FROM `vacunas`  
                    WHERE idvacuna =  $idVacuna ";
			$requestVacuna = $this->select($sql);
            
			if(!empty($requestVacuna)){
                // =========================================== Historial
				$idhistorial = $requestVacuna['historialid'];
				$sql_Historia = "SELECT `idhistorial`, `mascotaid`, `personaid`, `datecreated`as fecha, `updated` 
                                FROM `historial_clinico`
                                WHERE idhistorial = $idhistorial ";
				$requestHistoria = $this->select($sql_Historia);
                // =========================================== Mascota
                $idMascota = $requestHistoria['mascotaid'];
				$sql_mascota = "SELECT `idmascota`, `nombre`, `especie`, `raza`, `sexo`, `fecha_nacimiento`, `descripcion`, `clienteid`, `foto`, `datecreated`, `status` 
                                FROM `mascotas`
								WHERE idmascota = $idMascota";
				$requestMascota = $this->select($sql_mascota);
                // =========================================== Cliente dueño de mascota
                $idCliente = $requestMascota['clienteid'];
				$sql_Cliente = "SELECT `idcliente`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_cliente`, `direccion`, `nota`, `status` 
                                FROM `cliente`
								WHERE idcliente = $idCliente";
				$requestCliente = $this->select($sql_Cliente);
                // =========================================== Veterinario que atendio
                $idPersona = $requestVacuna['personaid'];
				$sql_persona = "SELECT `idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `nit`, `nombrefiscal`, `direccionfiscal`
                                FROM `persona`
								WHERE idpersona = $idPersona";
				$requestPersona = $this->select($sql_persona);
                // =========================================== Datos de Envio
				$request = array('vacuna' => $requestVacuna,
								'historia' => $requestHistoria,
								'mascota' => $requestMascota,
								'cliente' => $requestCliente,
								'persona' => $requestPersona
								);
			}
            if (empty($request)){
                $request = array('msg' => "Error en busqueda");
                return $request;
            }else{
                return $request;
            }
		}
        public function selectConsulta_All(int $idConsulta){
			$request = array();
            // =========================================== Analisis
			$sql = "SELECT `idconsulta`, `temperatura`, `peso`, `frecuencia`, `motivo`, `anamnesis`, `diagnostico`, `tratamiento`, `personaid`, `historialid`, `datecreated` as fecha
                    FROM `consulta` 
                    WHERE idconsulta =  $idConsulta ";
			$requestConsulta = $this->select($sql);
            
			if(!empty($requestConsulta)){
                // =========================================== Historial
				$idhistorial = $requestConsulta['historialid'];
				$sql_Historia = "SELECT `idhistorial`, `mascotaid`, `personaid`, `datecreated`as fecha, `updated` 
                                FROM `historial_clinico`
                                WHERE idhistorial = $idhistorial ";
				$requestHistoria = $this->select($sql_Historia);
                // =========================================== Mascota
                $idMascota = $requestHistoria['mascotaid'];
				$sql_mascota = "SELECT `idmascota`, `nombre`, `especie`, `raza`, `sexo`, `fecha_nacimiento`, `descripcion`, `clienteid`, `foto`, `datecreated`, `status` 
                                FROM `mascotas`
								WHERE idmascota = $idMascota";
				$requestMascota = $this->select($sql_mascota);
                // =========================================== Cliente dueño de mascota
                $idCliente = $requestMascota['clienteid'];
				$sql_Cliente = "SELECT `idcliente`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_cliente`, `direccion`, `nota`, `status` 
                                FROM `cliente`
								WHERE idcliente = $idCliente";
				$requestCliente = $this->select($sql_Cliente);
                // =========================================== Veterinario que atendio
                $idPersona = $requestConsulta['personaid'];
				$sql_persona = "SELECT `idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `nit`, `nombrefiscal`, `direccionfiscal`
                                FROM `persona`
								WHERE idpersona = $idPersona";
				$requestPersona = $this->select($sql_persona);
                // =========================================== Datos de Envio
				$request = array('consulta' => $requestConsulta,
								'historia' => $requestHistoria,
								'mascota' => $requestMascota,
								'cliente' => $requestCliente,
								'persona' => $requestPersona
								);
			}
            if (empty($request)){
                $request = array('msg' => "Error en busqueda");
                return $request;
            }else{
                return $request;
            }
		}
	}