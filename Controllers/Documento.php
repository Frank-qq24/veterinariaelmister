<?php 
    require 'Libraries/html2pdf/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
	require_once("Assets/plugins/dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    use Dompdf\Options;
	class Documento extends Controllers{


		public function __construct()
		{
			parent::__construct();
            session_start();
            if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
		}

		public function generarAnalisis($idAnalisis)
		{
			if(is_numeric($idAnalisis)){
                
                $data = $this-> model -> selectAnalisis($idAnalisis);
                ob_end_clean();
                $hmtl = getFile("Documento/pdfAnalisis",$data);
				$html2pdf = new Html2Pdf('p','A4','es','true','UTF-8');
                $html2pdf->writeHTML($hmtl);
                $html2pdf->output('factura-'.$idAnalisis.'.pdf');
            }else{
                echo "DAto no valido";
            }
		}
		public function printAnalisis($idAnalisis)
		{
			if(is_numeric($idAnalisis)){
                
                $data = $this-> model -> selectAnalisis_All($idAnalisis);
                ob_end_clean();
                $hmtl = getFile("Documento/pdfAnalisis",$data);
				$options = new Options();
				$options->set(array('isRemoteEnabled' => true));
				// $options = $dompdf->getOptions();
				$dompdf = new Dompdf();
				$dompdf->setOptions($options);
				$dompdf->load_html($hmtl);				// $dompdf->setPaper('A4','landscape');
				$dompdf->setPaper('A4');
				$dompdf->render();
				// nombre y descarga de pdf
				// $dompdf->stream("archivo_.pdf",array("Attachment"=>true));
				$nombre = 'Analisis_'.$idAnalisis;
				$dompdf->stream($nombre,array("Attachment"=>false));
            }else{
                echo "Dato no valido";
            }
		}
		public function printVacuna($idVacuna)
		{
			if(is_numeric($idVacuna)){
                $data = $this-> model -> selectVacuna_All($idVacuna);
                ob_end_clean();
                $hmtl = getFile("Documento/pdfVacuna",$data);
				$options = new Options();
				$options->set(array('isRemoteEnabled' => true));
				// $options = $dompdf->getOptions();
				$dompdf = new Dompdf();
				$dompdf->setOptions($options);
				$dompdf->load_html($hmtl);				// $dompdf->setPaper('A4','landscape');
				$dompdf->setPaper('A4');
				$dompdf->render();
				// nombre y descarga de pdf
				// $dompdf->stream("archivo_.pdf",array("Attachment"=>true));
				$nombre = 'Vacuna_'.$idVacuna;
				$dompdf->stream($nombre,array("Attachment"=>false));
            }else{
                echo "Dato no valido";
            }
		}
		public function printConsulta($idConsulta)
		{
			if(is_numeric($idConsulta)){
                $data = $this-> model -> selectConsulta_All($idConsulta);
                ob_end_clean();
                $hmtl = getFile("Documento/pdfConsulta",$data);
				$options = new Options();
				$options->set(array('isRemoteEnabled' => true));
				// $options = $dompdf->getOptions();
				$dompdf = new Dompdf();
				$dompdf->setOptions($options);
				$dompdf->load_html($hmtl);				// $dompdf->setPaper('A4','landscape');
				$dompdf->setPaper('A4');
				$dompdf->render();
				// nombre y descarga de pdf
				// $dompdf->stream("archivo_.pdf",array("Attachment"=>true));
				$nombre = 'Consulta_'.$idConsulta;
				$dompdf->stream($nombre,array("Attachment"=>false));
            }else{
                echo "Dato no valido";
            }
		}
	}
 ?>