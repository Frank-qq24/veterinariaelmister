<?php

    $proforma = $data['proforma'];
    $detalle = $data['detalle'];
    $persona = $data['persona'];
	# Incluyendo librerias necesarias #
    // require_once(media()."/plugins/FPDF/code128.php");
    require_once("Assets/plugins/FPDF/code128.php");
    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Veterinaria el mister")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: Mz. D1 Lt.6, Las Orquídeas, San Bartolo"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 2726085"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: veterinariamister@gmail.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".$proforma['fecha']." ".date("h:s A")),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Caja Nro: 1"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Encargado: ".$persona['nombres']." ".$persona['apellidos']),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro:".$proforma['idproforma'])),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,utf8_decode("Producto."),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Cantidad"),0,0,'C');
    $pdf->Cell(15,5,utf8_decode("Precio."),0,0,'C');
    $pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    foreach ($detalle as $objeto) {
        $pdf->Ln(3);
        $pdf->Cell(10,5,utf8_decode("".$objeto['productoid']),0,0,'C');
        $pdf->Cell(19,5,utf8_decode("".$objeto['cantidad']),0,0,'C');
        $pdf->Cell(15,5,utf8_decode("".$objeto['precio']),0,0,'C');
        $pdf->Cell(28,5,utf8_decode("".$objeto['subtotal']),0,0,'C');
    }

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("S/".$proforma['total']),0,0,'C');

    

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("*** La proforma incluye todos los productos seleccionados***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Veterinaria el mister con el mejores productos"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"c2d22f00d",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);