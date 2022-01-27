<?php
    //obtencion del archivo
    require_once("../model/model_tramite.php");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $tramite = new Tramite();
        $res = "No hay metodo";
        switch ($metodo) {
            case 'relacionarTramiteRequerimientos':
                $idTramite = $_REQUEST['idTramite'];
                $descripcion = $_REQUEST['descripcion'];
                // $listaIDReq  = json_decode($_REQUEST['listaIDReq']);
                $aux = $tramite->eliminarAnterioresReq($idTramite);
                $aux = $tramite->eliminarAnterioresReq($idTramite);
                // var_dump($_REQUEST['listaIDReq']);
                $aux2 = "1";
                if(!empty($_REQUEST['listaIDReq'])){
                    foreach ($_REQUEST['listaIDReq'] as $key => $value) {
                        $aux2 = $tramite->relacionarTramiteRequerimientos($idTramite,$value);
                    }
                }
                // foreach ($_REQUEST['listaIDReq'] as $key => $value) {
                //     $aux2 = $tramite->relacionarTramiteRequerimientos($idTramite,$value);
                // }
                $aux3 = $tramite->actualizarTramite($idTramite,$descripcion, date("Y-m-d H:i:s"));
                $res = $aux." ".$aux2." ".$aux3;
                break;
            case 'litaTramitesFaltantes':
                $idCliente = $_REQUEST['idCliente'];
                $res = $tramite->litaTramitesFaltantes($idCliente);
                break;
            case 'getTramite':
                $res = $tramite->getTramite();
                break;
            case 'getTramiteCliente':
                $res = $tramite->getTramiteCliente();
                break;
            case 'getRequerimientosTramite':
                $idTramite = $_REQUEST['idTramite'];
                $res = $tramite->getRequerimientosTramite($idTramite);
                break;
            ////////////////////Para visualizar tramite desde el cliente v1
            // case 'getTramiteClienteUnico':
            //     $idCliente = $_REQUEST['idCliente'];
            //     $res = $tramite->getTramiteClienteUnico($idCliente);
            //     break;
            //////////////v2   listarTramites
            case 'getTramiteClienteUnico':
                $idCliente = $_REQUEST['idCliente'];
                $res = $tramite->getTramiteClienteUnico($idCliente);
                break;
            case 'listarTramites':
                $res = $tramite->listarTramites();
                break;
            default:
                # code...
                break;
        }
        $tramite->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>