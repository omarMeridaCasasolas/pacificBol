
<?php
    //obtencion del producto
    require_once("../model/model_producto.php");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $producto = new Producto();
        $res = "No hay metodo"; 
        switch ($metodo) {
            case 'realizarEvaluacion':
                // $idTramite = $_POST['idTramite'];
                // $idCliente = $_POST['idCliente'];
                $idPersonal = $_POST['idPersonal'];
                $evaluacion = $_POST['evaluacion'];
                $idTramiteCliente = $_POST['idTramiteCliente'];
                $descEvaluacion = $_POST['descEvaluacion'];
                $res = $producto->realizarEvaluacion($idPersonal,$evaluacion,$descEvaluacion,$idTramiteCliente);
                break;
            default:
                # code...
                break;
        }
        $producto->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>