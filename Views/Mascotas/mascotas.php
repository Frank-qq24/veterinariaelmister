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
              <div class="nav-link" href="#"><i class="fa fa-github fa-fw"></i> <strong>Nombre: </strong> <span id="txtMas_nombre" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-braille fa-fw"></i> <strong>Especie: </strong><span id="txtMas_especie" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-venus-mars fa-fw"></i> <strong>Sexo: </strong><span id="txtMas_sexo" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-circle fa-fw"></i> <strong>Raza: </strong><span id="txtMas_raza" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-birthday-cake fa-fw"></i> <strong>F. Nacimiento: </strong><span id="txtMas_nacimiento" style="font-size:large;"></span></div>
            </li>
          </ul>
          <h5 class=" folder-head">Datos del Dueño</h5>
          <ul class="nav nav-pills flex-column mail-nav">
            <li class="nav-item ">
              <div class="nav-link" href="#"><i class="fa fa-user-circle fa-fw"></i> <strong>Dueño: </strong><span id="txtMas_dueño" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> <strong>Email: </strong><span id="txtMas_email" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-address-card fa-fw"></i> <strong>DNI: </strong><span id="txtMas_dni" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-mobile fa-fw"></i> <strong>Tel: </strong><span id="txtMas_telefono" style="font-size:large;"></span></div>
            </li>
            <li class="nav-item">
              <div class="nav-link" href="#"><i class="fa fa-building fa-fw"></i> <strong>Dirección: </strong><span id="txtMas_direccion" style="font-size:large;"></span></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>