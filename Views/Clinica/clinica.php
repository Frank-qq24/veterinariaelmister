<?php 
    headerAdmin($data); 
    getModal('modalClinica',$data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clinica">Clinica</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="tile">
                <div class="col-md-12">
                    <div class="tile-body">
                        <h3>Opciones Medicas</h3>
                    </div>
                </div>

                <div class="btn-group-vertical flex-column nav  -pills">
                    <button type="button" class="btn btn-secondary btn-lg">Agregar nueva historia</button>
                    <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
                    <button type="button"  onclick="openModal1();" class="btn btn-info  btn-lg  ">Buscar Mascota</button>
                    <button type="button" onclick="openModal2();" class="btn btn-outline-warning btn-lg">Buscar Cliente</button>
                    <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ayuda <i class="fas fa-info-circle fa-lg"></i>
                    </button>
                </div>
                <div class="card ">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <h3>Ultimas historias de medicas</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="table_Ultimas_Historias">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Mascota</th>
                                            <th>Especie</th>
                                            <th>Motivo de consulta</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="tile p-0">
            <div class="card">
                <img src="https://img.freepik.com/foto-gratis/perrito-joven-posando-alegre_155003-28765.jpg" alt="Imagen de perfil">
            </div>
                <h4 class="tile-title folder-head">Perfil Mascota</h4>
                <div class="tile-body">
                    <ul class="nav nav-pills flex-column mail-nav">
                        <li class="nav-item ">
                            <div class="nav-link" href="#"><i class="fa fa-inbox fa-fw"></i> Sasha</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> Perro</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-file-text-o fa-fw"></i> Hembra</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-filter fa-fw"></i> Chusquita nomas</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-trash-o fa-fw"></i> 24 de noviembre del 2011</div>
                        </li>
                    </ul>
                    <h5 class=" folder-head">Datos del Dueño</h5>
                    <ul class="nav nav-pills flex-column mail-nav">
                        <li class="nav-item ">
                            <div class="nav-link" href="#"><i class="fa fa-inbox fa-fw"></i> Dueño: Frank Raul Quintana Quispe</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> Email: franhkquintana@gmail.com</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-file-text-o fa-fw"></i> dni: 62377091</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-filter fa-fw"></i> tel: 944788482</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" href="#"><i class="fa fa-trash-o fa-fw"></i> Villa el salvador, serctor 1 manzana m lote 8,</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-9">
                    <div class="tile ">
                        <div class="tile-body">
                            <h3>Historal clinico</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="tile-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table_fichcaclinica">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Motivo de consulta</th>
                                                        <th>peso</th>
                                                        <th>Especie</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile">
                        <div class="tile-body">
                            <h3>Peso</h3>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <h3>Vacunas</h3>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <h3>Cirugias</h3>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <h3>Notas</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php footerAdmin($data); ?>