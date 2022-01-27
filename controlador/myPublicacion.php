<?php
    include_once('../model/model_archivo.php');
    if(!empty($_POST['addNombreTitulo']) || !empty($_POST['descPublicacion'])){
        $titulo = $_REQUEST['addNombreTitulo'];
        $descripcion = $_REQUEST['descPublicacion'];
        $idPersonal = $_REQUEST['idPersonalAct'];
        if ( 0 < $_FILES['myFile']['error'] ) {
        echo 'Error: ' . $_FILES['myFile']['error'];
        }
        else {
            $fecha = date("YmdHis");  
            // echo "el nombre es ".$_FILES['file']['name'];
            $direccion = '../documentos/'.$fecha.$_FILES['myFile']['name'];
            move_uploaded_file($_FILES['myFile']['tmp_name'], '../documentos/' .$fecha.$_FILES['myFile']['name']);
            $fechaActual = date("Y-m-d H:i:s");
            $archivo = new Archivo();
            $res = $archivo->guardarPublicacion($direccion,$titulo,$descripcion,$fechaActual,$idPersonal);
            echo $res;
        }
    }
?>