let tablaUsuario;
$(document).ready(function () {
	getlistaUsuarios();
	////////////////////// EDITAR REQUERIMIENTO
	$("#tablaUsuario tbody").on('click','button.editItem ',function () {
		let datoEmpleado = tablaUsuario.row( $(this).parents('tr') ).data();
        console.log(datoEmpleado);
        // $("#delIdPublicacion").html(datoEmpleado.id_publicacion);
        $("#idEditPersonal").val(datoEmpleado.idpersonal);
        $("#editNombre").val(datoEmpleado.nombres);
		$("#editApellido").val(datoEmpleado.apellidos);
		$("#editCargo").val(datoEmpleado.cargo);
        $("#editGenero").val(datoEmpleado.genero);
		$("#editTelefono").val(datoEmpleado.telefono_personal);
		// $("#idEditPublicacion").val(datoEmpleado.id_publicacion);
    });

	$("#formEditPersonal").submit(function (e) { 
		e.preventDefault();
		// let fd = new FormData();  
		$('#myModal2').modal('hide');
        let fd = new FormData(document.forms.namedItem("formEditPersonal"));
		fd.append( 'metodo', 'editarPersonal' );
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		$.ajax({
			type: "POST",
			url: "../controlador/form_personal.php",
			data: fd,
			processData: false,
  			contentType: false,
			success: function (response) {
			console.log(response);
			let num1 = Number.parseInt(response);
			if(Number.isInteger(num1)){
			    tablaUsuario.ajax.reload();
			    Swal.fire('Exito!!','Se Actualizado los datos!!!','success');
			    $('#formEditarRequerimiento')[0].reset();
			}else{
			    Swal.fire('Problema!!', response,'info');
			}
		}
		});
	});

	////////////////////////
	$("#formAddPersonal").submit(function (e) { 
		e.preventDefault();
		$('#myModal').modal('hide');
        let fd = new FormData(document.forms.namedItem("formAddPersonal"));
		fd.append( 'metodo', 'agregarPersonal' );
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		$.ajax({
			type: "POST",
			url: "../controlador/form_personal.php",
			data: fd,
			processData: false,
  			contentType: false,
			success: function (response) {
			console.log(response);
			let num1 = Number.parseInt(response);
			if(Number.isInteger(num1)){
			    tablaUsuario.ajax.reload();
			    Swal.fire('Exito!!','Se ha creado el usuario!!!','success');
			    $('#formAddPersonal')[0].reset();
			}else{
			    Swal.fire('Problema!!', response,'info');
			}
		    }
		});
	});

	// DAR DE BAJA EMPLEADO 
	$("#tablaUsuario tbody").on('click','button.estadoEmpleado',function () {
        let dataPersona = tablaUsuario.row( $(this).parents('tr') ).data();
        $("#bajaPersona").val(dataPersona.idpersonal);
        // console.log(dataPersona);
		let myBool = (dataPersona.estado_personal === 'true');
        $("#estadobajaPersonaCambio").val(!myBool);
		console.log(!myBool);
        if(myBool){ 
            $("#idTextEstadoPersona").html("Desea desactivar a <strong>"+dataPersona.nombre_completo+"</strong>, esto permitira desabilitar las funciones de la persona");
        	
        	$("#btnSubmitChange").val("Desactivar");
        }else{
            $("#idTextEstadoPersona").html("Desea activar a <strong>"+dataPersona.nombre_completo+"</strong>, esto permitira habilitar las funciones de la persona");
        	$("#btnSubmitChange").val("Activar");
        }
        // $('#bajaFacultadNombre').html(dataPersona.nombre_facultad);
    });

	$("#formBajaPersona").submit(function (e) { 
        e.preventDefault();
        $('#myModal3').modal('hide');
        $.ajax({
            type: "POST",
            url: "../controlador/form_personal.php",
            data: {metodo:"cambiarEstadoPersona",idPersona: $("#bajaPersona").val(), estado: $("#estadobajaPersonaCambio").val()},
            success: function (response) {
                console.log(response);
                let aux = Number.parseInt(response);
                if(Number.isInteger(aux)){
                    tablaUsuario.ajax.reload();
                    Swal.fire("Exito!!","Se ha actualizado el estado de la persona",'success');
                }else{
                    Swal.fire("Problema",response,'info');
                }
            }
        });
    });
		
});

function getlistaUsuarios(){
	$('#tablaUsuario').dataTable().fnDestroy();
	tablaUsuario = $("#tablaUsuario").DataTable({
		responsive: true,
		"order": [[ 4, "asc" ]],
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
			url: "../controlador/obtenerDirectamente.php"
			// data: { metodo: "getListaDePesonal"},
			// url: "../controlador/form_personal.php"
		},
		columns: [
			{ data: "nombre_completo", width: "25%" },
            { data: "cargo", width: "15%" },
			{ data: "telefono_personal", width: "10%" },
            { data: "genero", width: "15%" },
            // { data: "estado", width: "10%" },
			{
				data: "estado_personal", // can be null or undefined
				// "defaultContent": "Sin Asignacion", "width": "15%"},
				render: function (data) {
				  if (data == 'true') {
					return '<h5><span class="badge badge-success">Activo</span></h5>';
					} else {
						return '<h5><span class="badge badge-danger">Inactivo</span></h5>';
					}
				},
				width: "15%",
			},
			{ data: null,
				defaultContent:
				// "<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> ",
				"<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal2'><i class='fas fa-edit'></i></button> "+
				"<button type='button' class='estadoEmpleado btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-sync'></i></button>",
				width: "10%"
			}
		],
		"initComplete": function(settings, json) {
				// obtenerTablas();
			}
	});
}