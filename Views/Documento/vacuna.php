<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ficha de Historial Médico Veterinario</title>

  <style>
    table {
      width: 100%;
    }

    table td,
    table th {
      font-size: 12px;
    }

    h4 {
      margin-bottom: 0px;
    }

    .text-center {
      text-align: center;
    }

    .text-right {
      text-align: right;
    }

    .wd33 {
      width: 33.33%;
    }

    .tbl-cliente {
      border: 1px solid #CCC;
      border-radius: 10px;
      padding: 5px;
    }

    .wd10 {
      width: 10%;
    }

    .wd15 {
      width: 15%;
    }

    .wd40 {
      width: 40%;
    }

    .wd55 {
      width: 55%;
    }

    .tbl-detalle {
      border-collapse: collapse;
    }

    .tbl-detalle thead th {
      padding: 5px;
      background-color: #009688;
      color: #FFF;
    }

    .tbl-detalle tbody td {
      border-bottom: 1px solid #CCC;
      padding: 5px;
    }

    .tbl-detalle tfoot td {
      padding: 5px;
    }

    .logo {
      width: 80%;
      height: auto;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url("<?= media(); ?>/images/recursos/icono2.png");
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center;
      opacity: 0.1;
      position: relative;
    }

    .content {
      width: 100%;
      max-width: 800px;
      /* Ancho máximo del contenido */
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
    }

    .footer {
      width: 100%;
      text-align: center;
      position: fixed;
    }

    .header {
      top: 0px;
    }

    .footer {
      bottom: 0px;
    }

    hr {
      border: none;
      height: 4px;
      /* Ajusta la altura deseada */
      background-color: #25AE8F;
    }
    
  </style>
</head>

<body>
  <div class="content">

    <table class="tbl-hader">
      <tbody>
        <tr>
          <td class="wd33">
            <img src="<?= media(); ?>/images/recursos/nombre2.jpg" class="logo">
          </td>
          <td class="text-center wd33">
            <h1><strong>Ficha de Analisis Medico</strong></h1>
            <p>Fecha</p>
          </td>
          <td class="text-right wd33">
            <img src="<?= media(); ?>/images/recursos/icono2.png" class="logo">
          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <br>
    <h4>Cliente:</h4>
    <br>
    <table class="tbl-cliente">
      <tbody>
        <tr>
          <td class="wd10">Nombre:</td>
          <td class="wd10">Apellido</td>
          <td class="wd10">Teléfono:</td>
          <td class="wd10">Correo</td>
        </tr>
        <tr>
          <td>Dirección:</td>
          <td>Edad</td>
          <td>:</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table>
      <tbody>
        <tr>
          <td>Cabeza</td>
          <td>Cabeza</td>
          <td>Cabeza</td>
          <td>Cabeza</td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td>cuerpo</td>
          <td>cuerpo</td>
          <td>cuerpo</td>
          <td>cuerpo</td>
        </tr>
      </tbody>
    </table>

  </div>
  <div class="footer">
    <hr>
    <h6>Direccion</h6>
  </div>
</body>

</html>