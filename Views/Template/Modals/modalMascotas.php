<!-- Modal -->
<div class="modal fade" id="modalFormMascotas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Agregar Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formMascotas" name="formMascotas" class="form-horizontal">
          <input type="hidden" id="idMascota" name="idMascota" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
          <hr>
          <div class="row">
            <div class="form-group col-md-12">
              <h5 class="text-center lead">Dueño</h5>
            </div>

          </div>
          <div class="row">
            <div class="form-group col-md-1">
              <button class="btn btn-outline-secondary" type="button" onclick="openModal2();"><i class="fas fa-plus-circle"></i><small>New</small></button>
              <!-- <a href="<?= base_url(); ?>/clientes" class="btn btn-outline-secondary"><small>New</small></a> -->
            </div>
            <div class="form-group col-md-5">
              <label for="">Buscar Clientes <span class="required">*</span></label>
              <input class="form-control" type="text" placeholder="Busca Cliente, dueño de la nueva mascota">

            </div>
            <div class="form-group col-md-6">
              <label for="listClientes">Selecciones un cliente, dueño de la mascota <span class="required">*</span></label>
              <select class="form-control" data-live-search="true" id="listClientes" name="listClientes" required=""></select>
            </div>
          </div>
          <hr>
          <div class="row">

            <div class="col-md-8">
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Nombre <span class="required">*</span></label>
                  <input class="form-control" id="txtNombre_mas" name="txtNombre_mas" type="text" placeholder="Nombre de Mascota" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="listEspecie">Especie<span class="required">*</span></label>
                  <select class="form-control selectpicker" data-live-search="true" id="listEspecie" name="listEspecie" required="">
                    <option value="Serpiente">Serpiente</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Pájaro">Pájaro</option>
                    <option value="Conejo">Conejo</option>
                    <option value="Hámster">Hámster</option>
                    <option value="Cuy">Cuy</option>
                    <option value="Lagarto">Lagarto</option>
                    <option value="Tortuga">Tortuga</option>
                    <option value="Pez">Pez</option>
                    <option value="Rana">Rana</option>
                    <!-- <option value="Caballo">Caballo</option> -->
                    <!-- <option value="Vaca">Vaca</option> -->
                    <option value="Cerdo">Cerdo</option>
                    <option value="Oveja">Oveja</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Raza <span class="required">*</span></label>
                  <input class="form-control" id="txtRaza" name="txtRaza" type="text" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="listsexo">Sexo<span class="required">*</span></label>
                  <select class="form-control selectpicker" id="listsexo" name="listsexo" required="">
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtnacimiento">Fecha de nacimiento<span class="required">*</span></label>
                  <input type="date" class="form-control" id="txtnacimiento" name="txtnacimiento" min="2010-01-01" max="2030-12-31" required="">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Descripción <span class="required">*</span></label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de la mascota (Color, Tamaño, Forma, Fisico)" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="photo">
                  <label for="foto">Ingrese Foto (570x380)</label>
                  <div class="prevPhoto">
                    <span class="delPhoto notBlock">X</span>
                    <label for="foto"></label>
                    <div>
                      <img id="img" src="<?= media(); ?>/images/uploads/alter_pet.png">
                    </div>
                  </div>
                  <div class="upimg">
                    <input type="file" name="foto" id="foto">
                  </div>
                  <div id="form_alert"></div>
              </div>
            </div>
          </div>

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" onclick="cleanModal();" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Crear nuevo cliente para Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="<?= base_url(); ?>/clientes" width="100%" height="500" frameborder="1"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>