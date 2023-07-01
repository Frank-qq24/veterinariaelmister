<?php
headerAdmin($data);
getModal('modalMascotas', $data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-box-tissue"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="da-solid fa-paw-claws"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/mascotas"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-9">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped" id="tableMascotas">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Especie</th>
                  <th>Raza</th>
                  <th>Sexo</th>
                  <th>F.Nacimiento</th>
                  <th>Dueño </th>
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
    <!-- ---------------------- carta para mostrar datos ------------------ -->
    <div class="col-md-3">
      <div class="tile p-0">
        <div class="card">
          <img id="imgVistaMascota" src="https://img.freepik.com/foto-gratis/perrito-joven-posando-alegre_155003-28765.jpg" alt="Imagen de perfil">
        </div>
        <h4 class="tile-title folder-head">Perfil Mascota</h4>
        <div class="tile-body">
          <ul class="nav nav-pills flex-column mail-nav">
            <li class="nav-item ">
              <div class="nav-link" href="#"><i class="fa fa-github fa-fw"></i> Nombre: <strong><div id="txtMas_nombre"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-braille fa-fw"></i> Especie: <div id="txtMas_especie"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-venus-mars fa-fw"></i> Sexo: <div id="txtMas_sexo"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-circle fa-fw"></i> Raza: <div id="txtMas_raza"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-birthday-cake fa-fw"></i> F. Nacimiento: <div id="txtMas_nacimiento"></div></div>
            </li>
          </ul>
          <h5 class=" folder-head">Datos del Dueño</h5>
          <ul class="nav nav-pills flex-column mail-nav">
            <li class="nav-item ">
              <div class="nav-link" href="#"><i class="fa fa-user-circle fa-fw"></i> Dueño: <div id="txtMas_dueño"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> Email: <div id="txtMas_email"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-address-card fa-fw"></i> DNI: <div id="txtMas_dni"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-mobile fa-fw"></i> Tel: <div id="txtMas_telefono"></div></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-building fa-fw"></i> Dirección: <div id="txtMas_direccion"></div></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>