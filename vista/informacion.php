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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="../index.php">Inicio</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="publicacion.php">Novedades</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
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
    <div class="my-5 py-5">
	</div>
    <main class="container bg-white border rounded p-3 shadow-lg">
        <div class="row p-2">
            <div class="col-lg-6 bg-info text-white text-center rounded-lg">
                <h4 class='mt-5'>Información</h4>
                <h6><i class="fas fa-map-marked-alt"></i>  Plaza 14 de septiembre N° 0-238 Piso 2 Oficina N°5</h6>
                <br>
                <h6><i class="fas fa-mobile-alt"></i>  Vivian P. Ledezma D. Celular: 7743475</h6>
                Jimmy E. Ledezma D. Gerente Administrativo Celular 77991958

                Otras referencias 4227900 - 4250134
                <br>
                <h6 class='mb-5'><i class="fas fa-mail-bulk"></i>   pacificbolsrl@gmail.com</h6>
                <h3>PACIFICB<i class="fas fa-globe-americas"></i>L</h3>
                <h5 class='mb-4'>Agencia Despachante De Aduanas</h5>
            </div>
            <div class="col-lg-6">
                <form action="../php/envio.php" method="post">
                    <h3 class='text-center p-2 text-primary'>Enviar un Correo</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        </div>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Escriba su nombre" id="name" name="name" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lightbulb"></i></i></span>
                        </div>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Razon o asunto" id="razon_social" name="razon_social" required>
                    </div>
                    <div class="row">
                        <div class="input-group mb-3 col-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" autocomplete="off" placeholder="teléfono" id="telefono" name="teléfono" required>
                        </div>
                        <div class="input-group mb-3 col-7">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control" autocomplete="off" placeholder="Correo" id="correo" name="correo" required>
                        </div>
                    </div>
                    <textarea name="mensaje" id="mensaje" class='form-control' autocomplete="off" style="overflow:auto;resize:none" cols="30" rows="6" placeholder="Escribe tu pregunta o comentario" required></textarea>
                    <div class="text-center m-2">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
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
</html>