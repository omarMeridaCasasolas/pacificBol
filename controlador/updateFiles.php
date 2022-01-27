<?php
    session_start();
    if(isset($_POST)){
        require_once('../model/model_producto.php');
        $exportacion = $_POST['paisExportacion'];
        $importacion = $_POST['paisImportacion'];
        $idCliente = $_POST['idCliente'];
        $idTramite = $_POST['idTramite'];
        $idTramiteCliente = $_POST['idTramiteCliente'];
        $fecha = date('Y-m-d');
        $producto = new Producto();
        $res = $producto->cambiarEstadoProducto($exportacion,$importacion,$fecha,$idTramiteCliente);
        if($res == '1' && $_POST['listaID']!= ""){
            $cadena = $_POST['listaID'];
            $lista = explode(",", $cadena);
            $indice = 0;
            require_once('../model/model_archivo.php');
            $archivo = new Archivo();
            $res;
            foreach ($_FILES["myFile"]["error"] as $clave => $error) {
                    $nombre_tmp = $_FILES["myFile"]["tmp_name"][$clave];
                    $nombre = rand(1,1000).date("YmdHis").$_FILES["myFile"]["name"][$clave];
                    $idArchivo = $lista[$indice];
                    // $nomRequerimiento = $listaTextRequerimiento[$indice];
                    move_uploaded_file($nombre_tmp, "../documentos/".$nombre);
                    $res = $archivo->actualizarArchivos("../documentos/".$nombre,$idArchivo,date("Y-m-d H:i:s"));
                    $indice++;
                // }
            }
        }
        echo $res;
    }else{
        echo "No exite el id cliente";
    }