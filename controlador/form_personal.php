
<?php
    //obtencion del personal
    require_once("../model/model_personal.php");
    if(isset($_POST['metodo'])){
        $metodo = $_POST['metodo'];
        $personal = new Personal();
        $res = "No hay metodo"; 
        switch ($metodo) {
            case 'getListaDePesonal':
                $res = $personal->getListaDePesonal();
                break;
            case 'cambiarEstadoPersona':
                $idPersona = $_REQUEST['idPersona'];
                $estado = $_REQUEST['estado'];
                $res = $personal->cambiarEstadoPersona($idPersona,$estado);
                break;
            case 'agregarPersonal':
                $carnet = sha1($_REQUEST['addCarnet']);
                $bandera = true;
                $listaCI = $personal->buscarPassword();
                for ($i=0; $i < count($listaCI); $i++) { 
                    // var_dump($listaCI[$i]['c_i']);
                    if($listaCI[$i]['c_i'] == ($carnet)){
                        $res = "El carnet ya esta registrado en otra persona";
                        $bandera = false;
                        break;
                    }
                }
                if($bandera){
                    $nombre = $_REQUEST['addNombre'];
                    $apellido = $_REQUEST['addApellido'];
                    $cargo = $_REQUEST['addCargo'];
                    $genero = $_REQUEST['addGenero'];
                    $telefono = $_REQUEST['addTelefono'];
                    $res = $personal->agregarPersonal($nombre,$apellido,$cargo,$carnet,$genero,$telefono);
                }
                break;
            case 'editarPersonal':
                // $carnet = sha1($_REQUEST['editCarnet']);
                $idPersonal = $_REQUEST['idEditPersonal'];
                $bandera = true;
                // $passAntigua = $personal->getPassword($idPersonal);
                // if($carnet != $passAntigua){
                //     $listaCI = $personal->buscarPassword();
                //     for ($i=0; $i < count($listaCI); $i++) { 
                //     // var_dump($listaCI[$i]['c_i']);
                //     if($listaCI[$i]['c_i'] == ($carnet)){
                //         $res = "El carnet ya esta registrado en otra persona";
                //         $bandera = false;
                //         break;
                //         }
                //     }
                // }
                if($bandera){
                    $nombre = $_REQUEST['editNombre'];
                    $apellido = $_REQUEST['editApellido'];
                    $cargo = $_REQUEST['editCargo'];
                    $genero = $_REQUEST['editGenero'];
                    $telefono = $_REQUEST['editTelefono'];
                    $res = $personal->editarPersonal($nombre,$apellido,$cargo,$genero,$telefono,$idPersonal);
                }
                break;
            default:
                # code...
                break;
        }
        $personal->cerrarConexion();
        echo $res;
    }else{
        echo "Error al obtener variables";
    }
?>