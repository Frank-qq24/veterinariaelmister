<?php
headerAdmin($data);
getModal('modalClinica', $data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clinica">Clinica</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clinica/historial">Historial</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="tile p-0">
                <div class="card">
                    <img id="imgVistaMascota" src="<?= media(); ?>/images/uploads/<?= $data['perfil']['foto'] ?>" alt="Imagen de perfil">
                </div>
                <h4 class="tile-title folder-head">Perfil Mascota</h4>
                <div class="tile-body">
                    <ul class="nav nav-pills flex-column mail-nav">
                        <li class="nav-item ">
                            <div class="nav-link" href="#"><i class="fa fa-github fa-fw"></i> <strong>Nombre: </strong> <span id="txtMas_nombre" style="font-size:large;"><?= $data['perfil']['nombre'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-braille fa-fw"></i> <strong>Especie: </strong><span id="txtMas_especie" style="font-size:large;"><?= $data['perfil']['especie'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-venus-mars fa-fw"></i> <strong>Sexo: </strong><span id="txtMas_sexo" style="font-size:large;"><?= $data['perfil']['sexo'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-circle fa-fw"></i> <strong>Raza: </strong><span id="txtMas_raza" style="font-size:large;"><?= $data['perfil']['raza'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-birthday-cake fa-fw"></i> <strong>F. Nacimiento: </strong><span id="txtMas_nacimiento" style="font-size:large;"><?= $data['perfil']['fecha_nacimiento'] ?></span></div>
                        </li>
                    </ul>
                    <h5 class=" folder-head">Datos del Dueño</h5>
                    <ul class="nav nav-pills flex-column mail-nav">
                        <li class="nav-item ">
                            <div class="nav-link" href="#"><i class="fa fa-user-circle fa-fw"></i> <strong>Dueño: </strong><span id="txtMas_dueño" style="font-size:large;"><?= $data['perfil']['d_nombre'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> <strong>Email: </strong><span id="txtMas_email" style="font-size:large;"><?= $data['perfil']['apellidos'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-address-card fa-fw"></i> <strong>DNI: </strong><span id="txtMas_dni" style="font-size:large;"><?= $data['perfil']['identificacion'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-mobile fa-fw"></i> <strong>Tel: </strong><span id="txtMas_telefono" style="font-size:large;"><?= $data['perfil']['telefono'] ?></span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-building fa-fw"></i> <strong>Dirección: </strong><span id="txtMas_direccion" style="font-size:large;"><?= $data['perfil']['direccion'] ?></span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">
                    <div class="tile ">
                        <div class="tile-body">
                            <h3 class="text-center">Historal clinico</h3>
                        </div>
                        <!-- lista de consultas -->
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $consultas = $data['consultas'];
                                for ($i = 0; $i < count($consultas); $i++) {
                                    $consulta = $consultas[$i];
                                    // Datos de la mascota
                                    $motivo = $consulta["motivo"];
                                    $diagnostico = $consulta["diagnostico"];
                                    $fecha = $consulta["fecha"];
                                    $medico = $consulta["p_nombre"] . ' ' . $consulta["p_apellidos"];
                                ?>
                                    <div class="card text-black bg-light my-3">
                                        <div class="card-header">
                                            <h5><?= $motivo ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p><?= $diagnostico ?></p>
                                                <footer class="blockquote-footer text-right"><?= $medico ?><cite title="Source Title"> - <?= $fecha ?></cite></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile">
                        <h4 class="text-center">Hacer Nueva?</h4>
                        <div class="tile-body">
                            <nav class="nav nav-pills nav-fill">
                                <button class="nav-item nav-link active" href="#">Consulta</button>
                                <button class="nav-item nav-link" href="#">Analisis</button>
                                <button class="nav-item nav-link disabled" href="#">Vacuna</button>
                            </nav>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <h3 class="text-center">Analisis</h3>
                            <div class="list-group">
                                <!-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Tipo de </h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small>Donec id elit non mi porta.</small>
                                </a> -->
                                <?php
                                $analisis = $data['analisis'];
                                for ($i = 0; $i < count($analisis); $i++) {
                                    $ana = $analisis[$i];
                                    // Datos de la mascota
                                    $nombre = $ana["tipo"];
                                    $fecha = $ana["fecha"];
                                    $diagnostico = $ana["diagnostico"];
                                    $medico = $ana["nombres"] . ' ' . $ana["apellidos"];
                                    $ruta = $ana["rutafile"];
                                ?>
                                    <a href="<?= media(); ?>/documents/uploads/<?= $ruta ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $nombre ?></h5>
                                            <small class="text-muted"><?= $fecha ?></small>
                                        </div>
                                        <p class="mb-1"><?= $diagnostico ?></p>
                                        <small class="text-muted"><?= $medico ?></small>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <h3 class="text-center">Vacunas</h3>
                            <ul class="list-group">
                                <?php
                                $vacuna = $data['vacunas'];
                                for ($i = 0; $i < count($vacuna); $i++) {
                                    $vacu = $vacuna[$i];
                                    // Datos de la mascota
                                    $nombre = $vacu["vacuna"];
                                    $dosis = $vacu["dosis"];
                                    $fecha = $vacu["fecha"];
                                    $codigo = $vacu["codigo"];
                                    $medico = $vacu["p_nombre"] . ' ' . $vacu["p_apellidos"];
                                ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $nombre ?>
                                        <small class="text-muted"><?= $codigo ?></small>
                                        <span class="badge badge-primary badge-pill"><?= $dosis ?> </span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <nav aria-label="Paginación">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="tile">
                        <h3>Notas</h3>
                        <div class="tile-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="timeline-post">
                                        <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                                            <div class="content">
                                                <h5><a href="#">John Doe</a></h5>
                                                <p class="text-muted"><small>2 January at 9:30</small></p>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="Paginación">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Siguiente</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php footerAdmin($data); ?>