<!-- MODAL DE CONSULTA COMENTARIO -->
<div class="modal fade" id="modalHistorialComentarios" name="modalHistorialComentarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Comentarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <section class="invoice">
              <div class="row">
                <div class="col-7">
                  <h2 class="page-header" ><i class="fa fa-comments" aria-hidden="true"></i><small id="tipoComentario"> Agregar Comentarios</small></h2>
                </div>
                <div class="col-5">
                  <h6 class="text-right">Fecha: <label id="txtfecha_comenta"></label></h6>
                </div>
              </div>
              <form id="formNotas" name="formNotas" class="form-horizontal">
                <input type="hidden" id="idnota" name="idnota" value=""><!-- CAMBIAR VARIABLES -->
                <input type="hidden" id="personaid" name="personaid" value=""><!-- CAMBIAR VARIABLES -->
                <input type="hidden" id="idhistorial_notas" name="idhistorial_notas" value=""><!-- CAMBIAR VARIABLES -->
                <div class="row">
                  <div class="form-group col-md-12 text-center"><b>
                      <div class="list-group">
                        
                        <div class="form-group col-md-12 text-center">
                          <textarea class="form-control" id="txtComentario" name="txtComentario" rows="3" placeholder="" required=""></textarea>
                        </div>
                        <div class="tile-footer">
                          <button id="btnguardar" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                          <!-- <button id="btnEliminar" class="btn btn-danger" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Eliminar</span></button>&nbsp;&nbsp;&nbsp; -->
                          <button class="btn btn-secondary" type="button" onclick="cleanModal();" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                        </div>
                      </div>
                  </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE CONSULTA MEDICA -->
<div class="modal fade" id="modalHistorialConsulta" name="modalHistorialConsulta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">FICHA CONSULTA</h5>
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
                  <h5 class="page-header"><small>Atendido por: </small><label id="persona_nom_consulta"></label></h5>
                </div>
                <div class="col-6">
                  <h5 class="text-right"><small>Fecha: </small> <label class="form-check-label" id="fecha_consulta"></h5>
                </div>
              </div>

              <hr>
              <form id="formConsulta" name="formConsulta" class="form-horizontal">
                <input type="hidden" id="idconsulta" name="idconsulta" value="">
                <input type="hidden" id="idhistorial_consulta" name="idhistorial_consulta" value="">
                <div class="row">
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong>PESO</strong></label>
                    <input class="form-control" id="txtPeso" name="txtPeso" type="number" min="0" step="0.01">
                  </div>
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong>TEMPERATURA</strong></label>
                    <input class="form-control" id="txtTemperatura" name="txtTemperatura" type="number" min="0" step="0.01">
                  </div>
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label"><strong> Frecuencia Respiratoria </strong></label>
                    <input class="form-control" id="txtRespiracion" name="txtRespiracion" type="number" min="0" step="0.1">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-4 text-center">
                    <label class="control-label text-center"><strong>MOTIVO DE CONSULTA</strong><span class="required"></label>
                    <textarea class="form-control" id="txtMotivo" name="txtMotivo" rows="2" placeholder="Descripcion general" required=""></textarea>
                  </div>
                  <div class="form-group col-md-8 text-center">
                    <label class="control-label text-center"><strong>ANAMNESIS</strong></label>
                    <textarea class="form-control" id="txtAnamnesis" name="txtAnamnesis" rows="2" placeholder="Descripción especificas de las dolencias, sintomas, etc" required=""></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>DIAGNOSTICO</strong> </label>
                    <textarea class="form-control" id="txtDiagnostico" name="txtDiagnostico" rows="3" placeholder="" required=""></textarea>
                  </div>
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>TRATAMIENTO</strong></label>
                    <textarea class="form-control" id="txtTratamiento" name="txtTratamiento" rows="3" placeholder="" required=""></textarea>
                  </div>
                </div>

                <div class="row">
                </div>

                <div class="tile-footer">
                  <a class="btn btn-secondary" id="ImprimirConsulta" href="#"><i class="fa fa-fw fa-lg fa-print"></i>Imprimir</a>&nbsp;&nbsp;&nbsp;
                  <!-- <?php if ($_SESSION['permisosMod']['u']) { ?>
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <?php } ?> -->
                  <?php if ($_SESSION['permisosMod']['d']) { ?>
                    <!-- <button id="btnBorrar" class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-trash-o"></i><span id="btnText">Eliminar</span></button>&nbsp;&nbsp;&nbsp; -->
                  <?php } ?>
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
<div class="modal fade" id="modalHistorialVacuna" name="modalHistorialVacuna" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Ficha de vacunación</h5>
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
                  <h5 class="page-header"><small>Vacunado por: </small><label id="persona_nom_vacuna"></label></h5>
                </div>
                <div class="col-6">
                  <h5 class="text-right"><small>Fecha: </small> <label class="form-check-label" id="fecha_vacuna"></h5>
                </div>
              </div>
              <hr>
              <form id="formVacuna" name="formVacuna" class="form-horizontal">
                <input type="hidden" id="idhistorial_vacuna" name="idhistorial_vacuna" value="">
                <input type="hidden" id="idvacuna" name="idvacuna" value="">
                <div class="row">
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label"><strong>Vacuna</strong> </label>
                    <input class="form-control" id="txtVacuna" name="txtVacuna" type="text" required="">
                  </div>
                  <div class="form-group col-md-3 text-center">
                    <label class="control-label"><strong>Dosis</strong> </label>
                    <input class="form-control" id="txtDosis" name="txtDosis" type="number" required="">
                  </div>
                  <div class="form-group col-md-3 text-center">
                    <label class="control-label"><strong> Codigo </strong> </label>
                    <input class="form-control" id="txtCodigo" name="txtCodigo" type="number" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 text-center">
                    <label class="control-label text-center"><strong>Notas</strong></label>
                    <textarea class="form-control" id="txtNotas" name="txtNotas" rows="2" placeholder=""></textarea>
                  </div>
                </div>
                <div class="tile-footer">
                  <a class="btn btn-secondary" id="ImprimirVacuna" href="#"><i class="fa fa-fw fa-lg fa-print"></i>Imprimir</a>&nbsp;&nbsp;&nbsp;
                  <!-- <?php if ($_SESSION['permisosMod']['u']) { ?>
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <?php } ?> -->
                  <?php if ($_SESSION['permisosMod']['d']) { ?>
                    <!-- <button id="btnBorrar" class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-trash-o"></i><span id="btnText">Eliminar</span></button>&nbsp;&nbsp;&nbsp; -->
                  <?php } ?>
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
<div class="modal fade" id="modalHistorialAnalisis" name="modalHistorialAnalisis" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h5 class="page-header"><small>Analisado por: </small><label id="persona_nom_analisis"></label></h5>
                </div>
                <div class="col-6">
                  <h5 class="text-right"><small>Fecha: </small> <label class="form-check-label" id="fecha_analisis"></h5>
                </div>
              </div>
              <hr>
              <form id="formAnalisis" name="formAnalisis" class="form-horizontal">
                <input type="hidden" id="idanalisis" name="idanalisis" value="">
                <input type="hidden" id="idhistorial_analisis" name="idhistorial_analisis" value="">
                <div class="row">
                  <div class="form-group col-md-7 text-center">
                    <label class="control-label"><strong>Tipo de Analisis</strong></label>
                    <input class="form-control" id="txtAnalisis" name="txtAnalisis" type="text" required="">
                  </div>
                  <div class="form-group col-md-5 text-center">
                    <label class="control-label"><strong>Documento</strong></label>
                    <a class="form-control btn btn-outline-info" onclick="verPDF_ana();"><i class="fa fa-fw fa-lg fa-file-pdf-o"></i>Ver PDF</a>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>Diagnostico</strong></label>
                    <textarea class="form-control" id="txtDiagnostico_ana" name="txtDiagnostico" rows="3" placeholder="" required=""></textarea>
                  </div>
                  <div class="form-group col-md-6 text-center">
                    <label class="control-label text-center"><strong>Tratamiento</strong></label>
                    <textarea class="form-control" id="txtTratamiento_ana" name="txtTratamiento" rows="3" placeholder="" required=""></textarea>
                  </div>
                </div>
                <div class="tile-footer">
                  <a class="btn btn-secondary" id="ImprimirAnalisis" href="#"><i class="fa fa-fw fa-lg fa-print"></i>Imprimir</a>&nbsp;&nbsp;&nbsp;
                  <!-- <?php if ($_SESSION['permisosMod']['u']) { ?>
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <?php } ?> -->
                  <?php if ($_SESSION['permisosMod']['d']) { ?>
                    <!-- <button id="btnBorrar" class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-trash-o"></i><span id="btnText">Eliminar</span></button>&nbsp;&nbsp;&nbsp; -->
                  <?php } ?>
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

<!-- VER PDF -->
<div class="modal fade" id="modalVerpdf" id="modalVerpdf" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="idframePDF" name="idframePDF" src="<?= base_url(); ?>/clientes" width="100%" height="500" frameborder="1"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>