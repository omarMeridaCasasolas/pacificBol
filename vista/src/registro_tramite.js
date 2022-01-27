	let tablaCliente;
	$(document).ready(function () {
		getlistaTramites();
		
		$("#tablaCliente tbody").on('click','button.verRequermientos ',function () {
			let datosRequerimiento = tablaCliente.row( $(this).parents('tr') ).data();
			console.log(datosRequerimiento);
			$("#verRazonSocial").html(datosRequerimiento.razon_social);
			$("#verFechaTramite").html(datosRequerimiento.fecha_tramite);
			$("#verCorreo").html(datosRequerimiento.correo_electronico);
			$("#verTelefono").html(datosRequerimiento.telefono);
			$("#idClienteReq").html(datosRequerimiento.idcliente);
			$("#idTramiteReq").html(datosRequerimiento.idtramite);
			$("#idTramiteCliente").html(datosRequerimiento.idTramiteCliente);
			$("#descripcionEvaluacion").html(datosRequerimiento.descEvaluacion);
			$("#contRespuesta").addClass('d-none');
			$("#btnAceptarP").prop("disabled", true);
			$("#checkEvaluacion").prop("checked",false);
			console.log(datosRequerimiento.estado);
			if(datosRequerimiento.estado == "Aceptado"){
				// $("#optradio").val(datosRequerimiento.estado);
				// $('#radioAceptado').attr('checked', true); 
				$('input:radio[name="optradio"][value="Aceptado"]').prop('checked', true);
			}else{
				if(datosRequerimiento.estado == "Rechazado"){
					$('input:radio[name="optradio"][value="Rechazado"]').prop('checked', true);
				}
			}
			$.ajax({
				type: "POST",
				url: "../controlador/form_archivos.php",
				data: {metodo:'solictarArchivosTramite',idTramite: datosRequerimiento.idtramite, 
				idCliente: datosRequerimiento.idcliente, idTramiteCliente: datosRequerimiento.idTramiteCliente},
				success: function (response) {
					console.log(response);
					listaRequerimeintos = JSON.parse(response);
					$("#conRequerimeintos").empty();
					listaRequerimeintos.forEach(element => {
						// console.log(element.enlace_requerimiento);
						// console.log(element.nombre_requerimiento);
						$("#conRequerimeintos").append("<a class='' target='_blank' href='"+element.direcion_archivo+"'>"+element.nombre_requerimiento+"</a><br>");
					});
				}
			});

			// $("#editIdDistribuidor").val(dataEditEmpleado.id_vendedor);
			// $("#editNombreDistribuidor").val(dataEditEmpleado.nombre_vendedor);
			// $("#editCorreoDistribuidor").val(dataEditEmpleado.login_vendedor);
			// $("#editTelDistribuidor").val(dataEditEmpleado.telefono_vendedor);
			// $("#editDireccionDistribuidor").val(dataEditEmpleado.direccion_vendedor);
			// $("#editCiDistribuidor").val(dataEditEmpleado.ci_vendedor);
		});

		//FORMULARIO PARA ENVIAR EVALUACION
		$("#formEvaluacionPedido").submit(function (e) { 
			e.preventDefault();
			$('#myModal4').modal('hide');
			let idPersonal = $("#idPersonalHtml").html();;
			let evaluacion = $('input[name="optradio"]:checked').val();
			let idCliente = $("#idClienteReq").html();
			let idTramite =$("#idTramiteReq").html();
			let descEvaluacion = $("#descripcionEvaluacion").val();
			let idTramiteCliente = $("#idTramiteCliente").html();
			$.ajax({
				type: "POST",
				url: "../controlador/form_producto.php",
				data: {metodo: 'realizarEvaluacion', idPersonal,evaluacion,descEvaluacion,idTramiteCliente},
				success: function (response) {
					console.log(response);
					let num1 = Number.parseInt(response);
					if(Number.isInteger(num1)){
						tablaCliente.ajax.reload();
						Swal.fire('Exito!!','Se ha hecho la evaluacion!!!','success');
						$('#formEvaluacionPedido')[0].reset();
						$("#contRespuesta").addClass('d-none');
						$("#btnAceptarP").prop("disabled", true);
					}else{
						Swal.fire('Problema!!', response,'info');
					}
				}
			});
		});

	$('#checkEvaluacion').on('change', function() {
		if ($(this).is(':checked') ) {
			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
			$("#contRespuesta").removeClass('d-none');
			$('#btnAceptarP').prop("disabled", false);
		} else {
			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
			$("#contRespuesta").addClass('d-none');
			$("#btnAceptarP").prop("disabled", true);
		}
	});
});

function getlistaTramites(){
	$('#tablaCliente').dataTable().fnDestroy();
	tablaCliente = $("#tablaCliente").DataTable({
		responsive: true,
		"order": [[ 3, "desc" ]],
		language: {
		sProcessing: "Procesando...",
		sLengthMenu: "Mostrar _MENU_ registros",
		sZeroRecords: "No se encontraron resultados",
		sEmptyTable: "Ninguno dato disponible en esta tabla",
		sInfo:
			"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
		sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
		sInfoPostFix: "",
		sSearch: "Buscar:",
		sUrl: "",
		sInfoThousands: ",",
		sLoadingRecords: "Cargando...",
		oPaginate: {
			sFirst: "Primero",
			sLast: "Ultimo",
			sNext: "Siguiente",
			sPrevious: "Anterior",
		},
		oAria: {
			sSortAscending:
			": Activar para ordenar la columna de manera ascendente",
			sSortDescending:
			": Activar para ordenar la columna de manera descendente",
		},
		buttons: {
			copy: "Copiar",
			colvis: "Visibilidad",
		},
		},
		ajax: {
		method: "POST",
		data: { metodo: "getTramiteCliente"},
		url: "../controlador/form_tramite.php",
		},
		columns: [
		{ data: "nit", width: "10%" },
		{ data: "razon_social", width: "15%" },
		{ data: "tipo_tramite", width: "15%" },
		{ data: "fecha_tramite", width: "10%" },
		{ data: "pais_importacion", width: "10%" },
		{ data: "pais_exportacion", width: "10%" },
		{ data: "estado", // can be null or undefined
		// "defaultContent": "Sin Asignacion", "width": "15%"},
		render: function (data) {
			// console.log(data);
			if (data === null) {
			return '<h5><span class="badge badge-warning">Sin evaluacion</span></h5>';
			} else {
			if(data == "Aceptado"){
				return '<h5><span class="badge badge-success">Aceptado</span></h5>';
			}else{
				return '<h5><span class="badge badge-danger">Rechazado</span></h5>';
			}
			}
		},
		width: "10%",
			},
		{
			data: null,
			defaultContent:
			"<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> ",
			//   "<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal2'><i class='fas fa-edit'></i></button>"+
			//  "<button type='button' class='bajaEmpleado btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-sync'></i></button>",
			width: "5%",
		}
		],
		"initComplete": function(settings, json) {
			// obtenerTablas();
		}
	});
}