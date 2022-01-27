<?php
    include_once('header_cliente.php');
?>
<body>
    <main class="container border">
        <h1 class="text-primary text-center">Trámite</h1>
        <button class="btn btn-success my-3" data-toggle="modal" data-target="#myModal">Agregar solicitud</button>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Usuario</button> -->
        <div class="table-responsive">
            <table id="tablaSolicitud" class="table bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Exportación</th>
                        <th>Importación</th>
                        <th>Evaluacion</th>
                        <th>Opc</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MODAL PARA AGRESAR SOLICITUD -->
    <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Nueva Solicitud</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formAddSolicitud" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Tipo de solicitud</label>
                                <select name="addTipoSolicitud" id="addTipoSolicitud" class='form-control'>
                                    <option value="">Ninguno</option>
                                    <option value="1">Exportacion</option>
                                    <option value="2">Importar</option>
                                    <option value="3">Importar/Exportacion</option>
                                </select>
                            </div>
                            <div class="form-group d-none" id="conImportacion">
                                <label for="">Pais de importacion</label>
                                <select name="idImportacion" id="idImportacion" class='form-control' required>
                                    <option value =""> Ninguno </option>
                                    <option value ="Afganistán"> Afganistán </option>
                                    <option value ="Albania"> Albania </option>
                                    <option value ="Alemania"> Alemania </option>
                                    <option value ="Andorra"> Andorra </option>
                                    <option value ="Angola"> Angola </option>
                                    <option value ="Antigua y Barbuda"> Antigua y Barbuda </option>
                                    <option value ="Arab Saudita"> Arabia Saudita </option>
                                    <option value ="Argelia"> Argelia </option>
                                    <option value ="Argentina"> Argentina </option>
                                    <option value ="Armenia"> Armenia </option>
                                    <option value ="Australia">  Australia </option>
                                    <option value ="Austria"> Austria </option>
                                    <option value ="Azerbaiyán"> Azerbaiyán </option>
                                    <option value ="Bahamas"> Bahamas </option>
                                    <option value ="Bangladés"> Bangladés </option>
                                    <option value ="Barbados"> Barbados </option>
                                    <option value ="Bareín"> Baréin </option>
                                    <option value ="Bélgica"> Bélgica </option>
                                    <option value ="Belice"> Belice </option>
                                    <option value ="Benin"> Benín </option>
                                    <option value ="Bielorrusia"> Bielorrusia </option>
                                    <option value ="Birmania"> Birmania </option>
                                    <option value ="Bolivia"> Bolivia </option>
                                    <option value ="Bosnia y Herzegovnia"> Bosnia y Herzegovina </option>
                                    <option value ="Botsuana"> Botsuana </option>
                                    <option value ="Brasil"> Brasil </option>
                                    <option value ="Brunéi"> Brunéi </option>
                                    <option value ="Bulgaria"> Bulgaria </option>
                                    <option value ="Burkina"> Burkina </option>
                                    <option value ="Burundi"> Burundi </option>
                                    <option value ="Bután"> Bután </option>
                                    <option value ="Cabo Verde"> Cabo Verde </option>
                                    <option value ="Camboya"> Camboya </option>
                                    <option value ="Camerún"> Camerún </option>
                                    <option value ="Canadá"> Canadá </option>
                                    <option value ="Catar"> Catar </option>
                                    <option value ="Chad"> Chad </option>
                                    <option value ="Chile"> Chile </option>
                                    <option value ="China"> China </option>
                                    <option value ="Chipre"> Chipre </option>
                                    <option value ="Ciudad del Vaticano"> Ciudad del Vaticano </option>
                                    <option value ="Colombia"> Colombia </option>
                                    <option value ="Comoras"> Comoras </option>
                                    <option value ="Corea del Norte"> Corea del Norte </option>
                                    <option value ="Corea del sur"> Corea del Sur </option>
                                    <option value ="Costa de Marfil"> Costa de Marfil </option>
                                    <option value ="Costa Rica"> Costa Rica </option>
                                    <option value ="Croacia"> Croacia </option>
                                    <option value ="Cuba"> Cuba </option>
                                    <option value ="Dinamarca"> Dinamarca </option>
                                    <option value ="Dominica"> Dominica </option>
                                    <option value ="Ecuador"> Ecuador </option>
                                    <option value ="Eqipto"> Egipto </option>
                                    <option value ="El Salvador"> El Salvador </option>
                                    <option value ="Emiratos Arabes Unidos"> Emiratos Árabes Unidos </option>
                                    <option value ="Eritrea"> Eritrea </option>
                                    <option value ="Eslovaquia"> Eslovaquia </option>
                                    <option value ="Eslovenia"> Eslovenia </option>
                                    <option value ="España"> España </option>
                                    <option value ="Estados Unidos"> Estados Unidos </option>
                                    <option value ="Estonia">  Estonia </option>
                                    <option value ="Etiopía"> Etiopía </option>
                                    <option value ="Finç"> Finlandia </option>
                                    <option value ="Fiyi"> Fiyi </option>
                                    <option value ="Francia"> Francia </option>
                                    <option value ="Gabón"> Gabón </option>
                                    <option value ="Lituania"> Lituania </option>
                                    <option value ="Luxemburgo"> Luxemburgo </option>
                                    <option value ="Macedonia del Norte"> Macedonia del Norte </option>
                                    <option value ="Madagascar"> Madagascar </option>
                                    <option value ="Malasia"> Malasia </option>
                                    <option value ="Malaui"> Malaui </option>
                                    <option value ="Maldivas"> Maldivas </option>
                                    <option value ="Malí"> Malí </option>
                                    <option value ="Malta"> Malta </option>
                                    <option value ="Marrueco"> Marruecos </option>
                                    <option value ="Mauricio"> Mauricio </option>
                                    <option value ="Mauritania"> Mauritania </option>
                                    <option value ="México"> México </option>
                                    <option value ="Micronesia"> Micronesia </option>
                                    <option value ="Moldavia"> Moldavia </option>
                                    <option value ="Mónaco"> Mónaco </option>
                                    <option value ="Mongolia"> Mongolia </option>
                                    <option value ="Montenegro"> Montenegro </option>
                                    <option value ="Mozambique"> Mozambique </option>
                                    <option value ="Namibia"> Namibia </option>
                                    <option value ="Nauru"> Nauru </option>
                                    <option value ="Nepal"> Nepal </option>
                                    <option value ="Nicaragua"> Nicaragua </option>
                                    <option value ="Níger"> Níger </option>
                                    <option value ="Nigeria"> Nigeria </option>
                                    <option value ="Noruega"> Noruega </option>
                                    <option value ="Nueva Zelanda"> Nueva Zelanda </option>
                                    <option value ="Omán"> Omán </option>
                                    <option value ="Países Bajos"> Países Bajos </option>
                                    <option value ="Pakistán"> Pakistán </option>
                                    <option value ="Palaos"> Palaos </option>
                                    <option value ="Panamá"> Panamá </option>
                                    <option value ="Papúa Nueva Guinea"> Papúa Nueva Guinea </option>
                                    <option value ="Paraguay"> Paraguay </option>
                                    <option value ="Perú"> Perú </option>
                                    <option value ="Polonia"> Polonia </option>
                                    <option value ="Portugal"> Portugal </option>
                                    <option value ="Reino Unido"> Reino Unido </option>
                                    <option value ="República Centroafricana"> República Centroafricana </option>
                                    <option value ="Reública Checa"> República Checa </option>
                                    <option value ="República del Congo"> República del Congo </option>
                                    <option value ="República Democrática del Congo"> República Democrática del Congo </option>
                                    <option value ="Repúbica Dominicana"> República Dominicana </option>
                                    <option value ="Ruanda"> Ruanda </option>
                                    <option value ="Rumanía"> Rumanía </option>
                                    <option value ="Rusia"> Rusia </option>
                                    <option value ="Samoa"> Samoa </option>
                                    <option value ="San Cristóbal y Nieves"> San Cristóbal y Nieves </option>
                                    <option value ="San Marino"> San Marino </option>
                                    <option value ="San Vicente y las Granadinas"> San Vicente y las Granadinas </option>
                                    <option value ="Santa Lucía"> Santa Lucía </option>
                                    <option value ="Santo Tomé y Príncipe"> Santo Tomé y Príncipe </option>
                                    <option value ="Senegal"> Senegal </option>
                                    <option value ="Serbia"> Serbia </option>
                                    <option value ="Seychelles"> Seychelles </option>
                                    <option value ="Siera Leona"> Sierra Leona </option>
                                    <option value ="Singapur"> Singapur </option>
                                    <option value ="Siria"> Siria </option>
                                    <option value ="Somalia"> Somalia </option>
                                    <option value ="Sri Lanka"> Sri Lanka </option>
                                    <option value ="Suazilandia"> Suazilandia </option>
                                    <option value ="Sudáfrica"> Sudáfrica </option>
                                    <option value ="Sudán"> Sudán </option>
                                    <option value ="Sudán del Sur"> Sudán del Sur </option>
                                    <option value ="Suecia"> Suecia </option>
                                    <option value ="Suiza"> Suiza </option>
                                    <option value ="Surinam"> Surinam </option>
                                    <option value ="Tailandia"> Tailandia </option>
                                    <option value ="Tanzania"> Tanzania </option>
                                    <option value ="Tayikistán"> Tayikistán </option>
                                    <option value ="Timor Oriental"> Timor Oriental </option>
                                    <option value ="Togo"> Togo </option>
                                    <option value ="Tonga"> Tonga </option>
                                    <option value ="Trinida y Tobago"> Trinidad y Tobago </option>
                                    <option value ="Túnez"> Túnez </option>
                                    <option value ="Turkmenistán"> Turkmenistán </option>
                                    <option value ="Turquía"> Turquía </option>
                                    <option value ="Tuvalu"> Tuvalu </option>
                                    <option value ="Ucrania"> Ucrania </option>
                                    <option value ="Uganda"> Uganda </option>
                                    <option value ="Uruguay"> Uruguay </option>
                                    <option value ="Uzbekistán"> Uzbekistán </option>
                                    <option value ="Vanuatu"> Vanuatu </option>
                                    <option value ="Venezuela"> Venezuela </option>
                                    <option value ="Vietnam"> Vietnam </option>
                                    <option value ="Yemen"> Yemen </option>
                                    <option value ="Yibuti"> Yibuti </option>
                                    <option value ="Zambia"> Zambia </option>
                                    <option value ="Zimbabue"> Zimbabue </option>
                                </select>
                            </div>
                            <div class="form-group d-none" id="conExportacion">
                                <label for="">Pais de exportacion</label>
                                <select name="idExportacion" id="idExportacion" class='form-control' required>
                                    <option value =""> Ninguno </option>
                                    <option value ="Afganistán"> Afganistán </option>
                                    <option value ="Albania"> Albania </option>
                                    <option value ="Alemania"> Alemania </option>
                                    <option value =" Andorra"> Andorra </option>
                                    <option value =" Angola"> Angola </option>
                                    <option value ="Antigua y Barbuda"> Antigua y Barbuda </option>
                                    <option value ="Arab Saudita"> Arabia Saudita </option>
                                    <option value ="Argelia"> Argelia </option>
                                    <option value ="Argentina"> Argentina </option>
                                    <option value ="Armenia"> Armenia </option>
                                    <option value ="Australia">  Australia </option>
                                    <option value =" Austria"> Austria </option>
                                    <option value ="Azerbaiyán"> Azerbaiyán </option>
                                    <option value ="Bahamas"> Bahamas </option>
                                    <option value ="Bangladés"> Bangladés </option>
                                    <option value ="Barbados"> Barbados </option>
                                    <option value ="Bareín"> Baréin </option>
                                    <option value ="Bélgica"> Bélgica </option>
                                    <option value ="Belice"> Belice </option>
                                    <option value ="Benin"> Benín </option>
                                    <option value ="Bielorrusia"> Bielorrusia </option>
                                    <option value ="Birmania"> Birmania </option>
                                    <option value ="Bolivia"> Bolivia </option>
                                    <option value ="Bosnia y Herzegovnia"> Bosnia y Herzegovina </option>
                                    <option value ="Botsuana"> Botsuana </option>
                                    <option value ="Brasil"> Brasil </option>
                                    <option value ="Brunéi"> Brunéi </option>
                                    <option value ="Bulgaria"> Bulgaria </option>
                                    <option value ="Burkina"> Burkina </option>
                                    <option value ="Burundi"> Burundi </option>
                                    <option value ="Bután"> Bután </option>
                                    <option value ="Cabo Verde"> Cabo Verde </option>
                                    <option value ="Camboya"> Camboya </option>
                                    <option value ="Camerún"> Camerún </option>
                                    <option value ="Canadá"> Canadá </option>
                                    <option value ="Catar"> Catar </option>
                                    <option value ="Chad"> Chad </option>
                                    <option value ="Chile"> Chile </option>
                                    <option value ="China"> China </option>
                                    <option value ="Chipre"> Chipre </option>
                                    <option value ="Ciudad del Vaticano"> Ciudad del Vaticano </option>
                                    <option value ="Colombia"> Colombia </option>
                                    <option value ="Comoras"> Comoras </option>
                                    <option value ="Corea del Norte"> Corea del Norte </option>
                                    <option value ="Corea del sur"> Corea del Sur </option>
                                    <option value ="Costa de Marfil"> Costa de Marfil </option>
                                    <option value ="Costa Rica"> Costa Rica </option>
                                    <option value ="Croacia"> Croacia </option>
                                    <option value ="Cuba"> Cuba </option>
                                    <option value ="Dinamarca"> Dinamarca </option>
                                    <option value ="Dominica"> Dominica </option>
                                    <option value ="Ecuador"> Ecuador </option>
                                    <option value ="Eqipto"> Egipto </option>
                                    <option value ="El Salvador"> El Salvador </option>
                                    <option value ="Emiratos Arabes Unidos"> Emiratos Árabes Unidos </option>
                                    <option value ="Eritrea"> Eritrea </option>
                                    <option value ="Eslovaquia"> Eslovaquia </option>
                                    <option value ="Eslovenia"> Eslovenia </option>
                                    <option value ="España"> España </option>
                                    <option value ="Estados Unidos"> Estados Unidos </option>
                                    <option value ="Estonia">  Estonia </option>
                                    <option value ="Etiopía"> Etiopía </option>
                                    <option value ="Finç"> Finlandia </option>
                                    <option value ="Fiyi"> Fiyi </option>
                                    <option value ="Francia"> Francia </option>
                                    <option value ="Gabón"> Gabón </option>
                                    <option value ="Lituania"> Lituania </option>
                                    <option value ="Luxemburgo"> Luxemburgo </option>
                                    <option value ="Macedonia del Norte"> Macedonia del Norte </option>
                                    <option value ="Madagascar"> Madagascar </option>
                                    <option value ="Malasia"> Malasia </option>
                                    <option value ="Malaui"> Malaui </option>
                                    <option value ="Maldivas"> Maldivas </option>
                                    <option value ="Malí"> Malí </option>
                                    <option value ="Malta"> Malta </option>
                                    <option value ="Marrueco"> Marruecos </option>
                                    <option value ="Mauricio"> Mauricio </option>
                                    <option value ="Mauritania"> Mauritania </option>
                                    <option value ="México"> México </option>
                                    <option value ="Micronesia"> Micronesia </option>
                                    <option value ="Moldavia"> Moldavia </option>
                                    <option value ="Mónaco"> Mónaco </option>
                                    <option value ="Mongolia"> Mongolia </option>
                                    <option value ="Montenegro"> Montenegro </option>
                                    <option value ="Mozambique"> Mozambique </option>
                                    <option value ="Namibia"> Namibia </option>
                                    <option value ="Nauru"> Nauru </option>
                                    <option value ="Nepal"> Nepal </option>
                                    <option value ="Nicaragua"> Nicaragua </option>
                                    <option value ="Níger"> Níger </option>
                                    <option value ="Nigeria"> Nigeria </option>
                                    <option value ="Noruega"> Noruega </option>
                                    <option value ="Nueva Zelanda"> Nueva Zelanda </option>
                                    <option value ="Omán"> Omán </option>
                                    <option value ="Países Bajos"> Países Bajos </option>
                                    <option value ="Pakistán"> Pakistán </option>
                                    <option value ="Palaos"> Palaos </option>
                                    <option value ="Panamá"> Panamá </option>
                                    <option value ="Papúa Nueva Guinea"> Papúa Nueva Guinea </option>
                                    <option value ="Paraguay"> Paraguay </option>
                                    <option value ="Perú"> Perú </option>
                                    <option value ="Polonia"> Polonia </option>
                                    <option value ="Portugal"> Portugal </option>
                                    <option value ="Reino Unido"> Reino Unido </option>
                                    <option value ="República Centroafricana"> República Centroafricana </option>
                                    <option value ="Reública Checa"> República Checa </option>
                                    <option value ="República del Congo"> República del Congo </option>
                                    <option value ="República Democrática del Congo"> República Democrática del Congo </option>
                                    <option value ="Repúbica Dominicana"> República Dominicana </option>
                                    <option value ="Ruanda"> Ruanda </option>
                                    <option value ="Rumanía"> Rumanía </option>
                                    <option value ="Rusia"> Rusia </option>
                                    <option value ="Samoa"> Samoa </option>
                                    <option value ="San Cristóbal y Nieves"> San Cristóbal y Nieves </option>
                                    <option value ="San Marino"> San Marino </option>
                                    <option value ="San Vicente y las Granadinas"> San Vicente y las Granadinas </option>
                                    <option value ="Santa Lucía"> Santa Lucía </option>
                                    <option value ="Santo Tomé y Príncipe"> Santo Tomé y Príncipe </option>
                                    <option value ="Senegal"> Senegal </option>
                                    <option value ="Serbia"> Serbia </option>
                                    <option value ="Seychelles"> Seychelles </option>
                                    <option value ="Siera Leona"> Sierra Leona </option>
                                    <option value ="Singapur"> Singapur </option>
                                    <option value ="Siria"> Siria </option>
                                    <option value ="Somalia"> Somalia </option>
                                    <option value ="Sri Lanka"> Sri Lanka </option>
                                    <option value ="Suazilandia"> Suazilandia </option>
                                    <option value ="Sudáfrica"> Sudáfrica </option>
                                    <option value ="Sudán"> Sudán </option>
                                    <option value ="Sudán del Sur"> Sudán del Sur </option>
                                    <option value ="Suecia"> Suecia </option>
                                    <option value ="Suiza"> Suiza </option>
                                    <option value ="Surinam"> Surinam </option>
                                    <option value ="Tailandia"> Tailandia </option>
                                    <option value ="Tanzania"> Tanzania </option>
                                    <option value ="Tayikistán"> Tayikistán </option>
                                    <option value ="Timor Oriental"> Timor Oriental </option>
                                    <option value ="Togo"> Togo </option>
                                    <option value ="Tonga"> Tonga </option>
                                    <option value ="Trinida y Tobago"> Trinidad y Tobago </option>
                                    <option value ="Túnez"> Túnez </option>
                                    <option value ="Turkmenistán"> Turkmenistán </option>
                                    <option value ="Turquía"> Turquía </option>
                                    <option value ="Tuvalu"> Tuvalu </option>
                                    <option value ="Ucrania"> Ucrania </option>
                                    <option value ="Uganda"> Uganda </option>
                                    <option value ="Uruguay"> Uruguay </option>
                                    <option value ="Uzbekistán"> Uzbekistán </option>
                                    <option value ="Vanuatu"> Vanuatu </option>
                                    <option value ="Venezuela"> Venezuela </option>
                                    <option value ="Vietnam"> Vietnam </option>
                                    <option value ="Yemen"> Yemen </option>
                                    <option value ="Yibuti"> Yibuti </option>
                                    <option value ="Zambia"> Zambia </option>
                                    <option value ="Zimbabue"> Zimbabue </option>
                                </select>
                            </div>
                            <div id="contFiles">

                                
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Solicitar">
                                <button type="button" class="btn border" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- MODAL PARA EDITAR Requerimientos -->
        <div class="modal fade" id="myModal4">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Ver detalle de requisito</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="formEvaluacionPedido" class='p-1'>
                            <span id='idClienteReq' class='d-none' ></span>
                            <span id='idTramiteReq' class='d-none' ></span>
                            <span id='idTramiteCliente' class='d-none' ></span>
                            <div class="row">
                                <div class="col-6">
                                    <h6>Tipo: <strong id='tipoDocumento'></strong></h6>
                                </div>
                                <div class="col-6">
                                    <h6>Fecha: <strong id='verFechaTramite'></strong></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Importacion</label>
                                    <select name="editPaisImportacion" id="editPaisImportacion" class="form-control changeSelect">
                                        <option value =""> Ninguno </option>
                                        <option value ="Afganistán"> Afganistán </option>
                                        <option value ="Albania"> Albania </option>
                                        <option value ="Alemania"> Alemania </option>
                                        <option value =" Andorra"> Andorra </option>
                                        <option value =" Angola"> Angola </option>
                                        <option value ="Antigua y Barbuda"> Antigua y Barbuda </option>
                                        <option value ="Arab Saudita"> Arabia Saudita </option>
                                        <option value ="Argelia"> Argelia </option>
                                        <option value ="Argentina"> Argentina </option>
                                        <option value ="Armenia"> Armenia </option>
                                        <option value ="Australia">  Australia </option>
                                        <option value =" Austria"> Austria </option>
                                        <option value ="Azerbaiyán"> Azerbaiyán </option>
                                        <option value ="Bahamas"> Bahamas </option>
                                        <option value ="Bangladés"> Bangladés </option>
                                        <option value ="Barbados"> Barbados </option>
                                        <option value ="Bareín"> Baréin </option>
                                        <option value ="Bélgica"> Bélgica </option>
                                        <option value ="Belice"> Belice </option>
                                        <option value ="Benin"> Benín </option>
                                        <option value ="Bielorrusia"> Bielorrusia </option>
                                        <option value ="Birmania"> Birmania </option>
                                        <option value ="Bolivia"> Bolivia </option>
                                        <option value ="Bosnia y Herzegovnia"> Bosnia y Herzegovina </option>
                                        <option value ="Botsuana"> Botsuana </option>
                                        <option value ="Brasil"> Brasil </option>
                                        <option value ="Brunéi"> Brunéi </option>
                                        <option value ="Bulgaria"> Bulgaria </option>
                                        <option value ="Burkina"> Burkina </option>
                                        <option value ="Burundi"> Burundi </option>
                                        <option value ="Bután"> Bután </option>
                                        <option value ="Cabo Verde"> Cabo Verde </option>
                                        <option value ="Camboya"> Camboya </option>
                                        <option value ="Camerún"> Camerún </option>
                                        <option value ="Canadá"> Canadá </option>
                                        <option value ="Catar"> Catar </option>
                                        <option value ="Chad"> Chad </option>
                                        <option value ="Chile"> Chile </option>
                                        <option value ="China"> China </option>
                                        <option value ="Chipre"> Chipre </option>
                                        <option value ="Ciudad del Vaticano"> Ciudad del Vaticano </option>
                                        <option value ="Colombia"> Colombia </option>
                                        <option value ="Comoras"> Comoras </option>
                                        <option value ="Corea del Norte"> Corea del Norte </option>
                                        <option value ="Corea del sur"> Corea del Sur </option>
                                        <option value ="Costa de Marfil"> Costa de Marfil </option>
                                        <option value ="Costa Rica"> Costa Rica </option>
                                        <option value ="Croacia"> Croacia </option>
                                        <option value ="Cuba"> Cuba </option>
                                        <option value ="Dinamarca"> Dinamarca </option>
                                        <option value ="Dominica"> Dominica </option>
                                        <option value ="Ecuador"> Ecuador </option>
                                        <option value ="Eqipto"> Egipto </option>
                                        <option value ="El Salvador"> El Salvador </option>
                                        <option value ="Emiratos Arabes Unidos"> Emiratos Árabes Unidos </option>
                                        <option value ="Eritrea"> Eritrea </option>
                                        <option value ="Eslovaquia"> Eslovaquia </option>
                                        <option value ="Eslovenia"> Eslovenia </option>
                                        <option value ="España"> España </option>
                                        <option value ="Estados Unidos"> Estados Unidos </option>
                                        <option value ="Estonia">  Estonia </option>
                                        <option value ="Etiopía"> Etiopía </option>
                                        <option value ="Finç"> Finlandia </option>
                                        <option value ="Fiyi"> Fiyi </option>
                                        <option value ="Francia"> Francia </option>
                                        <option value ="Gabón"> Gabón </option>
                                        <option value ="Lituania"> Lituania </option>
                                        <option value ="Luxemburgo"> Luxemburgo </option>
                                        <option value ="Macedonia del Norte"> Macedonia del Norte </option>
                                        <option value ="Madagascar"> Madagascar </option>
                                        <option value ="Malasia"> Malasia </option>
                                        <option value ="Malaui"> Malaui </option>
                                        <option value ="Maldivas"> Maldivas </option>
                                        <option value ="Malí"> Malí </option>
                                        <option value ="Malta"> Malta </option>
                                        <option value ="Marrueco"> Marruecos </option>
                                        <option value ="Mauricio"> Mauricio </option>
                                        <option value ="Mauritania"> Mauritania </option>
                                        <option value ="México"> México </option>
                                        <option value ="Micronesia"> Micronesia </option>
                                        <option value ="Moldavia"> Moldavia </option>
                                        <option value ="Mónaco"> Mónaco </option>
                                        <option value ="Mongolia"> Mongolia </option>
                                        <option value ="Montenegro"> Montenegro </option>
                                        <option value ="Mozambique"> Mozambique </option>
                                        <option value ="Namibia"> Namibia </option>
                                        <option value ="Nauru"> Nauru </option>
                                        <option value ="Nepal"> Nepal </option>
                                        <option value ="Nicaragua"> Nicaragua </option>
                                        <option value ="Níger"> Níger </option>
                                        <option value ="Nigeria"> Nigeria </option>
                                        <option value ="Noruega"> Noruega </option>
                                        <option value ="Nueva Zelanda"> Nueva Zelanda </option>
                                        <option value ="Omán"> Omán </option>
                                        <option value ="Países Bajos"> Países Bajos </option>
                                        <option value ="Pakistán"> Pakistán </option>
                                        <option value ="Palaos"> Palaos </option>
                                        <option value ="Panamá"> Panamá </option>
                                        <option value ="Papúa Nueva Guinea"> Papúa Nueva Guinea </option>
                                        <option value ="Paraguay"> Paraguay </option>
                                        <option value ="Perú"> Perú </option>
                                        <option value ="Polonia"> Polonia </option>
                                        <option value ="Portugal"> Portugal </option>
                                        <option value ="Reino Unido"> Reino Unido </option>
                                        <option value ="República Centroafricana"> República Centroafricana </option>
                                        <option value ="Reública Checa"> República Checa </option>
                                        <option value ="República del Congo"> República del Congo </option>
                                        <option value ="República Democrática del Congo"> República Democrática del Congo </option>
                                        <option value ="Repúbica Dominicana"> República Dominicana </option>
                                        <option value ="Ruanda"> Ruanda </option>
                                        <option value ="Rumanía"> Rumanía </option>
                                        <option value ="Rusia"> Rusia </option>
                                        <option value ="Samoa"> Samoa </option>
                                        <option value ="San Cristóbal y Nieves"> San Cristóbal y Nieves </option>
                                        <option value ="San Marino"> San Marino </option>
                                        <option value ="San Vicente y las Granadinas"> San Vicente y las Granadinas </option>
                                        <option value ="Santa Lucía"> Santa Lucía </option>
                                        <option value ="Santo Tomé y Príncipe"> Santo Tomé y Príncipe </option>
                                        <option value ="Senegal"> Senegal </option>
                                        <option value ="Serbia"> Serbia </option>
                                        <option value ="Seychelles"> Seychelles </option>
                                        <option value ="Siera Leona"> Sierra Leona </option>
                                        <option value ="Singapur"> Singapur </option>
                                        <option value ="Siria"> Siria </option>
                                        <option value ="Somalia"> Somalia </option>
                                        <option value ="Sri Lanka"> Sri Lanka </option>
                                        <option value ="Suazilandia"> Suazilandia </option>
                                        <option value ="Sudáfrica"> Sudáfrica </option>
                                        <option value ="Sudán"> Sudán </option>
                                        <option value ="Sudán del Sur"> Sudán del Sur </option>
                                        <option value ="Suecia"> Suecia </option>
                                        <option value ="Suiza"> Suiza </option>
                                        <option value ="Surinam"> Surinam </option>
                                        <option value ="Tailandia"> Tailandia </option>
                                        <option value ="Tanzania"> Tanzania </option>
                                        <option value ="Tayikistán"> Tayikistán </option>
                                        <option value ="Timor Oriental"> Timor Oriental </option>
                                        <option value ="Togo"> Togo </option>
                                        <option value ="Tonga"> Tonga </option>
                                        <option value ="Trinida y Tobago"> Trinidad y Tobago </option>
                                        <option value ="Túnez"> Túnez </option>
                                        <option value ="Turkmenistán"> Turkmenistán </option>
                                        <option value ="Turquía"> Turquía </option>
                                        <option value ="Tuvalu"> Tuvalu </option>
                                        <option value ="Ucrania"> Ucrania </option>
                                        <option value ="Uganda"> Uganda </option>
                                        <option value ="Uruguay"> Uruguay </option>
                                        <option value ="Uzbekistán"> Uzbekistán </option>
                                        <option value ="Vanuatu"> Vanuatu </option>
                                        <option value ="Venezuela"> Venezuela </option>
                                        <option value ="Vietnam"> Vietnam </option>
                                        <option value ="Yemen"> Yemen </option>
                                        <option value ="Yibuti"> Yibuti </option>
                                        <option value ="Zambia"> Zambia </option>
                                        <option value ="Zimbabue"> Zimbabue </option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Exportacion</label>
                                    <select name="editPaisExportacion" id="editPaisExportacion" class="form-control changeSelect">
                                        <option value =""> Ninguno </option>
                                        <option value ="Afganistán"> Afganistán </option>
                                        <option value ="Albania"> Albania </option>
                                        <option value ="Alemania"> Alemania </option>
                                        <option value =" Andorra"> Andorra </option>
                                        <option value =" Angola"> Angola </option>
                                        <option value ="Antigua y Barbuda"> Antigua y Barbuda </option>
                                        <option value ="Arab Saudita"> Arabia Saudita </option>
                                        <option value ="Argelia"> Argelia </option>
                                        <option value ="Argentina"> Argentina </option>
                                        <option value ="Armenia"> Armenia </option>
                                        <option value ="Australia">  Australia </option>
                                        <option value =" Austria"> Austria </option>
                                        <option value ="Azerbaiyán"> Azerbaiyán </option>
                                        <option value ="Bahamas"> Bahamas </option>
                                        <option value ="Bangladés"> Bangladés </option>
                                        <option value ="Barbados"> Barbados </option>
                                        <option value ="Bareín"> Baréin </option>
                                        <option value ="Bélgica"> Bélgica </option>
                                        <option value ="Belice"> Belice </option>
                                        <option value ="Benin"> Benín </option>
                                        <option value ="Bielorrusia"> Bielorrusia </option>
                                        <option value ="Birmania"> Birmania </option>
                                        <option value ="Bolivia"> Bolivia </option>
                                        <option value ="Bosnia y Herzegovnia"> Bosnia y Herzegovina </option>
                                        <option value ="Botsuana"> Botsuana </option>
                                        <option value ="Brasil"> Brasil </option>
                                        <option value ="Brunéi"> Brunéi </option>
                                        <option value ="Bulgaria"> Bulgaria </option>
                                        <option value ="Burkina"> Burkina </option>
                                        <option value ="Burundi"> Burundi </option>
                                        <option value ="Bután"> Bután </option>
                                        <option value ="Cabo Verde"> Cabo Verde </option>
                                        <option value ="Camboya"> Camboya </option>
                                        <option value ="Camerún"> Camerún </option>
                                        <option value ="Canadá"> Canadá </option>
                                        <option value ="Catar"> Catar </option>
                                        <option value ="Chad"> Chad </option>
                                        <option value ="Chile"> Chile </option>
                                        <option value ="China"> China </option>
                                        <option value ="Chipre"> Chipre </option>
                                        <option value ="Ciudad del Vaticano"> Ciudad del Vaticano </option>
                                        <option value ="Colombia"> Colombia </option>
                                        <option value ="Comoras"> Comoras </option>
                                        <option value ="Corea del Norte"> Corea del Norte </option>
                                        <option value ="Corea del sur"> Corea del Sur </option>
                                        <option value ="Costa de Marfil"> Costa de Marfil </option>
                                        <option value ="Costa Rica"> Costa Rica </option>
                                        <option value ="Croacia"> Croacia </option>
                                        <option value ="Cuba"> Cuba </option>
                                        <option value ="Dinamarca"> Dinamarca </option>
                                        <option value ="Dominica"> Dominica </option>
                                        <option value ="Ecuador"> Ecuador </option>
                                        <option value ="Eqipto"> Egipto </option>
                                        <option value ="El Salvador"> El Salvador </option>
                                        <option value ="Emiratos Arabes Unidos"> Emiratos Árabes Unidos </option>
                                        <option value ="Eritrea"> Eritrea </option>
                                        <option value ="Eslovaquia"> Eslovaquia </option>
                                        <option value ="Eslovenia"> Eslovenia </option>
                                        <option value ="España"> España </option>
                                        <option value ="Estados Unidos"> Estados Unidos </option>
                                        <option value ="Estonia">  Estonia </option>
                                        <option value ="Etiopía"> Etiopía </option>
                                        <option value ="Finç"> Finlandia </option>
                                        <option value ="Fiyi"> Fiyi </option>
                                        <option value ="Francia"> Francia </option>
                                        <option value ="Gabón"> Gabón </option>
                                        <option value ="Lituania"> Lituania </option>
                                        <option value ="Luxemburgo"> Luxemburgo </option>
                                        <option value ="Macedonia del Norte"> Macedonia del Norte </option>
                                        <option value ="Madagascar"> Madagascar </option>
                                        <option value ="Malasia"> Malasia </option>
                                        <option value ="Malaui"> Malaui </option>
                                        <option value ="Maldivas"> Maldivas </option>
                                        <option value ="Malí"> Malí </option>
                                        <option value ="Malta"> Malta </option>
                                        <option value ="Marrueco"> Marruecos </option>
                                        <option value ="Mauricio"> Mauricio </option>
                                        <option value ="Mauritania"> Mauritania </option>
                                        <option value ="México"> México </option>
                                        <option value ="Micronesia"> Micronesia </option>
                                        <option value ="Moldavia"> Moldavia </option>
                                        <option value ="Mónaco"> Mónaco </option>
                                        <option value ="Mongolia"> Mongolia </option>
                                        <option value ="Montenegro"> Montenegro </option>
                                        <option value ="Mozambique"> Mozambique </option>
                                        <option value ="Namibia"> Namibia </option>
                                        <option value ="Nauru"> Nauru </option>
                                        <option value ="Nepal"> Nepal </option>
                                        <option value ="Nicaragua"> Nicaragua </option>
                                        <option value ="Níger"> Níger </option>
                                        <option value ="Nigeria"> Nigeria </option>
                                        <option value ="Noruega"> Noruega </option>
                                        <option value ="Nueva Zelanda"> Nueva Zelanda </option>
                                        <option value ="Omán"> Omán </option>
                                        <option value ="Países Bajos"> Países Bajos </option>
                                        <option value ="Pakistán"> Pakistán </option>
                                        <option value ="Palaos"> Palaos </option>
                                        <option value ="Panamá"> Panamá </option>
                                        <option value ="Papúa Nueva Guinea"> Papúa Nueva Guinea </option>
                                        <option value ="Paraguay"> Paraguay </option>
                                        <option value ="Perú"> Perú </option>
                                        <option value ="Polonia"> Polonia </option>
                                        <option value ="Portugal"> Portugal </option>
                                        <option value ="Reino Unido"> Reino Unido </option>
                                        <option value ="República Centroafricana"> República Centroafricana </option>
                                        <option value ="Reública Checa"> República Checa </option>
                                        <option value ="República del Congo"> República del Congo </option>
                                        <option value ="República Democrática del Congo"> República Democrática del Congo </option>
                                        <option value ="Repúbica Dominicana"> República Dominicana </option>
                                        <option value ="Ruanda"> Ruanda </option>
                                        <option value ="Rumanía"> Rumanía </option>
                                        <option value ="Rusia"> Rusia </option>
                                        <option value ="Samoa"> Samoa </option>
                                        <option value ="San Cristóbal y Nieves"> San Cristóbal y Nieves </option>
                                        <option value ="San Marino"> San Marino </option>
                                        <option value ="San Vicente y las Granadinas"> San Vicente y las Granadinas </option>
                                        <option value ="Santa Lucía"> Santa Lucía </option>
                                        <option value ="Santo Tomé y Príncipe"> Santo Tomé y Príncipe </option>
                                        <option value ="Senegal"> Senegal </option>
                                        <option value ="Serbia"> Serbia </option>
                                        <option value ="Seychelles"> Seychelles </option>
                                        <option value ="Siera Leona"> Sierra Leona </option>
                                        <option value ="Singapur"> Singapur </option>
                                        <option value ="Siria"> Siria </option>
                                        <option value ="Somalia"> Somalia </option>
                                        <option value ="Sri Lanka"> Sri Lanka </option>
                                        <option value ="Suazilandia"> Suazilandia </option>
                                        <option value ="Sudáfrica"> Sudáfrica </option>
                                        <option value ="Sudán"> Sudán </option>
                                        <option value ="Sudán del Sur"> Sudán del Sur </option>
                                        <option value ="Suecia"> Suecia </option>
                                        <option value ="Suiza"> Suiza </option>
                                        <option value ="Surinam"> Surinam </option>
                                        <option value ="Tailandia"> Tailandia </option>
                                        <option value ="Tanzania"> Tanzania </option>
                                        <option value ="Tayikistán"> Tayikistán </option>
                                        <option value ="Timor Oriental"> Timor Oriental </option>
                                        <option value ="Togo"> Togo </option>
                                        <option value ="Tonga"> Tonga </option>
                                        <option value ="Trinida y Tobago"> Trinidad y Tobago </option>
                                        <option value ="Túnez"> Túnez </option>
                                        <option value ="Turkmenistán"> Turkmenistán </option>
                                        <option value ="Turquía"> Turquía </option>
                                        <option value ="Tuvalu"> Tuvalu </option>
                                        <option value ="Ucrania"> Ucrania </option>
                                        <option value ="Uganda"> Uganda </option>
                                        <option value ="Uruguay"> Uruguay </option>
                                        <option value ="Uzbekistán"> Uzbekistán </option>
                                        <option value ="Vanuatu"> Vanuatu </option>
                                        <option value ="Venezuela"> Venezuela </option>
                                        <option value ="Vietnam"> Vietnam </option>
                                        <option value ="Yemen"> Yemen </option>
                                        <option value ="Yibuti"> Yibuti </option>
                                        <option value ="Zambia"> Zambia </option>
                                        <option value ="Zimbabue"> Zimbabue </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h6>Descripción del trámite: <span id='detalleDescripcion'></span></h6>
                            <p><strong>Observación: </strong><span id="desEvaluacion"></span></p>
                            <h6>Lista de archivos presentados</h6>
                            <div id="conRequerimeintos" class="p-2"></div>
                            <div class='text-center '>
                                <input type="submit" class='btn btn-success' id='btnAceptarP' value="Actualizar" disabled>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="src/home_cliente.js"></script>
</body>
</html>