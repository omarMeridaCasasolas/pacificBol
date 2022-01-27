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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link" href="publicacion.php">Novedades</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="informacion.php">Preguntenos</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
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
    <div class="my-1 py-5">
	</div>
    <main class="container rounded bg-info p-4 shadow" id="publicaciones" style='min-height: 80vh;'>
        <h2 class="text-center text-dark my-3">Lista de publicaciones</h2>
        <div id="contPublicaciones" class='p-4'>
        </div>
    </main>
	<!-- <div class="section full-height">
		<div class="absolute-center">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-12">
				<h1><span>B</span><span>o</span><span>o</span><span>t</span><span>s</span><span>t</span><span>r</span><span>a</span><span>p</span> <span>4</span><br>
				<span>m</span><span>e</span><span>n</span><span>u</span></h1>
				<p>scroll for nav animation</p>	
						</div>	
					</div>		
				</div>		
			</div>
			<div class="section mt-5">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div id="switch">
								<div id="circle"></div>
							</div>
						</div>	
					</div>		
				</div>			
			</div>
		</div>
	</div> -->
	<!-- <div class="my-5 py-5">
	</div> -->
  
<!-- Link to page
================================================== -->

	<!-- <a href="https://front.codes/" class="logo" target="_blank">
		<img src="https://assets.codepen.io/1462889/fcy.png" alt="">
	</a> -->

</body>
    <script src="src/index.js"></script>
    <script>
        $(document).ready(function () {
            verPublicaciones();
        });
        function verPublicaciones(){
            $.ajax({
                type: "POST",
                url: "../controlador/form_publicacion.php",
                data: {metodo:"verPublicaciones"},
                success: function (response) {
                    console.log(response);
                    listaPublicaciones = JSON.parse(response);
                    if(listaPublicaciones.length == 0){
                        $("#contPublicaciones").append("<div class='text-center'><img src='src/sin_publicaciones.gif' alt='imagen sin contenido'></img></div>");
                    }
                    listaPublicaciones.forEach(element => {
                        // $("#contPublicaciones").append("<div class='container'><h2></h2><div class='card'><div class='card-header p-1'><h4 class='text-center'>"+element.titulo_publicacion+"</h4></div>"+
                            // "<div class='card-body'>"+element.descripcion_publicacion+"</div> <div class='card-footer'><a href='"+element.enlace_publicacion+"' target='_blank'>Archivo</a></div></div></div>");
                        $("#contPublicaciones").append("<hr><div><h4>"+element.titulo_publicacion+"</h4><p class='text-justify'>"+element.descripcion_publicacion+"</p>"+
                        "<a href='"+element.enlace_publicacion+"' target='_blank' class='p-1 text-white'> <i class='fas fa-link'></i>Archivo</a> <p class='text-right m-1'>Publicacion: "+element.fecha_publicacion+"</p></div>");
                    });
                }
            });
        }
    </script>
</html>