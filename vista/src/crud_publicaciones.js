let tablaPublicacion;
$(document).ready(function () {
    getlistaTramites();

    $("#tablaPublicacion tbody").on('click','button.eliminarPublicacion ',function () {
		let datosPublicacion = tablaPublicacion.row( $(this).parents('tr') ).data();
        console.log(datosPublicacion);
        // $("#delIdPublicacion").html(datosPublicacion.id_publicacion);
        $("#nombreDelPublicion").html(datosPublicacion.titulo_publicacion);
		$("#delIdPublicacion").val(datosPublicacion.id_publicacion);
    });

	$("#tablaPublicacion tbody").on('click','button.editItem ',function () {
		let datosPublicacion = tablaPublicacion.row( $(this).parents('tr') ).data();
        console.log(datosPublicacion);
        // $("#delIdPublicacion").html(datosPublicacion.id_publicacion);
        $("#desEditPublicacion").val(datosPublicacion.descripcion_publicacion);
		$("#editPublicacionTit").val(datosPublicacion.titulo_publicacion);
		$("#idEditPublicacion").val(datosPublicacion.id_publicacion);
    });

  $("#formAddPublicacion input[type=file]").change(function (e) { 
      e.preventDefault();
      console.log("estos")
      if(this.files[0].size > 10097152){
        alert("El archivo es muy grande no se puede subir!!!");
        this.value = "";
      };
  });

	$("#formEditPublicacion").submit(function (e) { 
		e.preventDefault();
		$('#myModal4').modal('hide');
		let fd = new FormData();    
		fd.append( 'metodo', 'actualizarPublicacion' );
		fd.append( 'myFile', $('#formEditPublicacion input[type=file]')[0].files[0] );
		fd.append( 'descripcion', $("#desEditPublicacion").val() );
		fd.append( 'titulo', $("#editPublicacionTit").val() );
		fd.append( 'idPublicacion', $("#idEditPublicacion").val() );
		fd.append('idPersonal',$("#idPersonalHtml").html())
		for (var pair of fd.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
		// debugger;
		$.ajax({
			type: "POST",
			url: "../controlador/form_publicacion.php",
			data: fd,
		  	processData: false,
  			contentType: false,
			success: function (response) {
				console.log(response);
				let num1 = Number.parseInt(response);
                if(Number.isInteger(num1)){
                  tablaPublicacion.ajax.reload();
                  Swal.fire('Exito!!','Se ha Actualizado la publicacion!!!','success');
                  $('#formEditPublicacion')[0].reset();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
			}
		});
	});

	$("#formDeletPublicacion").submit(function (e) { 
		e.preventDefault();
		$('#myModal3').modal('hide');
		$.ajax({
			type: "POST",
			url: "../controlador/form_publicacion.php",
			data: {metodo: 'eliminarPublicacion',idPublicacion:$("#delIdPublicacion").val()},
			success: function (response) {
				console.log(response);
				let num1 = Number.parseInt(response);
                if(Number.isInteger(num1)){
                  tablaPublicacion.ajax.reload();
                  Swal.fire('Exito!!','Se ha eliminado la publicacion!!!','success');
                  $('#formDeletPublicacion')[0].reset();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
			}
		});
	});

    $("#formAddPublicacion").submit(function (e) { 
        $('#myModal').modal('hide');
        e.preventDefault();                   
        $.ajax({
            url: '../controlador/myPublicacion.php', // <-- point to server-side PHP script 
            // dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),                         
            type: 'post',
            success: function(res){
                console.log(res);
				        let num1 = Number.parseInt(res);
                if(Number.isInteger(num1)){
                  tablaPublicacion.ajax.reload();
                  Swal.fire('Exito!!','Se ha hecho la publicacion!!!','success');
                  $('#formAddPublicacion')[0].reset();
                }else{
                    Swal.fire('Problema!!', response,'info');
                }
            }
        });
    });
});

function getlistaTramites(){
    $('#tablaPublicacion').dataTable().fnDestroy();
    tablaPublicacion = $("#tablaPublicacion").DataTable({ 
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
          data: { metodo: "getlistaPublicaciones"},
          url: "../controlador/form_publicacion.php",
        },
        columns: [
          { data: "titulo_publicacion", width: "25%" },
          { data: "descripcion_publicacion", width: "35%" },
          { data: "fecha_publicacion", width: "15%" },

          // {
          //   data: "enlace_publicacion", // can be null or undefined
          //   // "defaultContent": "Sin Asignacion", "width": "15%"},
          //   render: function (data) {
          //       if (data == true) {
          //           return '<h5><span class="badge badge-success">Vigente</span></h5>';
          //       } else {
          //           return '<h5><span class="badge badge-danger">Baja</span></h5>';
          //       }
          //   },
          //   width: "20%",
          // },
          { "data": "enlace_publicacion",
              "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  $(nTd).html("<a href='"+oData.enlace_publicacion+"' target='_blank'>Documento</a>");
              },width: "15%"
          },

          {
            data: null,
            defaultContent:
              // "<button type='button' class='verRequermientos btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal4'><i <i class='fas fa-list-ol'></i></button> "+
              "<button type='button' class='editItem btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal4'><i class='fas fa-edit'></i></button>  "+
              "<button type='button' class='eliminarPublicacion btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal3'><i class='fas fa-trash-alt'></i></button>",
            width: "15%",
          }
        ],
        "initComplete": function(settings, json) {
            // obtenerTablas();
          }
    });
}