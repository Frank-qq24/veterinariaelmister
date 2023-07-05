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
                    <button class="btn btn-primary btn-lg" type="button" onclick="openModalCosulta();" ><i class="fas fa-plus-circle"></i> Nueva Consulta</button>
                    <button class="btn btn-secondary btn-lg" type="button" onclick="openModalVacunacion();" ><i class="fas fa-plus-circle"></i> Nueva Vacunacion</button>
                    <button class="btn btn-warning btn-lg" type="button" onclick="openModalAnalisis();" ><i class="fas fa-plus-circle"></i> Nuevo Analisis</button>
                    <!-- <a href="<?= base_url(); ?>/clinica/historial" class="btn btn-secondary btn-lg"> Ver Historia Clinica</a> -->
                    <!-- <button type="button"  onclick="openModal1();" class="btn btn-info  btn-lg  ">Buscar Mascota</button>
                    <button type="button" onclick="openModal2();" class="btn btn-outline-warning btn-lg">Buscar Cliente</button> -->
                    <button class="btn btn-link btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ayuda <i class="fas fa-info-circle fa-lg"></i>
                    </button>
                </div>
                <div class="card ">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Este apartado cuenta con la creacion de opciones para crear una nueva ficha clinica para el paciente, en el se puede usar al cliente o mascota
                            sino puede crear uno nuevo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <h3>Ultimas historias clinicas Actualizadas</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="table_Ultimas_Historias">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mascota</th>
                                            <th>Especie</th>
                                            <th>Dueño</th>
                                            <th>Apellidos</th>
                                            <th>DNI</th>
                                            <th>Historial</th>
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
    
</main>
<?php footerAdmin($data); ?>