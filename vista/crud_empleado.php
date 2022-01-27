<?php
    include_once('header_empleado.php');
?>
    <main class="container border rounded shadow-lg p-2" style='min-height: 70vh;'>
        <h1 class="text-primary text-center">Empleados</h1>
        <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Agregar personal</button>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaUsuario" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr class="">
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Teléfono</th>
                        <th>Género</th>
                        <th>Estado</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MODAL PARA EDITAR PERSONAL  -->
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content bg-success text-dark">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Editar personal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body bg-white">
                        <form id='formEditPersonal'>
                            <input type="text" name="idEditPersonal" id="idEditPersonal" class='d-none'>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" name="editNombre" placeholder = "Escriba su nombre" id="editNombre" class='form-control' required autocomplete="off">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="editApellido" placeholder = "Escriba sus apellidos" id="editApellido" class='form-control' required autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="">Cargo</label>
                                    <select name="editCargo" id="editCargo" class="form-control" required>
                                        <option value="">Ninguno</option>
                                        <option value="Gerente General">Gerente General</option>
                                        <option value="Gerente Administrativo">Gerente Administrativo</option>
                                        <option value="Gerente Operativo">Gerente Operativo</option>
                                        <option value="Supervisora Contable ">Supervisora Contable </option>
                                        <option value="Cajero ">Cajero </option>
                                        <option value="Gestor Aduanero">Gestor Aduanero</option>
                                        <option value="Operador De Sistemas">Operador De Sistemas</option>
                                    </select>
                                </div>
                                <!-- <div class="col-6 form-group d-none">
                                    <label for="">Carnet</label>
                                    <input type="text" name="editCarnet" id="editCarnet" class='form-control' required autocomplete="off">
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Género</label>
                                    <select name="editGenero" id="editGenero" class="form-control" required>
                                        <option value="">Ninguno</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Teléfono (Opcional) </label>
                                    <input type="text" name="editTelefono" placeholder = "Cambie su número" id="editTelefono" class='form-control' required autocomplete="off">
                                </div>
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
        <!-- MODAL PARA AGREGAR PERSONAL  -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white ">
                        <h4 class="modal-title">Crear personal</h4>
                        <button type="button" maxlength="30" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id='formAddPersonal' >
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" maxlength="30" name="addNombre" placeholder = "Nombre" id="addNombre"  
                                    class='form-control' required autocomplete="off">
                                    <small id="addNombre" class="form-text text-muted"></small>
                                   <!--  <a href="#" data-toggle="tooltip" title="Hooray!"></a> -->
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" maxlength="30" name="addApellido" placeholder = "Apellidos" id="addApellido" class='form-control' required autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Cargo</label>
                                    <select name="addCargo" id="addCargo" class="form-control" required>
                                        <option value="">Elija una opción</option>
                                        <option value="Gerente General">Gerente General</option>
                                        <option value="Gerente Administrativo">Gerente Administrativo</option>
                                        <option value="Gerente Operativo">Gerente Operativo</option>
                                        <option value="Supervisora Contable ">Supervisora Contable </option>
                                        <option value="Cajero ">Cajero </option>
                                        <option value="Gestor Aduanero">Gestor Aduanero</option>
                                        <option value="Operador De Sistemas">Operador De Sistemas</option>
                                    </select>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Carnet</label>
                                    <input type="text" maxlength="10" name="addCarnet" placeholder = "Carnet" id="addCarnet" class='form-control' required autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Género</label>
                                    <select name="addGenero" id="addGenero" class="form-control" required>
                                        <option value="">Ninguno</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Teléfono</label>
                                    <input type="text" maxlength="8"name="addTelefono" placeholder = "Teléfono" id="addTelefono" class='form-control' required autocomplete="off">
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Crear">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL PARA DAR DE BAJA PERSONAL-->
        <div class="modal fade" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title text-center">Cambiar estado del personal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formBajaPersona">
                            <input type="text" name="bajaPersona" id="bajaPersona" class="d-none">
                            <input type="text" id="estadobajaPersonaCambio" class="d-none">
                            <h5 id="idTextEstadoPersona"></h5>
                            <!-- <h5>Desea cambiar el estado de la : <strong id='bajaUANombre'>UA</strong>, desabilitara/habilara las tareas de los usuarios</h5> -->
                            <div class="text-center">
                                <input type="submit" id="btnSubmitChange" class="btn btn-primary" value="Cambiar">
                                <button type="button" class="btn border" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/crud_empleado.js"></script>
    <!-- <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script> -->
</body>
</html>