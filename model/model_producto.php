<?php
    require_once("myConexion.php");
    class Producto extends Conexion{
        private $sentenceSQL;
        public function Producto(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        // public function guardarProducto($idCliente,$idTramite,$exportacion,$importacion,$fecha){ v1.0
        //     $sql = "INSERT INTO cliente_has_tramite(cliente_idcliente, tramite_idtramite, pais_exportacion, pais_importacion, fecha_tramite) 
        //     VALUES(:idCli, :idTramite, :exportacion, :importacion, :fecha)";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $respuesta = $sentenceSQL->execute(array(":idCli"=>$idCliente,":idTramite"=>$idTramite,":exportacion"=>$exportacion,":importacion"=>$importacion,":fecha"=>$fecha));
        //     $sentenceSQL->closeCursor();
        //     return $respuesta;
        // }

        public function guardarProducto($idCliente,$idTramite,$exportacion,$importacion,$fecha){
            $sql = "INSERT INTO cliente_tramite(cliente_idcliente, tramite_idtramite, pais_exportacion, pais_importacion, fecha_tramite) 
            VALUES(:idCli, :idTramite, :exportacion, :importacion, :fecha)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":idCli"=>$idCliente,":idTramite"=>$idTramite,":exportacion"=>$exportacion,":importacion"=>$importacion,":fecha"=>$fecha));
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
        

        public function realizarEvaluacion($idPersonal,$evaluacion,$descEvaluacion,$idTramiteCliente){
            $sql = "UPDATE cliente_tramite SET idpersonal = :idPersonal, estado = :evaluacion, descEvaluacion = :descripcion WHERE idTramiteCliente = :idTC;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idPersonal"=>$idPersonal,":evaluacion"=>$evaluacion,":descripcion"=>$descEvaluacion,":idTC"=>$idTramiteCliente));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }
        

        // public function realizarEvaluacion($idTramite,$idCliente,$idPersonal,$evaluacion,$descEvaluacion){ v1
        //     $sql = "UPDATE cliente_tramite SET idpersonal = :idPersonal, estado = :evaluacion, descEvaluacion = :descripcion WHERE cliente_idcliente = :idCli  AND tramite_idtramite = :idTramite;";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $respuesta = $sentenceSQL->execute(array(":idPersonal"=>$idPersonal,":evaluacion"=>$evaluacion,":idCli"=>$idCliente,":idTramite"=>$idTramite, ":descripcion"=>$descEvaluacion));
        //     $sentenceSQL->closeCursor();
        //     return $respuesta;
        // }
        
        public function cambiarEstadoProducto($exportacion,$importacion,$fecha,$idTramiteCliente){
            $sql = "UPDATE cliente_tramite SET pais_exportacion = :exportacion, pais_importacion = :importacion, fecha_tramite = :fecha 
            WHERE idTramiteCliente = :idTC;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":exportacion"=>$exportacion,":importacion"=>$importacion,":fecha"=>$fecha,":idTC"=>$idTramiteCliente));
            $sentenceSQL->closeCursor();
            return $respuesta;
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