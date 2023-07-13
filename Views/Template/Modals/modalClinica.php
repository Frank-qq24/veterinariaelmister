<!-- MODAL DE CONSULTA MEDICA -->
<div class="modal fade" id="modalClinicaConsulta" name="modalClinicaConsulta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">FICHA MEDICA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <section class="invoice">
              <div class="row">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-hospital"></i> CONSULTA MEDICA</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Fecha: <?php echo date('d/m/Y'); ?></h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="form-group col-md-1">
                  <button class="btn btn-outline-secondary" type="button" onclick="openModal2();"><i class="fas fa-plus-circle"></i><small>New</small></button>
                  <!-- <a href="<?= base_url(); ?>/clientes" class="btn btn-outline-secondary"><small>New</small></a> -->
                </div>
                <div class="form-group col-md-6">
                  <label for="listClientes">Selecciones un cliente, dueño de la mascota <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listClientes" name="listClientes" onchange="ftnCargarMascotas_consulta()"></select>
                </div>
                <div class="form-group col-md-5">
                  <label for="listMascotas">Selecciona una mascota del cliente <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listMascotas" name="listMascotas" onchange="ftnCargarIdHistorial_consulta()"></select>
                </div>
              </div>
              <hr>
              <div class="row invoice-info mb-4">
                <div class="col-4">
                    <h5 class="text-center"><b>Cliente</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_dueño_co"></label><br>
                    <b>Identificación: </b><label class="form-check-label" id="hl_dni_co"></label><br>
                    <b>Correo: </b><label class="form-check-label" id="hl_correo_co"></label><br>
                    <b>Telefono: </b><label class="form-check-label" id="hl_telefono_co"></label><br>
                </div>
                <div class="col-4">
                  <h5 class="text-center"><b>Mascota</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_mascota_co"></label><br>
                    <b>Especie: </b><label class="form-check-label" id="hl_especie_co"></label><br>
                    <b>Sexo: </b><label class="form-check-label" id="hl_sexo_co"></label><br>
                    <b>Raza: </b><label class="form-check-label" id="hl_raza_co"></label><br>
                </div>
                <div class="col-4"><b>
                    <h5 class="text-center"><b>Veterinario</b></h5>
                  </b> <b>DNI:</b> <?= $_SESSION['userData']['identificacion']; ?> <br> <b>Nombres:</b> <?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?>
                  <br><b>Correo:</b> <?= $_SESSION['userData']['email_user']; ?> <br><b>Telefono:</b> <?= $_SESSION['userData']['telefono']; ?>
                </div>
              </div>
              <hr>
              <form id="formConsulta" name="formConsulta" class="form-horizontal">
                <input type="hidden" id="idconsulta" name="idconsulta" value="">
                <input type="hidden" id="idhistorial_consulta" name="idhistorial_consulta" value="">
                <div class="row">
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong>Peso</strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtPeso" name="txtPeso" type="number" min="0" step="0.01">
                  </div>
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong>Temperatura</strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtTemperatura" name="txtTemperatura" type="number" min="0" step="0.01">
                  </div>
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong> Frecuencia Respiratoria </strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtRespiracion" name="txtRespiracion" type="number" min="0" step="0.01">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-3 text-center">
                    <label class="control-label text-center"><strong>MOTIVO DE CONSULTA</strong><span class="required">*</span></label>
                    <textarea class="form-control" id="txtMotivo" name="txtMotivo" rows="2" placeholder="Descripcion general" required=""></textarea>
                  </div>
                  <div class="form-group col-md-9 text-center">
                    <label class="control-label text-center"><strong>ANAMNESIS</strong> <span class="required">*</span></label>
                    <textarea class="form-control" id="txtAnamnesis" name="txtAnamnesis" rows="2" placeholder="Descripción especificas de las dolencias, sintomas, etc" required=""></textarea>
                  </div>
                </div>

                <div class="row">
                  <!-- <div class="form-group col-md-4 text-center">
                    <label class="control-label text-center">Expediente Clínico <span class="required">*</span></label>
                    <textarea class="form-control" id="txtExpediente" name="txtExpediente" rows="3" placeholder="" required=""></textarea>
                  </div> -->
                  <div class="form-group col-md-12 text-center">
                    <label class="control-label text-center"><strong>DIAGNOSTICO</strong>  <span class="required">*</span></label>
                    <textarea class="form-control" id="txtDiagnostico" name="txtDiagnostico" rows="3" placeholder="" required=""></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12 text-center">
                    <label class="control-label text-center"><strong>TRATAMIENTO</strong> <span class="required">*</span></label>
                    <textarea class="form-control" id="txtTratamiento" name="txtTratamiento" rows="2" placeholder="" required=""></textarea>
                  </div>
                </div>

                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-danger" type="button" onclick="cleanModal();" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DE VACUNA -->
<div class="modal fade" id="modalClinicaVacuna" name="modalClinicaVacuna" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">FICHA MEDICA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <section class="invoice">
              <div class="row">
                <div class="col-6">
                  <h5 class="page-header"><i class="fa fa-hospital"></i> VACUNACION</h5>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Fecha: <?php echo date('d/m/Y'); ?></h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="listClientes">Selecciones un cliente, dueño de la mascota <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listClientes1" name="listClientes1" onchange="ftnCargarMascotas_vacuna()"></select>
                </div>
                <div class="form-group col-md-6">
                  <label for="listMascotas">Selecciona una mascota del cliente <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listMascotas1" name="listMascotas1" onchange="ftnCargarIdHistorial_vacuna()"></select>
                </div>
              </div>
              <hr>
              <div class="row invoice-info">
                <div class="col-4">
                    <h5 class="text-center"><b>Cliente</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_dueño_va"></label><br>
                    <b>Identificación: </b><label class="form-check-label" id="hl_dni_va"></label><br>
                    <b>Correo: </b><label class="form-check-label" id="hl_correo_va"></label><br>
                    <b>Telefono: </b><label class="form-check-label" id="hl_telefono_va"></label><br>
                </div>
                <div class="col-4">
                  <h5 class="text-center"><b>Mascota</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_mascota_va"></label><br>
                    <b>Especie: </b><label class="form-check-label" id="hl_especie_va"></label><br>
                    <b>Sexo: </b><label class="form-check-label" id="hl_sexo_va"></label><br>
                    <b>Raza: </b><label class="form-check-label" id="hl_raza_va"></label><br>
                </div>
                <div class="col-4"><b>
                    <h5 class="text-center"><b>Veterinario</b></h5>
                  </b> <b>DNI:</b> <?= $_SESSION['userData']['identificacion']; ?> <br> <b>Nombres:</b> <?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?>
                  <br><b>Correo:</b> <?= $_SESSION['userData']['email_user']; ?> <br><b>Telefono:</b> <?= $_SESSION['userData']['telefono']; ?>
                </div>
              </div>
              <hr>
              <form id="formVacuna" name="formVacuna" class="form-horizontal">
                <input type="hidden" id="idhistorial_vacuna" name="idhistorial_vacuna" value="">
                <input type="hidden" id="idvacuna" name="idvacuna" value="">
                <div class="row">
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label"><strong>Vacuna</strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtVacuna" name="txtVacuna" type="text" required="">
                  </div>
                  <div class="form-group col-md-3 text-center">
                    <label class="control-label"><strong>Dosis</strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtDosis" name="txtDosis" type="number" required="">
                  </div>
                  <div class="form-group col-md-3 text-center">
                    <label class="control-label"><strong> Codigo </strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtCodigo" name="txtCodigo" type="number" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 text-center">
                    <label class="control-label text-center"><strong>Notas</strong></label>
                    <textarea class="form-control" id="txtNotas" name="txtNotas" rows="2" placeholder="" ></textarea>
                  </div>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-danger" type="button" onclick="cleanModal();" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DE ANALISIS -->
<div class="modal fade" id="modalClinicaAnalisis" name="modalClinicaAnalisis" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">ANALISIS MEDICO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <section class="invoice">
              <div class="row">
                <div class="col-6">
                  <h5 class="page-header"><i class="fa fa-hospital"></i> ANALISIS</h5>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Fecha: <?php echo date('d/m/Y'); ?></h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="listClientes">Selecciones un cliente, dueño de la mascota <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listClientes2" name="listClientes2" onchange="ftnCargarMascotas_analisis()"></select>
                </div>
                <div class="form-group col-md-6">
                  <label for="listMascotas">Selecciona una mascota del cliente <span class="required">*</span></label>
                  <select class="form-control" data-live-search="true" id="listMascotas2" name="listMascotas2" onchange="ftnCargarIdHistorial_analisis()"></select>
                </div>
              </div>
              <hr>
              <div class="row invoice-info">
                <div class="col-4">
                    <h5 class="text-center"><b>Cliente</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_dueño_an"></label><br>
                    <b>Identificación: </b><label class="form-check-label" id="hl_dni_an"></label><br>
                    <b>Correo: </b><label class="form-check-label" id="hl_correo_an"></label><br>
                    <b>Telefono: </b><label class="form-check-label" id="hl_telefono_an"></label><br>
                </div>
                <div class="col-4">
                  <h5 class="text-center"><b>Mascota</b></h5>
                    <b>Nombre: </b><label class="form-check-label" id="hl_mascota_an"></label><br>
                    <b>Especie: </b><label class="form-check-label" id="hl_especie_an"></label><br>
                    <b>Sexo: </b><label class="form-check-label" id="hl_sexo_an"></label><br>
                    <b>Raza: </b><label class="form-check-label" id="hl_raza_an"></label><br>
                </div>
                <div class="col-4"><b>
                    <h5 class="text-center"><b>Veterinario</b></h5>
                  </b> <b>DNI:</b> <?= $_SESSION['userData']['identificacion']; ?> <br> <b>Nombres:</b> <?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?>
                  <br><b>Correo:</b> <?= $_SESSION['userData']['email_user']; ?> <br><b>Telefono:</b> <?= $_SESSION['userData']['telefono']; ?>
                </div>
              </div>
              <hr>
              <form id="formAnalisis" name="formAnalisis" class="form-horizontal">
                <input type="hidden" id="idanalisis" name="idanalisis" value="">
                <input type="hidden" id="idhistorial_analisis" name="idhistorial_analisis" value="">
                <div class="row">
                  <div class="form-group col-md-7 text-center">
                    <label class="control-label"><strong>Tipo de Analisis</strong> <span class="required">*</span></label>
                    <input class="form-control" id="txtAnalisis" name="txtAnalisis" type="text" required="">
                  </div>
                  <div class="form-group col-md-5 text-center">
                    <label class="control-label"><strong>Documento</strong> <span class="required">*</span></label>
                    <input class="form-control" id="file_Doc" name="file_Doc" type="file" placeholder="Seleccione pdf">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>Diagnostico</strong></label>
                    <textarea class="form-control" id="txtDiagnostico" name="txtDiagnostico" rows="3" placeholder="" required=""></textarea>
                  </div>
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>Tratamiento</strong></label>
                    <textarea class="form-control" id="txtTratamiento" name="txtTratamiento" rows="3" placeholder="" required=""></textarea>
                  </div>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-danger" type="button" onclick="cleanModal();" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
