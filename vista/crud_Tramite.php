<?php
    include_once('header_empleado.php');
?>
    <main class="container border rounded shadow-lg p-3" style='min-height: 70vh;'>
        <h1 class="text-primary text-center my-3">Trámites</h1>
        <!-- <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Agregar tramite</button> -->
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaTramite" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descrpción</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MODAL PARA EDITAR REQUERIMIENTO  -->
    <div class="modal fade" id="myModal4">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white">Ver detalle de requisitos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id='formEditRequerimiento' enctype="multipart/form-data">
                            <h6>Tipo: <strong id='tipoTramite'></strong></h6>
                            <h6>Fecha: <strong id='fechaTramite'></strong></h6>
                            <h6 class='' >Documento para <span id='verNombreTramite'></span></h6>
                            <input type="text" name="idPersona" id="idPersona" class='d-none' value="<?php echo $_SESSION['idPersonal'];?>">
                            <input type="text" name="idTramiteAct" id="idTramiteAct" class='d-none'>
                            <div class="form-group">
                                <textarea name="descTramite" id="descTramite" cols="30" rows="7" class='form-control'></textarea>
                            </div>
                            <div id="conRequerimeintos">
                            </div>
                            <!-- <div class="text-center">
                                <button type="button" class="btn btn-success" id="addRequerimientoTra">Agregar Requerimiento</button>
                            </div> -->
                            <hr>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Actualizar">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/crud_tramite.js"></script>
</body>
</html>