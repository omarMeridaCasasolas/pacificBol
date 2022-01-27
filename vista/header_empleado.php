<?php
    session_start();
    if(isset($_SESSION['idPersonal'])){

    }else{
        var_dump($_SESSION['idPersonal']);
        header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Trámite</title>
</head>
<nav class="navbar navbar-expand-md bg-info navbar-dark p-3">
        <!-- <a class="navbar-brand" href="registro_tramite.php"><?php echo $_SESSION['login'];?></a> -->
        <a class="navbar-brand" href="crud_publicaciones.php"><?php echo $_SESSION['login']." ".$_SESSION['apellido'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <strong><a class="nav-link text-dark" href="crud_publicaciones.php">Publicaciones</a></strong>
                </li>
                <li class="nav-item">
                    <strong><a class="nav-link text-dark" href="crud_Tramite.php">Tramite</a></strong>
                </li>        
                <li class="nav-item">
                    <strong><a class="nav-link text-dark" href="crud_requisito.php">Requisitos</a></strong>
                </li>  
                <li class="nav-item">
                    <strong><a class="nav-link text-dark" href="crud_empleado.php">Empleados</a></strong>
                </li>                 
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a href="../controlador/formCerrarSession.php" class="btn btn-danger" title="Cerrar Session"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>   
    </nav>
<span id="idPersonalHtml" class='d-none'><?php echo $_SESSION['idPersonal'];?></span>