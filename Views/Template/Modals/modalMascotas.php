<!-- Modal -->
<div class="modal fade" id="modalFormMascotas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Agregar Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCategoria" name="formCategoria" class="form-horizontal">

          <input type="hidden" id="idCategoria" name="idCategoria" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
          <hr>
          <div class="row">
            <div class="form-group col-md-12" >
              <h5 class="text-center lead">Dueño</h5>
            </div>
            <div class="form-group col-md-4">
              <a href="<?= base_url(); ?>/clientes" class="btn btn-outline-secondary"><small>New</small></a>
              <label class="control-label"> Nombre</label>
              <input class="form-control" type="text" placeholder="Nombre completo">
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">Identificación</label>
                <input class="form-control" type="text" placeholder="dni" readonly >
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">Telefono</label>
                <input class="form-control" type="text" placeholder="tel" readonly >
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="form-group col-md-4">
                <label class="control-label">Nombre <span class="required">*</span></label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre Categoría" required="">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleSelect1">Especie<span class="required">*</span></label>
              <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                <option value="1">Perro</option>
                <option value="2">Gato</option>
                <option value="2">Gallina</option>
                <option value="2">Chancho</option>
              </select>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">Raza <span class="required">*</span></label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleSelect1">Sexo<span class="required">*</span></label>
              <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                <option value="1">Macho</option>
                <option value="2">Hembra</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleSelect1">Fecha de nacimiento<span class="required">*</span></label>
              <input type="date" class="form-control" id="start" name="trip-start" min="2018-01-01" max="2018-12-31">
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Descripción <span class="required">*</span></label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción Categoría" required=""></textarea>
            </div>
          </div>

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celId"></td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgCategoria"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>