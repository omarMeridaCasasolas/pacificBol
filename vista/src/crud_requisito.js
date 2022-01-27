let tablaRequisito;
$(document).ready(function () {
	getlistaRequerimientos();
	////////////////////// EDITAR REQUERIMIENTO
	$("#tablaRequisito tbody").on('click','button.editItem ',function () {
		let datosRequisito = tablaRequisito.row( $(this).parents('tr') ).data();
        console.log(datosRequisito);
        // $("#delIdPublicacion").html(datosRequisito.id_publicacion);
        $("#editTituloReq").val(datosRequisito.nombre_requerimiento);
		$("#editDescReq").val(datosRequisito.descripcion_requerimiento);
		$("#idRequerimientoEdit").val(datosRequisito.idrequisito);
		$("#archivoAnterior").attr("href",datosRequisito.enlace_requerimiento )
		// $("#idEditPublicacion").val(datosRequisito.id_publicacion);
    });

	$("#formEditarRequerimiento").submit(function (e) { 
		e.preventDefault();
		// let fd = new FormData();  
		$('#myModal2').modal('hide');
        let fd = new FormData(document.forms.namedItem("formEditarRequerimiento"));
		fd.append( 'metodo', 'editarRequerimiento' );
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		$.ajax({
			type: "POST",
			url: "../controlador/form_requerimeintos.php",
			data: fd,
			processData: false,
  			contentType: false,
			success: function (response) {
			console.log(response);
			let num1 = Number.parseInt(response);
			if(Number.isInteger(num1)){
			    tablaRequisito.ajax.reload();
			    Swal.fire('Exito!!','Se Actualizado el requisito!!!','success');
			    $('#formEditarRequerimiento')[0].reset();
			}else{
			    Swal.fire('Problema!!', response,'info');
			}
		}
		});
	});

	////////////////////////
	$("#formAddRequerimiento").submit(function (e) { 
		$('#myModal').modal('hide');
		e.preventDefault();
		let fd = new FormData();  
		fd.append( 'metodo', 'agregarRequerimiento' );
		fd.append( 'myFile', $('#formAddRequerimiento input[type=file]')[0].files[0] );
		fd.append( 'descripcion', $("#descTramite").val() );
		fd.append( 'titulo', $("#addTituloReq").val() );
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		$.ajax({
			type: "POST",
			url: "../controlador/form_requerimeintos.php",
			data: fd,
			processData: false,
  			contentType: false,
			success: function (response) {
			console.log(response);
			let num1 = Number.parseInt(response);
			if(Number.isInteger(num1)){
			    tablaRequisito.ajax.reload();
			    Swal.fire('Exito!!','Se ha creado el requerimiento!!!','success');
			    $('#formAddRequerimiento')[0].reset();
			}else{
			    Swal.fire('Problema!!', response,'info');
			}
		}
		});
	});
		
});

function getlistaRequerimientos(){
	$('#tablaRequisito').dataTable().fnDestroy();
	tablaRequisito = $("#tablaRequisito").DataTable({
		responsive: true,
		"order": [[ 4, "desc" ]],
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
			data: { metodo: "getListaRequisitosTable"},
			url: "../controlador/form_requerimeintos.php"
		},
		columns: [
			{ data: "idrequisito", width: "5%" },
			{ data: "nombre_requerimiento", width: "15%" },
			{ data: "descripcion_requerimiento", width: "45%" },
			{ "data": "enlace_requerimiento",
              "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  $(nTd).html("<a href='"+oData.enlace_requerimiento+"' target='_blank'>Documento</a>");
              },width: "10%"
         	 },
			{ data: "fecha_requisito", width: "10%" },
			{ data: null,
				defaultContent:
				// "<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> ",
						"<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal2'><i class='fas fa-edit'></i></button>",
				//  "<button type='button' class='bajaEmpleado btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-sync'></i></button>",
				width: "10%"
			}
		],
		"initComplete": function(settings, json) {
				// obtenerTablas();
			}
	});
}