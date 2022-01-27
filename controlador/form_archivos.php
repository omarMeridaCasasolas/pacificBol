<?php
    //obtencion del archivo
    require_once("../model/model_archivo.php");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $archivo = new Archivo();
        $res = "No hay metodo"; 
        switch ($metodo) {
            // case 'solictarArchivosTramite':
            //     $idTramite = $_POST['idTramite'];
            //     $idCliente = $_POST['idCliente'];
            //     $res = $archivo->solictarArchivosTramite($idTramite,$idCliente);
            //     break;
            case 'solictarArchivosTramite':
                $idTramite = $_POST['idTramite'];
                $idCliente = $_POST['idCliente']; 
                $idTramiteCliente = $_POST['idTramiteCliente'];
                $listaIDSobrantes = $archivo->obtenerRequerimeintosSobrantes($idTramite,$idCliente,$idTramiteCliente);
                foreach ($listaIDSobrantes as $key => $value) {
                    $tmpArchivo = $value['idarchivo'];
                    $nombreArchivo = $value['direcion_archivo'];
                    $aux = $archivo->eliminarArchivo($tmpArchivo);
                    if (unlink($nombreArchivo)) {
                        // file was successfully deleted
                    } else {
                        // there was a problem deleting the file
                    }
                }
                $listaIDFaltantes = $archivo->obtenerRequerimeintosFaltantes($idTramiteCliente, $idTramite);
                foreach ($listaIDFaltantes as $key => $value) {
                    $idrequisito = $value['idrequisito'];
                    $nombreRequerimiento = $value['nombre_requerimiento'];
                    $aux = $archivo->insertarArchivo($idrequisito,$idTramite,$idCliente,$nombreRequerimiento,$idTramiteCliente);
                }
                $res = $archivo->solictarArchivosTramite($idTramite,$idCliente,$idTramiteCliente);
                break;

            case 'verarchivoes':
                $res = $archivo->verarchivoes();
                break;
            default:
                # code...
                break;
        }
        $archivo->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>