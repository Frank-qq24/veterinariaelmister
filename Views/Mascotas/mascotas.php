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
            <table class="table table-hover table-bordered" id="tableMascotas">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Especie</th>
                  <th>Dueño</th>
                  <th>Sexo</th>
                  <th>Fecha de Nacimiento</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Luna</td>
                  <td>Perro</td>
                  <td>Juan Pérez</td>
                  <td>Hembra</td>
                  <td>2019-05-10</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Max</td>
                  <td>Gato</td>
                  <td>Maria Gómez</td>
                  <td>Macho</td>
                  <td>2018-09-22</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Rex</td>
                  <td>Perro</td>
                  <td>Ana Torres</td>
                  <td>Macho</td>
                  <td>2017-04-12</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Milo</td>
                  <td>Perro</td>
                  <td>Luisa Rodríguez</td>
                  <td>Macho</td>
                  <td>2020-02-28</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Mia</td>
                  <td>Gato</td>
                  <td>Pablo González</td>
                  <td>Hembra</td>
                  <td>2019-07-05</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Coco</td>
                  <td>Perro</td>
                  <td>Sofía Fernández</td>
                  <td>Macho</td>
                  <td>2016-11-14</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Simba</td>
                  <td>Gato</td>
                  <td>Diego Ramírez</td>
                  <td>Macho</td>
                  <td>2018-03-20</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Nala</td>
                  <td>Perro</td>
                  <td>Valentina Silva</td>
                  <td>Hembra</td>
                  <td>2017-09-08</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Lucky</td>
                  <td>Perro</td>
                  <td>Mariana López</td>
                  <td>Macho</td>
                  <td>2015-12-02</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Misty</td>
                  <td>Gato</td>
                  <td>Andrés García</td>
                  <td>Hembra</td>
                  <td>2020-08-17</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Bruno</td>
                  <td>Perro</td>
                  <td>Carolina Torres</td>
                  <td>Macho</td>
                  <td>2019-03-11</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Lola</td>
                  <td>Gato</td>
                  <td>Rodrigo Méndez</td>
                  <td>Hembra</td>
                  <td>2018-06-25</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Toby</td>
                  <td>Perro</td>
                  <td>Julieta Sánchez</td>
                  <td>Macho</td>
                  <td>2017-10-19</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
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
  </div>
</main>
<?php footerAdmin($data); ?>