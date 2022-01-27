<?php
    include_once('header_empleado.php');
?>
    <main class="container border bg-light rounded shadow-lg p-3" style='min-height: 70vh;'>
        <h1 class="text-primary text-center my-3">Publicaciones</h1>
        <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Crear publicacion</button>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaPublicacion" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr class="">
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Archivo</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>

    <!-- MODAL PARA CREAR PUBLICACION  -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Crear publicación</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formAddPublicacion" enctype="multipart/form-data">
                            <input type="text" name="idPersonalAct" id="idPersonalAct" class='d-none' value="<?php echo $_SESSION['idPersonal']; ?>">
                            <div class="form-group">
                                <label for="">Titulo:</label>
                                <input type="text"  id="addNombreTitulo" name="addNombreTitulo" placeholder = "Escriba un título" class="form-control"  required autocomplete="off" title="Solo letras y vocales">
                            </div>
                            <textarea name="descPublicacion" placeholder = "Describa la publicación" id="descPublicacion" cols="30" rows="7" required class='form-control'></textarea>
                            <div class="form-group">
                                <label for="">Ingrese un Archivo</label>
                                <input type="file" name="myFile" id="myFile" class='form-control'>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Crear">
                                <button type="button" class="btn border" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- MODAL PARA EDITAR PUBLICACION  -->
        <div class="modal fade" id="myModal4">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Editar publicación</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formEditPublicacion">
                            <input type="text" name="idEditPublicacion" id="idEditPublicacion" class='d-none'>
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" name="editPublicacionTit" placeholder = "Editar título" id="editPublicacionTit" required  class='form-control'>
                            </div>
                            <h6>Descripcion</h6>
                            <textarea required name="desEditPublicacion" placeholder = "Edite la descripción" id="desEditPublicacion" cols="30" rows="7" class='form-control'></textarea>
                            <div class="form-group">
                                <label for="">Archivo</label>
                                <input type="file" name="myFileEdit" id="myFileEdit" class='form-control'>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Actualizar">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <!-- ELIMINAR PUBLICION -->
        <div class="modal fade" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Eliminar publicación</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formDeletPublicacion">
                            <input type="text" name="delIdPublicacion" id="delIdPublicacion" class='d-none'> 
                            <h6>Esta seguro de eliminar la publicación<strong id=""><strong></h6>
                            <div class="text-center">
                                <input type="submit" class="btn btn-warning" value="Eliminar">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>    
                    
                    </div>
                    
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/crud_publicaciones.js"></script>
</body>
</html>