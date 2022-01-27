<?php
    session_start();
    include_once("../model/model_cliente.php");
    if(isset($_POST['razonSocial']) && isset($_POST['correo'])){
        $mail = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $nit = $_POST['nit'];
        $genero = $_POST['genero'];
        $razonSocial  = $_POST['razonSocial'];
        $cliente = new Cliente();
        $res = $cliente->agregarUsuario($mail,$telefono,$nit,$genero,$razonSocial);
        if(is_numeric($res)){
            $_SESSION['correo_cliente'] = $mail;
            $_SESSION['telefono_cliente'] = $telefono;
            $_SESSION['nit'] = $nit;
            $_SESSION['genero'] = $genero;
            $_SESSION['razonSocial'] = $razonSocial;
            $_SESSION['idCliente'] = $res;
            header("location:../vista/home_cliente.php");
        }else{
            var_dump($res);
        }
    }else{
        echo "No envio parametros aceptados";
    }