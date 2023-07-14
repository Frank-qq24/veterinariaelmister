<!-- Modal -->
<div class="modal fade" id="modalFormProforma" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Proforma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formProformas" name="formProformas" class="form-horizontal">
                    <input type="hidden" id="idPedido" name="idPedido" value="">
                    <input type="hidden" id="idProforma" name="idProforma" value="">
                    <p style="font-size: 1rem; font-weight: bold;" class="text-primary"> Encargado: <?php echo $_SESSION['userData']['nombres'];
                                                                                                    echo " ";
                                                                                                    echo $_SESSION['userData']['apellidos'] ?></p>

                    <input type="hidden" id="nombreEncargado" name="nombreEncargado" value="<?php echo $_SESSION['userData']['nombres'];
                                                                                            echo " ";
                                                                                            echo $_SESSION['userData']['apellidos'] ?>">
                    <input type="hidden" id="stockProducto" name="stockProducto" value="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listCategoria">Categoria</label>
                            <select class="form-control" data-live-search="true" id="listCategoria" name="listCategoria" onchange="ftnProductos()"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listProducto">Producto</label>
                            <select class="form-control" data-live-search="true" name="listProducto" id="listProducto" onchange="ftnPrecio()"></select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="txtPrecio">Precio</label>
                            <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="txtCantidad">Cantidad</label>
                            <input class="form-control" id="txtCantidad" name="txtCantidad" value="1" type="number" placeholder="Cantidad del producto">
                        </div>

                        <div class="form-group col-md-4">
                            <label style="color: white;" for="txtNombre">x</label>
                            <button id="btnAñadir" class="btn btn-info form-control" type="submit"><span id="btnText">Añadir</span></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-striped" id="tablaProductosProformas" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <h5 class="control-label col-md-3">Total</h5>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="txtTotal" placeholder="0.00" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit" onclick="CrearProforma()"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Generar proforma</span></button>&nbsp;&nbsp;&nbsp;
                        <button id="btnCancelarProforma" class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>