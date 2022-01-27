<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="hero-anime">	
	<div class="navigation-wrap bg-light start-header start-style p-1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
						<!-- <a class="navbar-brand" href="https://front.codes/" target="_blank"><img src="Pacificbol_logo.png" alt="" srcset=""></a>	 -->
                        <img src="src/Pacificbol_logo.png" class="navbar-brand" alt="" style="height: 90px;">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="../index.php">Inicio</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="publicacion.php">Novedades</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="informacion.php">Preguntenos</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="presentacion.php">Presentacion</a>
										<a class="dropdown-item" href="servicio.php">Servicios</a>
										<a class="dropdown-item" href="importacion.php">Importacion</a>
                                        <a class="dropdown-item" href="exportacion.php">Exportacion</a>
									</div>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="usuario.php">Acceso</a>
								</li>
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
    <div class="my-5 py-2">
	</div>
    <div class="container mt-5 bg-info rounded p-3">
        <h4>Documentos necesarios para el Despacho Aduanero de exportacion de mercancías de Bolivia</h4>
		<hr>
		<div id="contenorExportacion"></div>
        <div class="text-center">
            <img src="src/img_exportacion.png" alt="" srcset="" width="80%">
        </div>
    </div>
</body>

<script src="src/index.js"></script>
<script>
	$(document).ready(function () {
		getRequerimientosExportacion();
	});
	function getRequerimientosExportacion(){
		$.ajax({
			type: "POST",
			url: "../controlador/form_requerimeintos.php",
			data: {metodo: 'getRequerimientosExportacion'},
			success: function (response) {
				console.log(response);
				listaTramite = JSON.parse(response);
				if(listaTramite.length == 0){
                    $("#contenorExportacion").append("<div class='text-center'><img src='src/sin_publicaciones.gif' alt='imagen sin contenido'></img></div>");
                }
				listaTramite.forEach(element => {
					$("#contenorExportacion").append("<a href='"+element.enlace+"' class='text-white' target='_blank'>"+element.nombre+" <i class='fas fa-download'></i> </a><p class='text-justify'>"+obtenerRespuesta(element.descripcion)+"<p><hr>");
				});
			}
		});    
	}
	function obtenerRespuesta(miString){
		console.log(miString);
		if(miString == null){
			return "No existe descripcion para este documento";
		}else{
			return miString;
		}
	}
</script>
</html>