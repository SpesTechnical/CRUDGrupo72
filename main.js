

//Elimina Dato
$('#btneliminaDATO').on('click', function () {
	var telefonoPERSONA = $("#telefonoPERSONA").val();
	var accion = "borraPERSONA";

	if (telefonoPERSONA != '') {
		$.ajax({
			url: "claseGRUPO7.php",
			type: "POST",
			data: {
				telefonoPERSONA: telefonoPERSONA,
				accion: accion
			},
			success: function (x) {
				var x = JSON.parse(x);

				if (x.exito == true) {
					Swal.fire("Exito!", "Se elimino el dato correctamente.", "success");
					setTimeout(function () {
						location.reload();
					}, 2000);
				} else {
					Swal.fire("Error!", "Lo sentimos, no se elimino correctamente.", "error");
				}

			}
		});
	} else {
		Swal.fire("Error!", "No se pudo cancelar.", "error");
	}
});


//Inserta Dato
$('#btnInsertar').on('click', function () {
	var nombreP = $("#nombreP").val();
	var apellidosP = $("#apellidosP").val();
	var direccionP = $("#direccionP").val();
	var telefonoP = $("#telefonoP").val();
	var edadP = $("#edadP").val();
    var alturaP = $("#alturaP").val();
	var accion = "agregarPERSO";

	if (nombreP != "" && apellidosP != "" && direccionP != "" && telefonoP != ""  && edadP != "" && alturaP != "") {
		$.ajax({
			url: "claseGRUPO7.php",
			type: "POST",
			data: {
				nombreP: nombreP,
				apellidosP: apellidosP,
                direccionP: direccionP,
                telefonoP: telefonoP,
				edadP: edadP,
				alturaP: alturaP,
				accion: accion
			},
			success: function (x) {
				var x = JSON.parse(x);
				if (x.codigo == 1) {
					Swal.fire("Exito!", "Se agregaron los datos de la persona.", "success");
				    $('#formPER').find('input:text').val('');
				} else if (x.codigo == 2) {
					Swal.fire("Error!", "Esta persona ya se encuentra registrada.", "error");
				}

				setTimeout(function () {
					location.reload();
				}, 3000);
			}
		});
	} else {
		Swal.fire("Error!", "El formulario no puede estar vacío.", "error");
	}
});


//Edita Dato
$('#actualizaPersonaED').on('click', function () {
	var nombrePE = $("#nombrePE").val();
	var apellidosPE = $("#apellidosPE").val();
	var direccionPE = $("#direccionPE").val();
	var telefonoPE = $("#telefonoPE").val();
	var telefonoID= $("#telefonoID").val();
	var edadPE = $("#edadPE").val();
    var alturaPE = $("#alturaPE").val();
	var accion = "actualizaPERSONA";
	console.log(telefonoID)
	if (nombrePE != "" && apellidosPE != "" && direccionPE != "" && telefonoPE != ""  && edadPE != "" && alturaPE != "") {
		$.ajax({
			url: "claseGRUPO7.php",
			type: "POST",
			data: {
				nombrePE: nombrePE,
				apellidosPE: apellidosPE,
                direccionPE: direccionPE,
                telefonoPE: telefonoPE,
				telefonoID: telefonoID,
				edadPE: edadPE,
				alturaPE: alturaPE,
				accion: accion
			},
			success: function (x) {
				var x = JSON.parse(x);
				console.log(x)
				if (x.codigo == 1) {
					Swal.fire("Exito!", "Se actualizaron los datos de la persona.", "success");
				    $('#formPEREDIT').find('input:text').val('');
				} else if (x.codigo == 2) {
					Swal.fire("Error!", "Esta persona ya se encuentra registrada.", "error");
				}

				setTimeout(function () {
					location.reload();
				}, 3000);
			}
		});
	} else {
		Swal.fire("Error!", "El formulario no puede estar vacío.", "error");
	}
});
