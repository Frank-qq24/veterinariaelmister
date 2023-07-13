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
		public function generarAnalisis2($idAnalisis)
		{
			if(is_numeric($idAnalisis)){
                
                $data = $this-> model -> selectAnalisis($idAnalisis);
                ob_end_clean();
                $hmtl = getFile("Documento/vacuna",$data);
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
				$dompdf->stream("archivo_.pdf",array("Attachment"=>false));
            }else{
                echo "Dato no valido";
            }
		}
	}
 ?>