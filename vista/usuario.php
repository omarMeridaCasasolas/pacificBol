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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="presentacion.php">Presentacion</a>
										<a class="dropdown-item" href="servicio.php">Servicios</a>
										<a class="dropdown-item" href="importacion.php">Importacion</a>
                                        <a class="dropdown-item" href="exportacion.php">Exportacion</a>
									</div>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link" href="usuario.php">Acceso</a>
								</li>
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
    <div class="my-3 py-5">
	</div>
    <div class="container mt-5 bg-info rounded col-lg-6 col-md-8 p-3 shadow-lg">
        <form action="../controlador/validar.php" method="post">
            <h1><span>A</span><span>c</span><span>c</span><span>e</span><span>s</span><span>o</span> <span>a</span><span>l</span> 
            <span>S</span><span>i</span><span>s</span><span>t</span><span>e</span><span>m</span><span>a</span></h1>
            <div class="form-group mx-md-5">
                <strong><label for="">Nombre de usuario</label></strong>
                <input type="text" maxlength="30" placeholder="Ingrese su nombre" name="c1" required=""  autocomplete="off" class='form-control'>
            </div>
            <div class="form-group mx-md-5">
                <strong><label for="">Contraseña</label></strong>
                <input type="password" maxlength="10" placeholder="Ingrese su contraseña" name="c2" required=""  class='form-control'>
            </div>
            <div class="text-center"><input type="submit" value="Ingresar" class='btn btn-primary'></div>
        </form>
    </div>
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
            let params = new URLSearchParams(location.search);
            let contract = params.get('action');

            if(contract != null){
                Swal.fire(contract+'!!',"Password o correo incorrecto",'info');
            }
        });
    </script>
</html>