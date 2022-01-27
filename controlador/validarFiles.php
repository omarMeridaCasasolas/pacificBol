<?php
    session_start();
    if(isset($_SESSION['idCliente'])){
        // $cadena = $_POST['numReq']; v1
        // $importacion = $_POST['idImportacion']; 
        // $exportacion = $_POST['idExportacion'];
        // $idTramite = $_POST['addTipoSolicitud'];
        // $fecha = date("Y-m-d");
        // $cantidadDocumentos = explode(",", $cadena);
        // $textRequerimiento = $_POST['textReq'];
        // $listaTextRequerimiento = explode(",", $textRequerimiento);
        // $indice = 0;
        // require_once('../model/model_archivo.php');
        // $archivo = new Archivo();
        // foreach ($_FILES["requerimientos"]["error"] as $clave => $error) {
        //     $nombre_tmp = $_FILES["requerimientos"]["tmp_name"][$clave];
        //     $nombre = rand(1,100).date("YmdHisu").$_FILES["requerimientos"]["name"][$clave];
        //     $idRequerimiento = $cantidadDocumentos[$indice];
        //     $nomRequerimiento = $listaTextRequerimiento[$indice];
        //     move_uploaded_file($nombre_tmp, "../documentos/".$nombre);
        //     $archivo->guardarArchivo($idRequerimiento, "../documentos/".$nombre,date("Y-m-d H:i:s"),$_SESSION['idCliente'],$nomRequerimiento,$idTramite);
        //     $indice++;
        // }
        // require_once('../model/model_producto.php');
        // $producto = new Producto();
        // $res = $producto->guardarProducto($_SESSION['idCliente'],$idTramite,$exportacion,$importacion,$fecha);
        // echo $res;
        $importacion = $_POST['idImportacion']; 
        $exportacion = $_POST['idExportacion'];
        $idTramite = $_POST['addTipoSolicitud'];
        $fecha = date("Y-m-d");
        $idCliente = $_SESSION['idCliente'];
        require_once('../model/model_producto.php');
        $producto = new Producto();
        $res = $producto->guardarProducto($idCliente,$idTramite,$exportacion,$importacion,$fecha);
        if(is_numeric($res)){
            $cadena = $_POST['numReq'];
            $cantidadDocumentos = explode(",", $cadena);
            $textRequerimiento = $_POST['textReq'];
            $listaTextRequerimiento = explode(",", $textRequerimiento);
            require_once('../model/model_archivo.php');
            $archivo = new Archivo();
            $indice = 0;
            foreach ($_FILES["requerimientos"]["error"] as $clave => $error) {
                $nombre_tmp = $_FILES["requerimientos"]["tmp_name"][$clave];
                $nombre = rand(1,100).date("YmdHisu").$_FILES["requerimientos"]["name"][$clave];
                $idRequerimiento = $cantidadDocumentos[$indice];
                $nomRequerimiento = $listaTextRequerimiento[$indice];
                move_uploaded_file($nombre_tmp, "../documentos/".$nombre);
                $archivo->guardarArchivo($idRequerimiento, "../documentos/".$nombre,date("Y-m-d H:i:s"),$idCliente,$nomRequerimiento,$idTramite,$res);
                $indice++;
            }
        }
        echo $res;
    }else{
        echo "No exite el id cliente";
    }

    

