<?php
    //obtencion del archivo
    require_once("../model/model_publicacion.php");
    //date_default_timezone_set("America/La_Paz");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $publicacion = new Publicacion();
        $res = "No hay metodo"; 
        switch ($metodo) {
            case 'actualizarPublicacion':
                $myFile = $_FILES['myFile'];
                $descripcion = $_REQUEST['descripcion'];
                $titulo = $_REQUEST['titulo'];
                $idPersonal = $_REQUEST['idPersonal'];
                $idPublicacion = $_REQUEST['idPublicacion'];
                if ( 0 < $_FILES['myFile']['error'] ) {
                    $res = 'Error: ' . $_FILES['myFile']['error'];
                    }
                else {
                    $fecha = date("YmdHis");  
                    // echo "el nombre es ".$_FILES['file']['name'];
                    $direccion = '../documentos/'.$fecha.$_FILES['myFile']['name'];
                    move_uploaded_file($_FILES['myFile']['tmp_name'], '../documentos/' .$fecha.$_FILES['myFile']['name']);
                    $now = new DateTime();
                    $now->modify('-5 hours');
                    $fechaActual =  $now->format('Y-m-d H:i:s');
                    //$fechaActual = date("Y-m-d H:i:s");
                    // $archivo = new Archivo();
                    // $res = $archivo->guardarPublicacion($direccion,$titulo,$descripcion,$fechaActual,$idPersonal);
                    $res = $publicacion->actualizarPublicacion($idPersonal,$titulo,$descripcion,$direccion,$fechaActual,$idPublicacion);
                }
                
                break;

            case 'getlistaPublicaciones':
                $res = $publicacion->getlistaPublicaciones();
                break;
            case 'verPublicaciones':
                $res = $publicacion->verPublicaciones();
                break; 
            case 'eliminarPublicacion':
                $idPublicacion = $_REQUEST['idPublicacion'];
                $res = $publicacion->eliminarPublicacion($idPublicacion);
                break; 
            default:
                # code...
                break;
        }
        $publicacion->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>