let tablaTramite;
let numRequerimiento = 0;
let cantRequerimientos = 0;
$(document).ready(function () {
    getlistaTramites();

	$("#formEditRequerimiento").on('click','button.deletRequerimiento',function () {
		// e.preventDefault();
		console.log(this.id);
		let parm = this.id;
		let valores = parm.split("_");
		$("#fila_"+valores[1]).remove();
		cantRequerimientos--;
    });
	
	$("#addRequerimientoTra").click(function (e) { 
		e.preventDefault();
		numRequerimiento++;
		cantRequerimientos++;
		$("#conRequerimeintos").append("<div class='row' id='fila_"+numRequerimiento+"'><div class='form-group col-9'><input type='text' name='inTituloReq[]'"+
		"class='form-control' placeholder='Titulo Requerimiento' required><input type='file' class='form-control' name='requerimientos[]' "+
		"accept='application/pdf' required></div><div class='col-3'><button type='button' id='btnDelet_"+numRequerimiento+"' class='btn btn-danger mt-3 deletRequerimiento'>Eliminar</button></div></div>");
	});

    $("#tablaTramite tbody").on('click','button.verRequermientos ',function () {
		let datosRequerimiento = tablaTramite.row( $(this).parents('tr') ).data();
		console.log(datosRequerimiento);
		// $("#verNombreTramite").html(datosRequerimiento.tipo_tramite);
        $("#descTramite").val(datosRequerimiento.descripcion_tramite);
		$("#idTramiteAct").val(datosRequerimiento.idtramite);
		$("#tipoTramite").html(datosRequerimiento.tipo_tramite);
		$("#fechaTramite").html(datosRequerimiento.fecha_tramite);
        $.ajax({
            type: "POST",
            url: "../controlador/form_requerimeintos.php",
            data: {metodo:'getRequerimiento'},
            success: function (response) {
				// console.log(response);
                listaRequerimeintos = JSON.parse(response);
                console.log(listaRequerimeintos);
                $("#conRequerimeintos").empty();
                listaRequerimeintos.forEach(element => {
                    $("#conRequerimeintos").append('<div class="form-check">'+
					'<label class="form-check-label" for="check_'+element.idrequisito+'">'+
					  '<input type="checkbox"  class="form-check-input" id="check_'+element.idrequisito+'" name="requisito"'+ 
					  'value="'+element.idrequisito+'"><a href="'+element.enlace_requerimiento+'" target="_blank">'+element.nombre_requerimiento+'</a>'+
					'</label>'+
				  	'</div>');
                  	// $("#conRequerimeintos").append("<div class='row' id='fila_"+numRequerimiento+"'><div class='form-group col-9'><input type='text' name='inTituloReq[]'"+
                  	// "class='form-control' value='"+element.nombre_requerimiento+"' required> <a target='_blank' href='"+element.enlace_requerimiento+"'> Archivo anterior</a>"+
                  	// "<input type='file' class='form-control' name='requerimientos[]' accept='application/pdf' value='"+element.enlace_requerimiento+"'></div><div class='col-3'><button type='button' "+
                  	// "id='btnDelet_"+numRequerimiento+"' class='btn btn-danger mt-3 deletRequerimiento'>Eliminar</button></div></div>")
                });
				marcarRequerimientosAnteriores(datosRequerimiento.idtramite);
            }
        });
    });

	// PARA ENVIAR REQUERIMIENTOS
	$("#formEditRequerimiento").submit(function (e) { 
		e.preventDefault();
		$('#myModal4').modal('hide');
		let listaIDReq = new Array();
		$.each($("input[name='requisito']:checked"), function(){
			listaIDReq.push($(this).val());
		});
		let descripcion = $("#descTramite").val();
		let idTramite = $("#idTramiteAct").val();
		$.ajax({
			type: "POST",
			url: "../controlador/form_tramite.php",
			data: {metodo:'relacionarTramiteRequerimientos',idTramite,descripcion,listaIDReq},
			success: function (response) {
				const trimmedString = response.trim();
				console.log(trimmedString);
				if( trimmedString== "1 1 1"){
            	    tablaTramite.ajax.reload();
                    Swal.fire('Exito!!','Se Actualizado el tramite!!!','success');
                    $('#formEditRequerimiento')[0].reset();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
			}
		});
	});
});

function getlistaTramites(){
    $('#tablaTramite').dataTable().fnDestroy();
	tablaTramite = $("#tablaTramite").DataTable({
		responsive: true,
		"order": [[ 2, "asc" ]],
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
			}
		},
		ajax: {
			method: "POST",
			data: { metodo: "getTramite"},
			url: "../controlador/form_tramite.php"
		},
		columns: [
			{ data: "idtramite", width: "5%" },
			{ data: "tipo_tramite", width: "10%" },
			{ data: "descripcion_tramite", width: "45%" },
			{ data: "fecha_tramite", width: "15%" },
			{
				data: "estado_tramite", // can be null or undefined
				// "defaultContent": "Sin Asignacion", "width": "15%"},
				render: function (data) {
					if (data == true) {
						return '<h5><span class="badge badge-success">Vigente</span></h5>';
					} else {
						return '<h5><span class="badge badge-danger">Baja</span></h5>';
					}
				},
				width: "10%"
			},
			{
				data: null,
				defaultContent:
				"<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> ",
				//   "<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal2'><i class='fas fa-edit'></i></button>"+
				//  "<button type='button' class='bajaEmpleado btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-sync'></i></button>",
				width: "10%"
			}
		],
		"initComplete": function(settings, json) {
			// obtenerTablas();
		}
	});
}

function marcarRequerimientosAnteriores(idTramite){
	$.ajax({
		type: "POST",
		url: "../controlador/form_tramite.php",
		data: {metodo:'getRequerimientosTramite',idTramite},
		success: function (response) {
			console.log(response);
			let listaAnterior = JSON.parse(response);
			listaAnterior.forEach(element => {
				$("#check_"+element.idrequisito).prop("checked", true);
			});
		}
	});
}