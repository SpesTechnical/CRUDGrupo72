    <!---------------------------------------------------MODAL AGREGAR------------------------------------------------->
    <div class="modal fade" id="agregaDATO">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="title" style="text-align: center;">Agregar Persona <i class="fa-solid fa-users"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <form  id="formPER" name="formPER">
                            <div class="row">
                                <div class="col">
                                    <h4>Nombre</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Nombre de la Persona" id="nombre" name="nombre">
                                </div>

                                <div class="col-sm">
                                    <h4>Apellidos</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Apellidos de la Persona" id="apellidos" name="apellidos">
                                </div>

                                <div class="col">
                                    <h4>Teléfono</h4>
                                    <input type="number" class="form-control Inputs" id="telefono" name="telefono" placeholder="Teléfono de la Persona">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <h4>Direccion</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Dirección de la persona" id="direccion" name="direccion">
                                </div>

                                <div class="col-sm">
                                    <h4>Edad</h4>
                                    <input class="form-control Inputs" type="number" name="edad" id="edad" placeholder="Edad de la Persona">
                                </div>

                                <div class="col">
                                    <h4>Altura</h4>
                                    <input type="number" class="form-control Inputs" placeholder="Estatura en CM" id="altura" name="altura">
                                </div>
                            </div>
                            <br>

                        </form>
                        <hr>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-rectangle-xmark"></i></button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnInsertar" name="btnInsertar">Guardar <i class="fa-solid fa-floppy-disk"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------------FIN MODAL AGREGAR------------------------------------------------->

    <!---------------------------------------------------MODAL EDITAR------------------------------------------------->
    <div class="modal fade" id="editarDATO">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="title" style="text-align: center;">Editar Persona <i class="fa-solid fa-users"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <form id="formPEREDIT" name="formPEREDIT">
                            <div class="row">
                                <div class="col">
                                    <h4>Nombre</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Nombre de la Persona" id="nombreED" name="nombreED">
                                </div>

                                <div class="col-sm">
                                    <h4>Apellidos</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Apellidos de la Persona" id="apellidosED" name="apellidosED">
                                </div>

                                <div class="col">
                                    <h4>Teléfono</h4>
                                    <input type="number" disabled class="form-control Inputs" id="telefonoED" name="telefonoED" placeholder="Teléfono de la Persona">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <h4>Direccion</h4>
                                    <input type="text" class="form-control Inputs" placeholder="Dirección de la persona" id="direccionED" name="direccionED">
                                </div>

                                <div class="col-sm">
                                    <h4>Edad</h4>
                                    <input class="form-control Inputs" type="number" name="edadED" id="edadED" placeholder="Edad de la Persona">
                                </div>

                                <div class="col">
                                    <h4>Altura</h4>
                                    <input type="number" class="form-control Inputs" placeholder="Estatura en CM" id="alturaED" name="alturaED">
                                </div>
                            </div>
                            <br>

                        </form>
                        <hr>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-rectangle-xmark"></i></button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnEditar" name="btnEditar">Guardar <i class="fa-solid fa-floppy-disk"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------------FIN MODAL EDITAR------------------------------------------------->

    <!---------------------------------------------------MODAL ELIMINA------------------------------------------------->
    <div class="modal fade" id="modalEliminaDato">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="borraP">
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Persona <i class="fa-solid fa-triangle-exclamation"></i></h4>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="telefonoBorrar" name="telefonoBorrar">
                        <h4>¿Seguro que desea eliminar este dato?</h4>
                        <h5 class="text-danger"><small>Esta opción no puede deshacerse</small></h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-rectangle-xmark"></i></button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnEliminar" name="btnEliminar">Confirmar <i class="fa-solid fa-square-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---------------------------------------------------FIN MODAL ELIMINA--------------------------------------------->