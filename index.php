<?php
require('claseGRUPO7.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD-GIT-PLESK-G7</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css" />
</head>

<body style="background-color: #f8f8f8;">



    <div class="container p-3 my-4" style="background-color: #1a1a1a; color: #ffffff;">
        <h1><img src="cuc.jpg" width="90px"></h1>
        <p>Administración de Sitios Web TI-162</p>
    </div>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header" style="background-color: #1a1a1a; color: #ffffff; text-align:center;">
                <h2>Datos de la base
                    <i class="fa-solid fa-folder"></i>
                </h2>
            </div>
            <div class="card-body">
                
              
                    <div class="table-responsive-lg">
                        <form class="d-flex">
                            <input class="form-control me-2" id="BuscaAE" type="search" placeholder="Buscar...">
                            <button class="btn btn-outline-primary" id="BuscaAE2" type="button"><i class="fa-regular fa-magnifying-glass"></i></button>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $("#BuscaAE").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();

                                    $("#tablaResultado tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });

                                $("#BuscaAE2").on('click', function() {
                                    var value = $('#BuscaAE').val().toLowerCase();

                                    $("#tablaResultado tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                        <table class="table table-dark table-hover table-bordered text-md-center">
                            <thead class="table-dark">
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                    <button type="button" style="text-align: left;" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#agregaDATO">Agregar Dato</button>

                                    </div>
                                    <div class="col-sm"></div>
                                    <div class="col-sm"></div>
                                </div>
                                <br>
                                <tr>
                        
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Edad</th>
                                    <th>Altura</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody class="table-secondary" id="tablaResultado">
                          

                                <tr>
                                    <?php
                                    $row = $ObjLAB->muestraDatos();
                                    if (!empty($row)) {
                                        foreach ($row as $datos => $row) {
                                    ?>

                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= utf8_decode($row['apellidos']); ?></td>
                                            <td><?= $row['direccion']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['edad']; ?></td>
                                            <td><?= $row['altura']; ?></td>
                                            <td style="text-align: center;">
                                            <button type="button" class="editar btn btn-warning" data-telefonoID="<?= $row['telefono']; ?>" data-nombre="<?= $row['nombre']; ?>" data-telefono="<?= $row['telefono']; ?>" data-apellidos="<?= $row['apellidos']; ?>" data-direccion="<?= $row['direccion']; ?>" data-altura="<?= $row['altura']; ?>" data-edad="<?= $row['edad']; ?>"  data-bs-toggle="modal" data-bs-target="#editarDATO"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <button type="button" class="delete btn btn-danger"   data-telefono="<?= $row['telefono']; ?>" data-bs-toggle="modal" data-bs-target="#modalEliminaDato"><i class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                </tr>

                        <?php
                                        }
                                    } else {
                                        echo '<center><div class="toast show">
                                    <div class="card-header alert-secondary" style="text-align: center;">
                                        <strong class="me-auto">Sistema informa  <i class="fa-duotone fa-circle-info"></i></strong>
                                        </div>
                                    <div class="toast-body alert-danger">
                                        <center>
                                            <h6>No se encontraron registros <i class="fa-duotone fa-triangle-exclamation"></i></h6>
                                        </center>
                                    </div>
                                    </div></center>
                                    <br>';
                                    }
                        ?>
                            </tbody>
                        </table>
                        <script>

                                    $(document).on("click", ".editar", function() {
										var nombre = $(this).attr("data-nombre");
                                        var apellidos = $(this).attr("data-apellidos");
										var telefono = $(this).attr("data-telefono");
                                        var telefonoID = $(this).attr("data-telefonoID");
										var direccion = $(this).attr("data-direccion");
										var altura = $(this).attr("data-altura");
										var edad = $(this).attr("data-edad");

										$('#telefonoID').val(telefonoID);
										$('#nombrePE').val(nombre);
                                        $('#apellidosPE').val(apellidos);
										$('#telefonoPE').val(telefono);
										$('#direccionPE').val(direccion);
										$('#alturaPE').val(altura);
										$('#edadPE').val(edad);
									});


        
                            //ElIMINA DATO
                            $(document).on("click", ".delete", function() {
                                var nombre = $(this).attr("data-telefono");
                                $('#telefonoPERSONA').val(nombre);
                            });
                        </script>
                        <hr>
                    </div>
                </div>

        </div>
    </div>

<!---------------------------------------------------MODAL ELIMINA------------------------------------------------->
<div class="modal fade" id="modalEliminaDato">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="borraP">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Persona <i class="fa-solid fa-triangle-exclamation"></i></h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="telefonoPERSONA" name="telefonoPERSONA">
                    <h4>¿Seguro que desea eliminar este dato?</h4>
                    <h5 class="text-danger"><small>Esta opción no puede deshacerse</small></h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-rectangle-xmark"></i></button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btneliminaDATO" name="btneliminaDATO">Confirmar <i class="fa-solid fa-square-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!---------------------------------------------------FIN MODAL ELIMINA------------------------------------------------->


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
                    <form method="POST" id="formPER" name="formPER">
                        <div class="row">
                            <div class="col">
                                <h4>Nombre</h4>
                                <input type="text" class="form-control Inputs" placeholder="Nombre de la Persona" id="nombreP" name="nombreP">
                            </div>

                            <div class="col-sm">
                                <h4>Apellidos</h4>
                                <input type="text" class="form-control Inputs" placeholder="Apellidos de la Persona" id="apellidosP" name="apellidosP">
                            </div>

                            <div class="col">
                                <h4>Teléfono</h4>
                                <input type="number" class="form-control Inputs" id="telefonoP" name="telefonoP" placeholder="Teléfono de la Persona">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <h4>Direccion</h4>
                                <input type="text" class="form-control Inputs" placeholder="Dirección de la persona" id="direccionP" name="direccionP">
                            </div>

                            <div class="col-sm">
                                <h4>Edad</h4>
                                <input class="form-control Inputs" type="number" name="edadP" id="edadP" placeholder="Edad de la Persona">
                            </div>

                            <div class="col">
                                <h4>Altura</h4>
                                <input type="number" class="form-control Inputs" placeholder="Estatura en CM" id="alturaP" name="alturaP">
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
                    <form method="POST" id="formPEREDIT" name="formPEREDIT">
                        <div class="row">
                            <div class="col">
                                <h4>Nombre</h4>
                                <input type="text" id="telefonoID" name="telefonoID"/>
                                <input type="text" class="form-control Inputs" placeholder="Nombre de la Persona" id="nombrePE" name="nombrePE">
                            </div>

                            <div class="col-sm">
                                <h4>Apellidos</h4>
                                <input type="text" class="form-control Inputs" placeholder="Apellidos de la Persona" id="apellidosPE" name="apellidosPE">
                            </div>

                            <div class="col">
                                <h4>Teléfono</h4>
                                <input type="number" class="form-control Inputs" id="telefonoPE" name="telefonoPE" placeholder="Teléfono de la Persona">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <h4>Direccion</h4>
                                <input type="text" class="form-control Inputs" placeholder="Dirección de la persona" id="direccionPE" name="direccionPE">
                            </div>

                            <div class="col-sm">
                                <h4>Edad</h4>
                                <input class="form-control Inputs" type="number" name="edadPE" id="edadPE" placeholder="Edad de la Persona">
                            </div>

                            <div class="col">
                                <h4>Altura</h4>
                                <input type="number" class="form-control Inputs" placeholder="Estatura en CM" id="alturaPE" name="alturaPE">
                            </div>
                        </div>
                        <br>
        
                    </form>
                    <hr>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar <i class="fa-solid fa-rectangle-xmark"></i></button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="actualizaPersonaED" name="actualizaPersonaED">Guardar <i class="fa-solid fa-floppy-disk"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>




<!---------------------------------------------------FIN MODAL EDITAR------------------------------------------------->




    <script src="main.js"></script>

</body>

</html>