<?php
$vacuna = $data['vacuna'];
$historia = $data['historia'];
$mascota = $data['mascota'];
$cliente = $data['cliente'];
$veterinario = $data['persona'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/reporte.css">
    <title>Ficha de Vacuna</title>
</head>

<body>
    <table class="tbl-hader">
        <tbody>
            <tr>
                <td class="wd33">
                    <img src="<?= media(); ?>/images/recursos/nombre2.jpg" class="logo">
                </td>
                <td class="text-center wd33">
                    <h1><strong>Ficha de vacuna Medica</strong></h1>
                    <p>Fecha: <?= $vacuna['fecha']; ?></p>
                </td>
                <td class="text-right wd33">
                    <img src="<?= media(); ?>/images/recursos/icono2.png" class="logo">
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="hr_color">
    <div class="content">
        <div class="table-wrapper">
            <table>
                <tr>
                    <td colspan="4" class="celda-destacada">Veterinario Encargado</td>
                </tr>
                <tr>
                    <td><strong>Codigo:</strong></td>
                    <td><?= $veterinario['nit']; ?></td>
                    <td><strong>Nombres y Apellidos:</strong> </td>
                    <td><?= $veterinario['nombres'] . ' ' . $veterinario['apellidos']; ?></td>
                </tr>
                <!-- <tr>
                    <td><strong>Nombres:</strong> </td>
                    <td><?= $veterinario['nombres']; ?></td>
                    <td><strong>Correo:</strong> </td>
                    <td><?= $veterinario['email_user']; ?></td>
                </tr>
                <tr>
                    <td><strong>Apellidos:</strong> </td>
                    <td><?= $veterinario['apellidos']; ?></td>
                    <td><strong>Telefono:</strong></td>
                    <td><?= $veterinario['telefono']; ?></td>
                </tr> -->
            </table>

            <table>
                <tr>
                    <td colspan="6" class="celda-destacada"><strong>Datos del Dueño</strong> </td>
                </tr>
                <tr>
                    <td><strong>Indentificación:</strong> </td>
                    <td><?= $cliente['identificacion']; ?></td>
                    <td><strong>Nombres:</strong></td>
                    <td><?= $cliente['nombres']; ?></td>
                    <td><strong>Apellidos:</strong> </td>
                    <td><?= $cliente['apellidos']; ?></td>
                </tr>
                <tr>
                    <td><strong>Correo: </strong></td>
                    <td colspan="2"><?= $cliente['email_cliente']; ?></td>
                    <td><strong>Telefono:</strong> </td>
                    <td colspan="2"><?= $cliente['telefono']; ?></td>
                </tr>
                <tr>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="8" class="celda-destacada"><strong>Datos de la Mascota</strong></td>
                </tr>
                <tr>
                    <td><strong>Nombre:</strong> </td>
                    <td><?= $mascota['nombre']; ?></td>
                    <td><strong>Especie:</strong> </td>
                    <td><?= $mascota['especie']; ?></td>
                    <td><strong>Raza:</strong> </td>
                    <td><?= $mascota['raza']; ?></td>
                    <td><strong>Sexo:</strong> </td>
                    <td><?= $mascota['sexo']; ?></td>
                </tr>
                <tr>
                    <td><strong>Edad:</strong> </td>
                    <td><?= edadMascota($mascota['fecha_nacimiento']); ?></td>
                    <td><strong>Descripción:</strong> </td>
                    <td colspan="5"><?= $mascota['descripcion']; ?></td>
                </tr>
                <tr>
                </tr>
            </table>

            <table>
                <tr>
                    <td colspan="4" class="celda-destacada"><strong>vacuna</strong></td>
                </tr>
                <tr>
                    <td><strong>Tipo de vacuna:</strong> </td>
                    <td><?= $vacuna['vacuna']; ?></td>
                    <td><strong>Dosis:</strong> </td>
                    <td><?= $vacuna['dosis']; ?> ml</td>
                </tr>
                <tr>
                    <td><strong>Codigo:</strong> </td>
                    <td><?= $vacuna['codigo']; ?></td>
                    <td><strong>Nota (Opcional):</strong></td>
                    <td><?= $vacuna['nota']; ?></td>
                </tr>
            </table>


        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        
    </div>
    <div class="footer">
        <hr class="hr_color">
        <span> <img src="<?= media(); ?>/images/recursos/direccion.svg" width="18"> Mz. D1 Lt.6, Las Orquídeas, San Bartolo </span>
        <span><img src="<?= media(); ?>/images/recursos/phone.svg" width="18"> 2726085 - 990116813 - 980203488</span>
    </div>
</body>

</html>