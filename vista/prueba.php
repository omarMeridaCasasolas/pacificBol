<?php
    include_once('../controlador/form_tramite.php');
    $tramite = new Tramite();
    $tramite->getTramite();
    // var_dump($tramite->getTramite());