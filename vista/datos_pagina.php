<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <style>
        main {
            text-align: justify;
            text-justify: inter-word;
        }
    </style>
</head>
<body class='bg-secondary'>
    <?php
        include_once("navbar.php");
    ?>
    <main class="container bg-white border rounded p-3 min-vh-100">
        <div class="container border border-top-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs bg-light" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Presentación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Misión y Visión </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu3">Servicios </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu5">Importación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu4">Exportación</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content min-vh-100">
                <div id="home" class="container tab-pane active"><br>
                <h3>Presentación</h3>
                    <p>ADA PACIFICBOL S.R.L., inicia sus actividades en Cochabamba Bolivia con el fin de dar una atención y asesoramiento profesional en Comercio Exterior y Aduanas a sus clientes, bridando transparencia, seguridad jurídica, colaborando a las autoridades aduaneras con la aplicación correcta de las normas legales. </p>
                    <div class="text-center">
                        <img src="../IMG/igg/addIMG1.png" alt="Error al cargar la imagen" width="100%">
                    </div>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Misión</h3>
                    <p>Nuestra experiencia y conocimiento en el rubro del Comercio Exterior y Aduanas, permite ofrecer a nuestros clientes un servicio integral y garantizado en los Despachos Aduaneros, en forma rápida, segura y transparente.</p>
                    <p>Al contar con un personal de amplia experiencia en el rubro y conocimientos y constante actualización en la dinámica del Comercio exterior y Aduanas garantizando un servicio integral en los Despachos Aduaneros en forma segura, rápida y transparente. </p>
                    <h3>Visión</h3>
                    <p>Ser un referente </p>
                    <p>Ampliar nuestros servicios a nivel nacional, logrando prestigio en el rubro, brindando nuestra atención con calidad y calidez con alto grado de confiabilidad. </p>
                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                    <h3>Servicio</h3>
                    <p><strong>Despachos Aduaneros.</strong> Nuestro servicio de despachos aduaneros tanto en importaciones y/o exportaciones por cualquier Aduana, previa control de documentos, correcta clasificación arancelaria para que exista una adecuada Liquidación de Tributos Aduaneros para que de esta forma no exista algún tipo de evasión Impositiva. </p>
                    <p>Le brindamos un servicio seguro, rápido, confiable y personalizado en los Despachos Aduaneros.</p>
                    <h5>Asesoramiento en Comercio Exterior y Aduanas</h5>
                    <p>El personal de PACIFICBOL S.R.L, cuenta con muchos años de experiencia, con formación académica en el rubro de Comercio Exterior y Aduanas, especializados en la logística aduanera para dar respuestas a todos sus requerimientos. </p>

                    <h5>Colaboración en la obtención de permisos y autorizaciones</h5> 

                    <p>Brindamos nuestra colaboración en la obtención de ciertos requisitos especiales a la importación de determinadas mercancías con trámites ante las Instituciones como: </p> 
                    <ul>
                        <li>SUSTANCIAS CONTROLADAS</li>
                        <li>SENASAG </li>
                        <li>IBMETRO</li>
                        <li>SENAVEX</li>
                        <li>ASP-B</li>
                        <li>IBNORCA</li>
                    </ul>
                </div>
                <div id="menu4" class="container tab-pane fade"><br>
                    <h4>Documentos necesarios para el Despacho Aduanero de exportación de mercancías en Bolivia </h4>
                    <div id="contenorImportacion"></div>
                </div>
                <div id="menu5" class="container tab-pane fade"><br>
                    <h4>Documentos necesarios para el Despacho Aduanero de importación de mercancías de Bolivia</h4>
                    <div id="contenorExportacion"></div>
                </div>
            </div>
        </div>
    </main>
</body>
    <script>
        $(document).ready(function () {
            getRequerimientosImportacion();
            getRequerimientosExportacion();
        });
        function getRequerimientosImportacion(){
            $.ajax({
                type: "POST",
                url: "../controlador/form_requerimeintos.php",
                data: {metodo: 'obtenerRequerimientoImportacion'},
                success: function (response) {
                    console.log(response);
                    listaTramite = JSON.parse(response);
                    listaTramite.forEach(element => {
                        $("#contenorImportacion").append("<a href='"+element.enlace+"' target='_blank'>"+element.nombre+"</a><p class='mb-1'>"+obtenerRespuesta(element.descripcion)+"<p><hr>");
                    });
                }
            });    
        }
        function getRequerimientosExportacion(){
            $.ajax({
                type: "POST",
                url: "../controlador/form_requerimeintos.php",
                data: {metodo: 'getRequerimientosExportacion'},
                success: function (response) {
                    console.log(response);
                    listaTramite = JSON.parse(response);
                    listaTramite.forEach(element => {
                        $("#contenorExportacion").append("<a href='"+element.enlace+"' target='_blank'>"+element.nombre+"</a><p class='mb-1'>"+obtenerRespuesta(element.descripcion)+"<p><hr>");
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