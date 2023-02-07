$(document).ready(function () {

	//Inserta Dato
	$('#btnInsertar').on('click', function () {
		let nombre = $("#nombre").val();
		let apellidos = $("#apellidos").val();
		let direccion = $("#direccion").val();
		let telefono = $("#telefono").val();
		let edad = $("#edad").val();
		let altura = $("#altura").val();
		let accion = "agregar";

		if (nombre != "" && apellidos != "" && direccion != "" && telefono != "" && edad != "" && altura != "") {
			$.ajax({
				url: "claseGRUPO7.php",
				type: "POST",
				data: {
					nombre,
					apellidos,
					direccion,
					telefono,
					edad,
					altura,
					accion
				},
				success: function (response) {
					let res = JSON.parse(response);

					if (res.response == true) {

						Swal.fire("Exito!", "Se agregaron los datos de la persona.", "success");

						$('#formPER').find('input:text').val('');

						setTimeout(function () {
							location.reload();
						}, 3000);

					} else if (res.codigo == false) {
						Swal.fire("Error!", "Esta persona ya se encuentra registrada.", "error");
					}
				}
			});
		} else {
			Swal.fire("Error!", "El formulario no puede estar vacío.", "error");
		}
	});

	//Edita Dato
	$('#btnEditar').on('click', function () {
		let nombre = $("#nombreED").val();
		let apellidos = $("#apellidosED").val();
		let direccion = $("#direccionED").val();
		let telefono = $("#telefonoED").val();
		let edad = $("#edadED").val();
		let altura = $("#alturaED").val();
		let accion = "actualizar";

		if (nombre != "" && apellidos != "" && direccion != "" && telefono != "" && edad != "" && altura != "") {
			$.ajax({
				url: "claseGRUPO7.php",
				type: "POST",
				data: {
					nombre,
					apellidos,
					direccion,
					telefono,
					edad,
					altura,
					accion
				},
				success: function (response) {
					let res = JSON.parse(response);

					if (res.response == true) {
						Swal.fire("Exito!", "Se actualizaron los datos de la persona.", "success");

						$('#formPEREDIT').find('input:text').val('');

						setTimeout(function () {
							location.reload();
						}, 3000);

					} else if (res.response == false) {
						Swal.fire("Error!", "Este telefono ya se encuentra registrado.", "error");
					}
				}
			});
		} else {
			Swal.fire("Error!", "El formulario no puede estar vacío.", "error");
		}
	});

	//Elimina Dato
	$('#btnEliminar').on('click', function () {
		let telefono = $("#telefonoBorrar").val();
		let accion = "borrar";

		$.ajax({
			url: "claseGRUPO7.php",
			type: "POST",
			data: {
				telefono,
				accion
			},
			success: function (response) {
				let res = JSON.parse(response);

				if (res.response == true) {
					Swal.fire("Exito!", "Se elimino el dato correctamente.", "success");

					setTimeout(function () {
						location.reload();
					}, 2000);
				} else if (res.response == false) {
					Swal.fire("Error!", "Lo sentimos, no se elimino correctamente.", "error");
				}
			}
		});
	});

});
