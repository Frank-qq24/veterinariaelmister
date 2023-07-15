<?php 

	class ClinicaModel extends Mysql
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
		public function selectVacunas_All(){
			$sql = "SELECT `idvacuna`, `vacuna`, `dosis`, `codigo`, `nota`, `historialid`, `personaid` FROM `vacunas`";
			$request = $this->select_all($sql);
			return $request;
		}
		public function selectVacuna_hist(int $vacunaid){
            $this->intIdvacuna =$vacunaid;
			$sql = "SELECT v.idvacuna, v.vacuna, v.dosis, v.codigo, v.nota, v.historialid, v.datecreated AS fecha, 
                    p.nombres AS p_nombre, p.apellidos as p_apellidos, p.identificacion AS p_dni 
                    FROM vacunas v INNER JOIN persona p ON p.idpersona = v.personaid 
                    WHERE v.historialid = $this->intIdvacuna
                    ORDER BY v.datecreated DESC";
			$request = $this->select_all($sql);
			return $request;
		}
		public function selectVacuna(int $vacunaid){
            $this->intIdvacuna =$vacunaid;
			$sql = "SELECT v.idvacuna, v.vacuna, v.dosis, v.codigo, v.nota, v.historialid, v.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, p.identificacion AS p_dni, p.telefono as p_telefono, p.email_user as p_email_user, m.nombre AS m_nombre,
             m.especie, m.raza, m.sexo, m.fecha_nacimiento, c.nombres as c_nombres, c.apellidos as c_apellidos, c.telefono as c_telefono, c.direccion 
             FROM vacunas v INNER JOIN historial_clinico h ON h.idhistorial = v.historialid INNER JOIN mascotas m ON m.idmascota = h.mascotaid 
             INNER JOIN cliente c ON c.idcliente = m.clienteid INNER JOIN persona p ON p.idpersona = v.personaid WHERE v.idvacuna  = $this->intIdvacuna";
			$request = $this->select($sql);
			return $request;
		}
		public function insertVacuna(string $vacuna, int $dosis, string $codigo, string $nota, int $historialid, int $persinaid){
            $this->strVacuna = $vacuna;
            $this->intDosis = $dosis;
            $this->strCodigo = $codigo;
            $this->strNota = $nota;
            $this->intHistorialID = $historialid;
            $this->intPersonaID = $persinaid;
			$query_insert = "INSERT INTO `vacunas`(`vacuna`, `dosis`, `codigo`, `nota`, `historialid`, `personaid`) 
                    VALUES (?,?,?,?,?,?)";
			$arrData = array($this->strVacuna,
                            $this->intDosis,
                            $this->strCodigo,
                            $this->strNota,
                            $this->intHistorialID, 
                            $this->intPersonaID);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			return $return;
		}
        // -------------------------------MODELOS PARA VACUNAS--------------------------------- //
        public function selectConsultas(){
			$sql = "SELECT `idconsulta`, `temperatura`, `peso`, `frecuencia`, `motivo`, `anamnesis`, `diagnostico`, `tratamiento`, `personaid`, `historialid` 
                    FROM `consulta` ";
			$request = $this->select_all($sql);
			return $request;
		}
        public function selectConsulta(int $consultaid){
            $this->intIdconsulta =$consultaid;
			$sql = "SELECT c.idconsulta, c.temperatura, c.peso, c.frecuencia, c.motivo,c.anamnesis,  c.diagnostico, c.tratamiento, c.historialid, c.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, p.identificacion AS p_dni, p.telefono AS p_telefono, p.email_user AS p_email_user,
                m.nombre AS m_nombre, m.especie, m.raza, m.sexo, m.fecha_nacimiento, cl.nombres AS c_nombres, cl.apellidos AS c_apellidos, cl.telefono AS c_telefono, cl.direccion FROM consulta c INNER JOIN historial_clinico h ON h.idhistorial = c.historialid INNER JOIN mascotas m ON m.idmascota = h.mascotaid 
                INNER JOIN cliente cl ON cl.idcliente = m.clienteid INNER JOIN persona p ON p.idpersona = c.personaid WHERE c.idconsulta = $this->intIdconsulta";
			$request = $this->select($sql);
			return $request;
		}
		public function selectConsulta_hist(int $consultaid){
            $this->intIdconsulta =$consultaid;
			$sql = "SELECT c.idconsulta, c.temperatura, c.peso, c.frecuencia, c.motivo, c.anamnesis, c.diagnostico, c.tratamiento, c.personaid, c.historialid, c.datecreated 
                    AS fecha, p.nombres AS p_nombre, p.apellidos as p_apellidos, p.identificacion AS p_dni FROM consulta c 
                    INNER JOIN persona p ON p.idpersona = c.personaid 
                    WHERE c.historialid = $this->intIdconsulta
                    ORDER BY c.datecreated DESC";
			$request = $this->select_all($sql);
			return $request;
		}
        public function insertConsulta(float $Temperatura, float $peso, int $frecuencia, string $motivo, string $anamnesis, string $diagnostico, string $tratamiento, int $historialid, int $persinaid){
            $this->decTemperatura = $Temperatura;
            $this->decPeso = $peso;
            $this->intFrecuencia = $frecuencia;
            $this->strMotivo = $motivo;
            $this->strAnamnesis = $anamnesis;
            $this->strDiagonsotico = $diagnostico;
            $this->strTratamiento = $tratamiento;
            $this->intHistorialID = $historialid;
            $this->intPersonaID = $persinaid;
			$query_insert = "INSERT INTO `consulta`(`temperatura`, `peso`, `frecuencia`, `motivo`, `anamnesis`, `diagnostico`, `tratamiento`, `personaid`, `historialid`)
                    VALUES (?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->decTemperatura, 
                            $this->decPeso ,
                            $this->intFrecuencia ,
                            $this->strMotivo ,
                            $this->strAnamnesis ,
                            $this->strDiagonsotico, 
                            $this->strTratamiento,
                            $this->intPersonaID,
                            $this->intHistorialID);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			return $return;
		}
        
        // -------------------------------MODELOS PARA ANALISIS--------------------------------- //
        public function selectAnalisiss(){
			$sql = "SELECT `idanalisis`, `tipo`, `rutafile`, `diagnostico`, `tratamiento`, `historialid`, `personaid` FROM `analisis`";
			$request = $this->select_all($sql);
			return $request;
		}
		public function selectAnalisis_hist(int $idhistorial){
            $this->intHistorialID =$idhistorial;
			$sql = "SELECT a.idanalisis, a.tipo, a.rutafile, a.diagnostico, a.tratamiento, a.historialid, a.personaid, a.datecreated AS fecha, p.nombres, p.apellidos
                    FROM analisis a
                    INNER JOIN persona p ON a.personaid = p.idpersona
                    WHERE a.historialid = $this->intHistorialID";
			$request = $this->select_all($sql);
			return $request;
		}

		public function insertAnalisis(string $tipo, string $ruta, string $diagnostico, string $tratamiento, int $historialid, int $persinaid){
            $this->strTipo = $tipo;
            $this->srtRutafile = $ruta;
            $this->strDiagonsotico = $diagnostico;
            $this->strTratamiento = $tratamiento;
            $this->intHistorialID = $historialid;
            $this->intPersonaID = $persinaid;
			$query_insert = "INSERT INTO `analisis`(`tipo`, `rutafile`, `diagnostico`, `tratamiento`, `historialid`, `personaid`)
                    VALUES (?,?,?,?,?,?)";
			$arrData = array($this->strTipo,
                            $this->srtRutafile,
                            $this->strDiagonsotico,
                            $this->strTratamiento,
                            $this->intHistorialID, 
                            $this->intPersonaID);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			return $return;
		}

        public function selectAnalisis(int $analisisid){
            $this->intIdAnalisis =$analisisid;
			$sql = "SELECT a.idanalisis, a.tipo, a.rutafile, a.diagnostico, a.historialid, a.tratamiento, a.datecreated AS fecha, p.nombres AS p_nombre, p.apellidos AS p_apellidos, 
            p.identificacion AS p_dni, p.telefono AS p_telefono, p.email_user AS p_email_user, m.nombre AS m_nombre, m.especie, m.raza, m.sexo, m.fecha_nacimiento, c.nombres AS c_nombres, 
            c.apellidos AS c_apellidos, c.telefono AS c_telefono, c.direccion FROM analisis a INNER JOIN historial_clinico h ON h.idhistorial = a.historialid 
            INNER JOIN mascotas m ON m.idmascota = h.mascotaid INNER JOIN cliente c ON c.idcliente = m.clienteid 
            INNER JOIN persona p ON p.idpersona = a.personaid WHERE a.idanalisis = $this->intIdAnalisis";
			$request = $this->select($sql);
			return $request;
		}
        // -------------------------------MODELOS PARA NOTAS--------------------------------- //
        private $intIDnotas;
        // private $strNota;
        public function insertNota(string $nota, int $persona, int $historia){
            $this->strNota = $nota;
            $this->intPersonaID = $persona;
            $this->intHistorialID = $historia;
			$query_insert = "INSERT INTO `notas`(`nota`, `personaid`, `historialid`) 
                    VALUES (?,?,?)";
			$arrData = array($this->strNota,
                            $this->intPersonaID,
                            $this->intHistorialID
                        );
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			return $return;
		}
        public function selectNotas(){
			$sql = "SELECT `idnota`, `nota`, `personaid`, `historialid`, `datecreated` as fecha, `updated` FROM `notas` WHERE 1";
			$request = $this->select_all($sql);
			return $request;
		}
        public function selectNotas_hist(int $idhistorial){
            $this->intHistorialID =$idhistorial;
			$sql = "SELECT
                        n.idnota,
                        n.nota,
                        n.personaid,
                        n.historialid,
                        n.datecreated as fecha,
                        p.idpersona,
                        p.nombres,
                        p.apellidos
                    FROM
                        notas n
                    INNER JOIN persona p ON
                        n.personaid = p.idpersona
                    WHERE
                        n.historialid =  $this->intHistorialID
                    ORDER BY n.datecreated DESC";
			$request = $this->select_all($sql);
			return $request;
		}
        public function deleteNota(int $idnota)
		{
			$this->intIDnotas = $idnota;
			$sql = "DELETE FROM `notas` WHERE idnota = $this->intIDnotas ";
			$request = $this->delete($sql);
			return $request;
		}
        public function selectNota(int $consultaid){
            $this->intIdconsulta =$consultaid;
			$sql = "SELECT
                        n.idnota,
                        n.nota,
                        n.personaid,
                        n.historialid,
                        DATE_FORMAT(n.datecreated, '%Y-%m-%d') as fecha,
                        p.idpersona,
                        p.nombres,
                        p.apellidos
                    FROM
                        notas n
                    INNER JOIN persona p ON
                        n.personaid = p.idpersona
                    WHERE
                        n.idnota =  $this->intIdconsulta";
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
