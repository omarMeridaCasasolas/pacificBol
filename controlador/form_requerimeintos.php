<?php
    //obtencion del archivo
    require_once("../model/model_requerimeinto.php");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $requerimiento = new Requerimiento();
        $res = "No hay metodo";
        switch ($metodo) { 
            case 'obtenerRequerimientoImportacion':
                $res = $requerimiento->obtenerRequerimientoImportacion();
                break;
            case 'getRequerimientosExportacion':
                $res = $requerimiento->getRequerimientosExportacion();
                break;
            case 'getListaRequisitosTable':
                $res = $requerimiento->getListaRequisitosTable();
                break;
            case 'getRequerimientoPorTramite':
                $idTramite = $_REQUEST['idTramite'];
                $res = $requerimiento->getRequerimientoPorTramite($idTramite);
                break;
            case 'getRequerimiento':
                // $idTramite = $_REQUEST['idTramite'];
                $res = $requerimiento->getRequerimiento();
                break;
            case 'agregarRequerimiento':
                $titulo = $_REQUEST['titulo'];
                $descripcion = $_REQUEST['descripcion'];
                $fecha = date("Y-m-d H:i:s");
                if ( 0 < $_FILES['myFile']['error'] ) {
                    $res = 'Error: ' . $_FILES['myFile']['error'];
                    }
                else {
                    $fecha = date("YmdHis");  
                    $direccion = '../documentos/'.$fecha.$_FILES['myFile']['name'];
                    move_uploaded_file($_FILES['myFile']['tmp_name'], '../documentos/' .$fecha.$_FILES['myFile']['name']);
                    $fechaActual = date("Y-m-d");
                    $res = $requerimiento->agregarRequerimiento($titulo,$descripcion,$direccion,$fechaActual);
                }
                break;
            case 'editarRequerimiento':
                $titulo = $_REQUEST['editTituloReq'];
                $descripcion = $_REQUEST['editDescReq'];
                $idRequisito = $_REQUEST['idRequerimientoEdit'];
                $fecha = date("Y-m-d H:i:s");
                if ( 0 < $_FILES['editFileReq']['error'] ) {
                    $res = 'Error: ' . $_FILES['editFileReq']['error'];
                    }
                else {
                    $fecha = date("YmdHis");  
                    $direccion = '../documentos/'.$fecha.$_FILES['editFileReq']['name'];
                    move_uploaded_file($_FILES['editFileReq']['tmp_name'], '../documentos/' .$fecha.$_FILES['editFileReq']['name']);
                    $fechaActual = date("Y-m-d");
                    $res = $requerimiento->editarRequerimiento($idRequisito,$titulo,$descripcion,$direccion,$fechaActual);
                }
                break;
            default:
                # code...
                break;
        }
        $requerimiento->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>