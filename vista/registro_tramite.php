<?php
    include_once('header_empleado.php');
?>
    <main class="container border">
        <h1 class="text-primary text-center my-3">Evaluación de trámites</h1>
        <!-- <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Agregar tramite</button> -->
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaCliente" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr class="">
                        <th>NIT</th>
                        <th>Razón social</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Importación</th>
                        <th>Exportación</th>
                        <th>Evaluación</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MODAL PARA EDITAR   -->
    <div class="modal fade" id="myModal4">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Ver detalles de requisitos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formEvaluacionPedido" class='p-1'>
                            <span id='idClienteReq' class='d-none' ></span>
                            <span id='idTramiteReq' class='d-none' ></span>
                            <span id='idTramiteCliente' class='d-none' ></span>
                            <div class="row">
                                <div class="col-7">
                                    <h6>Razón Social: <strong id='verRazonSocial'></strong></h6>
                                </div>
                                <div class="col-5">
                                    <h6>Fecha: <strong id='verFechaTramite'></strong></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <h6>Correo: <strong id='verCorreo'></strong></h6>
                                </div>
                                <div class="col-5">
                                    <h6>Teléfono: <strong id='verTelefono'></strong></h6>
                                </div>
                            </div>
                            <h6>Lista de archivos presentados</h6>
                            <div id="conRequerimeintos" class="p-2">
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="" id="checkEvaluacion">Habiltar Evaluación
                                </label>
                            </div>
                            <div id="contRespuesta" class="d-none p-2" >
                                <h5>Observacion</h5>
                                <textarea name="descripcionEvaluacion" placeholder = "Describa el estado del trámite" id="descripcionEvaluacion" style="overflow:auto;resize:none" cols="30" rows="7" class="form-control mb-2"></textarea>
                                <span>Evaluar como:</span>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" id="radioAceptado" value="Aceptado" checked>Aceptado
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" id="radioRechazado" value="Rechazado">Rechazado
                                    </label>
                                    </div>
                                </div> 
                            </div>
                            
                            <div class='text-center mb-3'>
                                <input type="submit" class='btn btn-success' id='btnAceptarP' value="Aceptar" disabled>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/registro_tramite.js"></script>
</body>
</html>