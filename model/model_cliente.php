<?php
    require_once("myConexion.php");
    class Cliente extends Conexion{
        private $sentenceSQL;
        public function Cliente(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        public function buscarCliente($correo,$pass){
            $sql = "SELECT * FROM cliente WHERE correo_electronico = :correo AND nit = :pass";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":correo"=>$correo,":pass"=>$pass));
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
        

        public function getListaItem(){
            $sql = "SELECT * FROM item;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }
        
        public function insertarItem($nombreItem,$marcaItem,$precioItem,$medidaItem,$cantidadItem){
            $sql = "INSERT INTO item(nombre_item, marca_item, precio_item, unidad_item, cantidad_item, estado_item) 
            VALUES(:nombre, :marca, :precio, :medida ,:cantidad, true)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":nombre"=>$nombreItem,":marca"=>$marcaItem,":precio"=>$precioItem,":medida"=>$medidaItem,":cantidad"=>$cantidadItem));
            $sentenceSQL->closeCursor();
            return $res;
        }
        public function cambiarEstadoItem($idItem,$estado){
            $sql = "UPDATE item SET estado_item = :estado WHERE id_item = :idItem";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":estado"=>$estado,":idItem"=>$idItem));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }
        public function actualizarItem($idItem,$nombreItem,$marcaItem,$precioItem,$medidaItem,$cantidadItem){
            $sql = "UPDATE item SET nombre_item = :nombre, marca_item = :marca, precio_item = :precio, unidad_item = :medida, cantidad_item = :cantidad
            WHERE id_item = :idItem";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":nombre"=>$nombreItem,":marca"=>$marcaItem,":precio"=>$precioItem,":medida"=>$medidaItem,":cantidad"=>$cantidadItem,":idItem"=>$idItem));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }
    }
?>