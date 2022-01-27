<?php
    require_once("myConexion.php");
    class Personal extends Conexion{
        private $sentenceSQL;
        public function Personal(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        public function getloginPersonasl($nombre){
            $sql = "SELECT * FROM personal WHERE UPPER(nombres) = UPPER(:nombre) AND estado_personal = 'true'";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":nombre"=>$nombre));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function agregarUsuario($mail,$telefono,$nit,$genero,$razonSocial){
            $sql = "INSERT INTO cliente(correo_electronico, telefono, nit, genero, razon_social) 
            VALUES(:correo, :telefono, :nit, :genero ,:razon)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":correo"=>$mail,":telefono"=>$telefono,":nit"=>$nit,":genero"=>$genero,":razon"=>$razonSocial));
            if($res == 1 || $res == true){
                $res = $this->connexion_bd->lastInsertId();
                $string = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $res);
                $sentenceSQL->closeCursor();
                return $string;
            }else{
                $sentenceSQL->closeCursor();
                return $res;
            }
        }
        
        // public function agregarPersonal($nombre1,$nombre2,$apellido1,$apellido2,$genero,$cargo,$telefono,$carnet){
        //     $sql = "INSERT INTO personal(primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, genero, cargo, telefono_personal, c_i, estado) 
        //     VALUES(:nombre1, :nombre2, :apellido1, :apellido2,:genero, :cargo, :telefono,:carnet,'Activo')";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $res = $sentenceSQL->execute(array(":nombre1"=>$nombre1,":nombre2"=>$nombre2,":apellido1"=>$apellido1,":apellido2"=>$apellido2,
        //     ":genero"=>$genero,":cargo"=>$cargo,":telefono"=>$telefono,":carnet"=>$carnet));
        //     $text = preg_replace("/[\r\n]+/", "\n", $res);
        //     $res = preg_replace("/\s+/", ' ', $text);
        //     $sentenceSQL->closeCursor();
        //     return $res;
        // }
        
        public function editarPersonal($nombre,$apellido,$cargo,$genero,$telefono,$idPersonal){
            $sql = "UPDATE personal SET nombres = :nombre, apellidos = :apellido, cargo = :cargo, genero = :genero,
            telefono_personal = :telefono WHERE idpersonal = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombre,":apellido"=>$apellido,":cargo"=>$cargo,
            ":genero"=>$genero,":telefono"=>$telefono,":id"=>$idPersonal));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function getPassword($idPersonal){
            $sql = "SELECT * FROM personal WHERE idpersonal = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idPersonal));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function buscarPassword(){
            $sql = "SELECT c_i FROM personal ";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function getListaDePesonal(){
            $sql = "SELECT idpersonal, genero, nombres, apellidos, cargo ,estado_personal, telefono_personal, CONCAT(nombres,' ',apellidos) as nombre_completo FROM personal;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function agregarPersonal($nombre,$apellido,$cargo,$carnet,$genero,$telefono){
            $sql = "INSERT INTO personal (nombres, apellidos, cargo, c_i, genero, telefono_personal, estado_personal) 
            VALUES(:nombre, :apellido, :cargo, :ci ,:genero ,:telefono, 'true')";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":nombre"=>$nombre,":apellido"=>$apellido,":cargo"=>$cargo,":ci"=>$carnet, ":genero"=>$genero,":telefono"=>$telefono));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function cambiarEstadoPersona($idPersona,$estado){
            $sql = "UPDATE personal SET estado_personal = :estado WHERE idpersonal = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":estado"=>$estado,":id"=>$idPersona));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }
    }
?>