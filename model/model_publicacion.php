<?php
    require_once("myConexion.php");
    class Publicacion extends Conexion{
        private $sentenceSQL;
        public function Publicacion(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        public function getlistaPublicaciones(){
            $sql = "SELECT * FROM publicacion;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function verPublicaciones(){
            $sql = "SELECT * FROM publicacion Order by fecha_publicacion desc;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        public function eliminarPublicacion($idPublicacion){
            $sql = "DELETE FROM publicacion WHERE id_publicacion = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":id"=>$idPublicacion));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }
        
        public function actualizarPublicacion($idPersonal,$titulo,$descripcion,$direccion,$fecha,$idPublicacion){
            $sql = "UPDATE publicacion SET idpersonal = :idPersonal, titulo_publicacion = :titulo, descripcion_publicacion = :descripcion,
            enlace_publicacion = :direccion, fecha_publicacion = :fecha WHERE id_publicacion = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":idPersonal"=>$idPersonal,":titulo"=>$titulo,":descripcion"=>$descripcion,
            ":direccion"=>$direccion,":fecha"=>$fecha,":id"=>$idPublicacion));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        ///////////////////
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