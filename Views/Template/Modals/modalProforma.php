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
                            <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" placeholder="0.00" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="txtCantidad">Cantidad</label>
                            <input class="form-control" id="txtCantidad" name="txtCantidad" value="1" min="1" step="1" type="number" placeholder="Cantidad del producto">
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
                                    <input class="form-control" type="text" id="txtTotal" name="txtTotal" value="" placeholder="0.00" readonly>
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
<!-- VER proforma -->
<div class="modal fade" id="modalVerProforma" id="modalVerProforma" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Proforma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                            <section class="invoice">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <h2 class="page-header"><i class="fa fa-globe"></i>Veterinario</h2>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="text-right">Date: 01/01/2016</h5>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-4">From
                                        <address><strong>Vali Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
                                    </div>
                                    <div class="col-4">To
                                        <address><strong>John Doe</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 539-1037<br>Email: john.doe@example.com</address>
                                    </div>
                                    <div class="col-4"><b>Invoice #007612</b><br><br><b>Order ID:</b> 4F3S8J<br><b>Payment Due:</b> 2/22/2014<br><b>Account:</b> 968-34567</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Product</th>
                                                    <th>Serial #</th>
                                                    <th>Description</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>The Hunger Games</td>
                                                    <td>455-981-221</td>
                                                    <td>El snort testosterone trophy driving gloves handsome</td>
                                                    <td>$41.32</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>City of Bones</td>
                                                    <td>247-925-726</td>
                                                    <td>Wes Anderson umami biodiesel</td>
                                                    <td>$75.52</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>The Maze Runner</td>
                                                    <td>545-457-47</td>
                                                    <td>Terry Richardson helvetica tousled street art master</td>
                                                    <td>$15.25</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>The Fault in Our Stars</td>
                                                    <td>757-855-857</td>
                                                    <td>Tousled lomo letterpress</td>
                                                    <td>$03.44</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                                </div>
                            </section>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>