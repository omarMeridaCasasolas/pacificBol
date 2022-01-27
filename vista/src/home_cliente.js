let listaIDReq = new Array();
let listaNomRequisitos  = new Array();
let tablaSolicitud;
let listaInputFileNuevos = new Array();
$(document).ready(function () {
	listarTramites();
    getlistaTramites();
    $("#addTipoSolicitud").change(function (e) { 
        e.preventDefault();
        let idSolicitud = $("#addTipoSolicitud").val();
		let text = $( "#addTipoSolicitud option:selected" ).text();
		solicitarRequisito(idSolicitud);
        if(text == "Exportar"){ //exportacion
			$('#idExportacion').attr('required', true); 

			$('#conExportacion').prop("disabled", false);
            $("#conExportacion").removeClass("d-none");
            
			$("#conImportacion").attr('disabled', true); 
            $("#conImportacion").addClass("d-none");
            // solicitarRequisito(1);
			$('#idImportacion').attr('required', false); 
        }else{
            if(text == "Importar"){
				$('#idImportacion').attr('required', true); 

				$('#conImportacion').prop("disabled", false);
                $("#conImportacion").removeClass("d-none");

				$("#conExportacion").attr('disabled', true); 
                $("#conExportacion").addClass("d-none");
                // solicitarRequisito(2);
				$('#idExportacion').attr('required', false);
            }else{
				if(text == "Importar/Exportar"){
					$('#conExportacion').prop("disabled", false);
					$('#conImportacion').prop("disabled", false);
					$("#conExportacion").removeClass("d-none");
					$("#conImportacion").removeClass("d-none");
					// solicitarRequisito(3);
					$('#idExportacion').attr('required', true); 
					$('#idImportacion').attr('required', true); 
				}else{
					console.log("aqui");
					$("#conExportacion").addClass("d-none");
					$("#conImportacion").addClass("d-none");
					$("#contFiles").empty();
				}
                
            }
        }
    });

	$("#formEvaluacionPedido").on('change','.myClassFile ',function () {
		// console.log(this.id);
		let idElemento =  this.id.split('_');
		let myID = idElemento[1];
		const index = listaInputFileNuevos.indexOf(myID);
		if (index > -1) {
			listaInputFileNuevos.splice(index, 1);
		}
		listaInputFileNuevos.push(myID);
		$("#btnAceptarP").removeAttr('disabled');
	});

	$("#formEvaluacionPedido").on('change','.changeSelect ',function () {
		$("#btnAceptarP").removeAttr('disabled');
	});


	$("#formEvaluacionPedido").submit(function (e) { 
		e.preventDefault();
		$('#myModal4').modal('hide');
		let fd = new FormData();    
		listaInputFileNuevos.forEach(element => {
			fd.append( 'myFile[]', $('#idFile_'+element)[0].files[0]);
		});
		fd.append("paisExportacion", $("#editPaisExportacion").val());
		fd.append("paisImportacion", $("#editPaisImportacion").val());
		fd.append('idCliente',$("#idClienteReq").html());
		fd.append('idTramite',$("#idTramiteReq").html());
		fd.append('idTramiteCliente',$("#idTramiteCliente").html())
		fd.append("listaID", listaInputFileNuevos);
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		$.ajax({
			type: "POST",
            url: "../controlador/updateFiles.php",
            data: fd,
            processData: false,
            contentType: false,
			success: function(response){
				console.log(response);
				let num1 = Number.parseInt(response);
                if(Number.isInteger(num1)){
                    tablaSolicitud.ajax.reload();
                    Swal.fire('Exito!!','Se ha realizado los cambios!!!','success');
                    $('#formAddSolicitud')[0].reset();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
			}
		});
	});


	$("#tablaSolicitud tbody").on('click','button.verRequermientos ',function () {
		let datosRequerimiento = tablaSolicitud.row( $(this).parents('tr') ).data();
		console.log(datosRequerimiento);
		$("#btnAceptarP").attr('disabled', true); 
		if(datosRequerimiento.tipo_tramite == "Importar"){
			$("#editPaisExportacion").attr('disabled', true); 
			$("#editPaisImportacion").attr('disabled', false);
			$("#editPaisExportacion").addClass("d-none");
			$("#editPaisImportacion").removeClass("d-none");
		}else{
			if(datosRequerimiento.tipo_tramite == "Exportar"){
				$("#editPaisImportacion").attr('disabled', true); 
				$("#editPaisExportacion").attr('disabled', false); 
				$("#editPaisImportacion").addClass("d-none");
				$("#editPaisExportacion").removeClass("d-none");
			}else{
				$("#editPaisImportacion").attr('disabled', false); 
				$("#editPaisExportacion").attr('disabled', false); 
				$("#editPaisImportacion").removeClass("d-none");
				$("#editPaisExportacion").removeClass("d-none");
			}
		}

        $("#tipoDocumento").html(datosRequerimiento.tipo_tramite);
        $("#verFechaTramite").html(datosRequerimiento.fecha_tramite);
        $("#detalleDescripcion").html(datosRequerimiento.descripcion_tramite);
		$("#editPaisExportacion").val(datosRequerimiento.pais_exportacion);
		$("#editPaisImportacion").val(datosRequerimiento.pais_importacion);
		$("#desEvaluacion").html(datosRequerimiento.descEvaluacion);

		$("#idClienteReq").html(datosRequerimiento.idcliente);
		$("#idTramiteReq").html(datosRequerimiento.idtramite);
		$("#idTramiteCliente").html(datosRequerimiento.idTramiteCliente);
        $.ajax({
            type: "POST",
            url: "../controlador/form_archivos.php",
            data: {metodo:'solictarArchivosTramite',idTramite: datosRequerimiento.idtramite,
			 idCliente: datosRequerimiento.idcliente , idTramiteCliente: datosRequerimiento.idTramiteCliente },
            success: function (response) {
            	console.log(response);
                listaRequerimeintos = JSON.parse(response);
                $("#conRequerimeintos").empty();
				listaInputFileNuevos = new Array();
                listaRequerimeintos.forEach(element => {
                	// listaIDReq.push(element.idrequisito);
                    //$("#conRequerimeintos").append("<a class='' target='_blank' href='"+element.direcion_archivo+"'>"+element.nombre_requerimiento+"</a><br>");
					$("#conRequerimeintos").append("<a class='' target='_blank' href='"+element.direcion_archivo+"'>  "+element.nombre_requerimiento+"</a>"+esNuevo(element.direcion_archivo)+"<br>");
					//$("#conRequerimeintos").append("<input type='file' accept='application/pdf' name='myFile[]' id='idFile_"+element.id_archivo+"' class='form-control myClassFile'>");
                	$("#conRequerimeintos").append("<input type='file' accept='application/pdf' "+verificarDireccion(element.direcion_archivo)+" name='myFile[]' id='idFile_"+element.idarchivo+"' class='form-control myClassFile'>");
                });
            }
        });

    });

    var form = document.forms.namedItem("formAddSolicitud");
    /*Listener del submit*/
    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        $('#myModal').modal('hide');
		var oData = new FormData(document.forms.namedItem("formAddSolicitud"));
        oData.append("numReq", listaIDReq);
        oData.append("textReq", listaNomRequisitos);
        for (var pair of oData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        // debugger;
            $.ajax({
            type: "POST",
            url: "../controlador/validarFiles.php",
            data: oData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                let num1 = Number.parseInt(response);
                if(Number.isInteger(num1)){
                    tablaSolicitud.ajax.reload();
                    Swal.fire('Exito!!','Se ha solicitado su tramite!!!','success');
                    $('#formAddSolicitud')[0].reset();
					$("#conExportacion").addClass("d-none");
					$("#conImportacion").addClass("d-none");
					$("#contFiles").empty();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
            }
        });
    }, false);
});


function solicitarRequisito(idReq){
    $.ajax({
        type: "POST",
        url: "../controlador/form_requerimeintos.php",
        data: {metodo:'getRequerimientoPorTramite',idTramite:idReq},
        success: function (response) {
            // console.log(response);
            listaRequerimientos = JSON.parse(response);
            $("#contFiles").empty();
            listaIDReq = new Array();
            listaNomRequisitos  = new Array();
            listaRequerimientos.forEach(element => {
                listaIDReq.push(element.idrequisito);
                listaNomRequisitos.push(element.nombre_requerimiento);
                $("#contFiles").append("<div class='form-group'><label><a href='"+element.enlace_requerimiento+"' target='_blank'> "+element.nombre_requerimiento+"</a></label>"+
                "<input type='file' name='requerimientos[]' required id='idElem_"+element.idrequisito+"' accept='application/pdf' class='form-control'></div>");
            });
        }
    });
}

function getlistaTramites(){
  	$('#tablaSolicitud').dataTable().fnDestroy();
 	tablaSolicitud = $("#tablaSolicitud").DataTable({
		responsive: true,
		"order": [[ 2, "desc" ]],
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
			data: { metodo: "getTramiteClienteUnico", idCliente: $("#idClienteHtml").html()},
			url: "../controlador/form_tramite.php",
		},
		columns: [
			{ data: "tipo_tramite", width: "10%" },
			{ data: "descripcion_tramite", width: "35%" },
			{ data: "fecha_tramite", width: "15%" },
			{ data: "pais_exportacion", width: "10%" },
			{ data: "pais_importacion", width: "10%" },
			// { data: "id_personal", // can be null or undefined
			// 	// "defaultContent": "Sin Asignacion", "width": "15%"},
			// 	render: function (data) {
			// 		if (data === undefined) {
			// 			return '<h5><span class="badge badge-warning">Falta</span></h5>';
			// 		} else {
			// 			return '<h5><span class="badge badge-success">Aceptado</span></h5>';
			// 		}
			// 	},
			// 	width: "10%",
			// },
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
		 	{ data: null,
				defaultContent:
				  "<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> ",
				//   "<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal2'><i class='fas fa-edit'></i></button>"+
				 // "<button type='button' class='bajaEmpleado btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-sync'></i></button>",
				width: "10%",
			  }
			],
			"initComplete": function(settings, json) {
				// obtenerTablas();
			  }
  	});
}

function listarTramites(){
	$.ajax({
		type: "POST",
		url: "../controlador/form_tramite.php",
		data: {metodo: 'listarTramites'},
		success: function (response) {
			// console.log(response);
			$("#addTipoSolicitud").empty();
			$("#addTipoSolicitud").append("<option value=''>Ninguno</option>");
			listaTramitesFal = JSON.parse(response);
			listaTramitesFal.forEach(element => {
				$("#addTipoSolicitud").append("<option value='"+element.idtramite+"'>"+element.tipo_tramite+"</option>")
			});
		}
	});
}

function esNuevo(elemento){
	if(elemento == null){
		return "<span class='badge badge-primary'>  Nuevo</span></h1>"
	}else{
		return "";
	}
} 

function verificarDireccion(elemento){
	if(elemento == null){
		return "required";
	}else{
		return "";
	}
}