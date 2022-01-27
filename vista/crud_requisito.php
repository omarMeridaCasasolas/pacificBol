<?php
    include_once('header_empleado.php');
?>
    <main class="container border rounded shadow-lg p-2" style='min-height: 70vh;'>
        <h1 class="text-primary text-center my-3">Requisitos</h1>
        <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Agregar requisito</button>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaRequisito" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Enlace</th>
                        <th>Fecha</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MODAL PARA EDITAR REQUERIMIENTO  -->
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white ">
                        <h4 class="modal-title">Editar requisito</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id='formEditarRequerimiento' enctype="multipart/form-data">
                            <!-- <h5 class='text-center' >Documento para <span id='verNombreTramite'></span></h5> -->
                            <input type="text" name="idRequerimientoEdit" id="idRequerimientoEdit" class='d-none'>
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" name="editTituloReq" id="editTituloReq" class='form-control' required>
                            </div>
                            <h6>Descripcion del requisito</h6>
                            <textarea name="editDescReq" id="editDescReq" cols="30" rows="7" class='form-control' required></textarea>
                            <a href="#" target="_blank" rel="noopener noreferrer" class='my-3' id="archivoAnterior">Documento anterior</a>
                            <hr>
                            <div class="form-group">
                                <label for="">Subir nuevo documento</label>
                                <input type="file" name="editFileReq" id="editFileReq" accept='application/pdf' class='form-control' required>
                            </div>
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


        <!-- MODAL PARA AGREGAR REQUERIMIENTO  -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Crear requisito</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id='formAddRequerimiento' enctype="multipart/form-data">
                            <!-- <h5 class='text-center' >Documento para <span id='verNombreTramite'></span></h5> -->
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" name="addTituloReq" placeholder = "Escriba un Título" id="addTituloReq" class='form-control' required>
                            </div>
                            <h6>Decripción del requisito</h6>
                            <textarea name="descTramite" placeholder = "Describa el documento" id="descTramite" cols="30" rows="7" class='form-control' required></textarea>
                            <div class="form-group">
                                <label for="">Documento</label>
                                <input type="file" name="addFileReq" id="addFileReq" accept='application/pdf' class='form-control' required>
                            </div>
                            <hr>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Crear requisito">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/crud_requisito.js"></script>
</body>
</html>