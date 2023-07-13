
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ficha de Historial Médico Veterinario</title>
  <style>
		table{
			width: 100%;
		}
		table td, table th{
			font-size: 12px;
		}
		h4{
			margin-bottom: 0px;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.wd33{
			width: 33.33%;
		}
		.tbl-cliente{
			border: 1px solid #CCC;
			border-radius: 10px;
			padding: 5px;
		}
		.wd10{
			width: 10%;
		}
		.wd15{
			width: 15%;
		}
		.wd40{
			width: 40%;
		}
		.wd55{
			width: 55%;
		}
		.tbl-detalle{
			border-collapse: collapse;
		}
		.tbl-detalle thead th{
			padding: 5px;
			background-color: #009688;
			color: #FFF;
		}
		.tbl-detalle tbody td{
			border-bottom: 1px solid #CCC;
			padding: 5px;
		}
		.tbl-detalle tfoot td{
			padding: 5px;
		}
        .marca-de-agua {
            background-image: url("<?=media();?>/images/icono.png");
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: auto;
            margin: auto;
        }
        .marca-de-agua img {
            padding: 0;
            width: 100%;
            height: auto;
            opacity: 0.7;
        }
	</style>
</head>
<body>
<div class="marca-de-agua">
<img alt="" src="URL-IMAGEN" /></div>

<table class="tbl-hader">
		<tbody>
			<tr>
				<td class="wd33">
					<img src="<?=media();?>/images/icono.png">
				</td>
				<td class="text-center wd33">
					<h4><strong></strong></h4>
					<p><br>
					Teléfono:<br>
					Email:</p>
				</td>
				<td class="text-right wd33">
					<p>No. Orden <strong></strong><br>
						Fecha:  <br>
						
						Método Pago: <br>
						Transacción: 
						Método Pago: Pago contra entrega <br>
						Tipo Pago: 
					</p>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="tbl-cliente">
		<tbody>
			<tr>
				<td class="wd10">NIT:</td>
				<td class="wd40"></td>
				<td class="wd10">Teléfono:</td>
				<td class="wd40"></td>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td></td>
				<td>Dirección:</td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<div class="text-center">
		<p>Si tienes preguntas sobre tu pedido, <br> pongase en contacto con nombre, teléfono y Email</p>
		<h4>¡Gracias por tu compra!</h4>
	</div>
</body>
</html>