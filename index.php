<?php
require_once('claseGRUPO7.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD-G7</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css" />
</head>

<body style="background-color: #f8f8f8;">

    <div class="container p-3 my-4" style="background-color: #1a1a1a; color: #ffffff;">
        <h1><img src="./assets/img/cuc.jpg" width="90px"></h1>
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
                                let value = $(this).val().toLowerCase();

                                $("#tablaResultado tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });

                            $("#BuscaAE2").on('click', function() {
                                let value = $('#BuscaAE').val().toLowerCase();

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
                                    <button type="button" style="text-align: left;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregaDATO">Agregar Dato</button>
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
                                            <button type="button" class="editar btn btn-warning" data-telefonoID="<?= $row['telefono']; ?>" data-nombre="<?= $row['nombre']; ?>" data-telefono="<?= $row['telefono']; ?>" data-apellidos="<?= $row['apellidos']; ?>" data-direccion="<?= $row['direccion']; ?>" data-altura="<?= $row['altura']; ?>" data-edad="<?= $row['edad']; ?>" data-bs-toggle="modal" data-bs-target="#editarDATO"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button" class="delete btn btn-danger" data-telefono="<?= $row['telefono']; ?>" data-bs-toggle="modal" data-bs-target="#modalEliminaDato"><i class="fa-solid fa-trash-can"></i></button>
                                        </td>
                            </tr>
                                <?php
                                    }
                                } else {
                                    echo '<center>
                                            <div class="toast show">
                                                <div class="card-header alert-secondary" style="text-align: center;">
                                                    <strong class="me-auto">Sistema informa  <i class="fa-duotone fa-circle-info"></i></strong>
                                                </div>

                                                <div class="toast-body alert-danger">
                                                    <center>
                                                        <h6>No se encontraron registros <i class="fa-duotone fa-triangle-exclamation"></i></h6>
                                                    </center>
                                                </div>
                                            </div>
                                        </center>
                                    <br>';
                                }
                                ?>
                        </tbody>
                    </table>

                    <script>
                        $(document).on("click", ".editar", function() {
                            let nombre = $(this).attr("data-nombre");
                            let apellidos = $(this).attr("data-apellidos");
                            let telefono = $(this).attr("data-telefono");
                            let direccion = $(this).attr("data-direccion");
                            let altura = $(this).attr("data-altura");
                            let edad = $(this).attr("data-edad");

                            $('#nombreED').val(nombre);
                            $('#apellidosED').val(apellidos);
                            $('#telefonoED').val(telefono);
                            $('#direccionED').val(direccion);
                            $('#alturaED').val(altura);
                            $('#edadED').val(edad);
                        });

                        //ElIMINA DATO
                        $(document).on("click", ".delete", function() {
                            let telefono = $(this).attr("data-telefono");

                            $('#telefonoBorrar').val(telefono);
                        });
                    </script>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('./modals.php');?>

    <script src="./assets/js/main.js"></script>

</body>
</html>