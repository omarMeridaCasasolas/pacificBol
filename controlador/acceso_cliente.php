<?php
    session_start();
    include_once("../model/model_cliente.php");
    // echo $_POST['mailCliente'];
    // echo $_POST['passCliente'];
    if(isset($_POST['mailCliente']) && isset($_POST['passCliente'])){
        $mail = $_POST['mailCliente'];
        $passCliente = $_POST['passCliente'];
        $cliente = new Cliente();
        $res = $cliente->buscarCliente($mail,$passCliente);
        var_dump(count($res)>0);
        if(count($res)>0){
            $_SESSION['razonSocial'] = $res[0]['razon_social'];
            $_SESSION['correo_cliente'] = $mail;
            $_SESSION['nit'] = $passCliente;
            $_SESSION['telefono_cliente'] = $res[0]['telefono'];
            $_SESSION['idCliente'] = $res[0]['idcliente'];
            echo "entro aqui";
            header("Location:../vista/home_cliente.php");
        }else{
            header("Location:../tramite.php?action=Datos incorrectos");
        }
    }else{
        // echo "No envio parametros aceptados";
    }
