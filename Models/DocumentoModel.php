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

	}