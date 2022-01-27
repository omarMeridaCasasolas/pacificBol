<?php
    // var_dump($_POST['inTituloReq'][0]);
    if(isset($_POST['inTituloReq'])){
        require_once('../model/model_requerimeinto.php');
        $idTramite = $_POST['idTramiteAct'];
        $idPersona = $_POST['idPersona'];
        $descTramite  = $_POST['descTramite'];
        $requerimiento = new Requerimiento();
        $indice = 0;
        foreach ($_FILES["requerimientos"]["error"] as $clave => $error) {
            $nombre_tmp = $_FILES["requerimientos"]["tmp_name"][$clave];
            $nombre = rand(1,10).date("YmdHis").$_FILES["requerimientos"]["name"][$clave];
            // $idRequerimiento = $cantidadDocumentos[$indice];
            $nomRequerimiento = $_POST['inTituloReq'][$indice];
            move_uploaded_file($nombre_tmp, "../documentos/".$nombre);
            $requerimiento->crearRequerimiento($idTramite, "../documentos/".$nombre,$nomRequerimiento,$idPersona);
            $indice++;
        }
        require_once('../model/model_tramite.php');
        $tramite = new Tramite();
        $res = $tramite->actualizarTramite($idTramite,$descTramite,date("Y-m-d H:i:s"));
        echo $res;
    }