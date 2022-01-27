<?php
    require_once("myConexion.php");
    class Tramite extends Conexion{
        private $sentenceSQL;
        public function Tramite(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        public function getTramite(){
            $sql = "SELECT * FROM tramite";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function listarTramites(){
            $sql = "SELECT * FROM tramite";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        // public function getTramiteCliente(){ v1.0
        //     $sql = "SELECT razon_social,nit, correo_electronico, descEvaluacion, telefono, pais_exportacion, pais_importacion, genero , cht.fecha_tramite, idtramite, tipo_tramite, idpersonal, descripcion_tramite, cht.estado , estado_tramite, idcliente
        //     FROM cliente_has_tramite as cht INNER JOIN cliente  ON cliente.idCliente = cht.cliente_idcliente  INNER JOIN tramite ON tramite.idtramite = cht.tramite_idtramite;";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $sentenceSQL->execute();
        //     $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
        //     $sentenceSQL->closeCursor();
        //     echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        // }

        public function getTramiteCliente(){
            $sql = "SELECT idTramiteCliente, idTramite as idtramite,  idcliente, correo_electronico, telefono, tipo_tramite, cliente_tramite.fecha_tramite, 
            estado, pais_exportacion, pais_importacion, nit, razon_social FROM cliente_tramite INNER JOIN tramite ON 
            tramite.idtramite = cliente_tramite.tramite_idtramite INNER JOIN cliente ON cliente_tramite.cliente_idcliente = cliente.idcliente;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        // public function getTramiteClienteUnico($idCliente){  Vwesion 1.0
        //     $sql = "SELECT razon_social,nit, correo_electronico, descEvaluacion, telefono, pais_exportacion, pais_importacion, genero , cht.fecha_tramite, idtramite, tipo_tramite, idpersonal, descripcion_tramite, cht.estado , estado_tramite, idcliente
        //     FROM cliente_has_tramite as cht INNER JOIN cliente  ON cliente.idCliente = cht.cliente_idcliente  INNER JOIN tramite ON tramite.idtramite = cht.tramite_idtramite WHERE idcliente = :id;";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $sentenceSQL->execute(array(":id"=>$idCliente));
        //     $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
        //     $sentenceSQL->closeCursor();
        //     echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        // }

        public function getTramiteClienteUnico($idCliente){
            $sql = "SELECT idTramiteCliente ,tipo_tramite, descripcion_tramite, tramite.idtramite, cliente_idcliente as idcliente , descEvaluacion, cliente_tramite.fecha_tramite, estado, pais_exportacion, 
            pais_importacion FROM cliente_tramite  INNER JOIN tramite ON  tramite.idtramite = cliente_tramite.tramite_idtramite WHERE cliente_idcliente = :id;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idCliente));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function actualizarTramite($idTramite,$descTramite,$fecha){
            $sql = "UPDATE tramite SET descripcion_tramite = :descripcion, fecha_tramite = :fecha WHERE idtramite = :idTramite";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":descripcion"=>$descTramite,":fecha"=>$fecha,":idTramite"=>$idTramite));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function litaTramitesFaltantes($idCliente){
            $sql = "SELECT * FROM tramite WHERE  idtramite NOT IN (SELECT tramite_idtramite FROM cliente_has_tramite WHERE cliente_idcliente = :id);";
            // $sql = "SELECT * FROM item;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idCliente));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        public function eliminarAnterioresReq($idTramite){
            $sql = "DELETE FROM tramite_requisito WHERE idtramite = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":id"=>$idTramite));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function relacionarTramiteRequerimientos($idTramite,$idRequisito){
            $sql = "INSERT INTO tramite_requisito(idtramite, idrequisito) VALUES(:idTramite, :idRequisito)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":idTramite"=>$idTramite,":idRequisito"=>$idRequisito));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function getRequerimientosTramite($idTramite){
            $sql = "SELECT * FROM tramite_requisito WHERE idtramite = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL-> execute(array(":id"=>$idTramite));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        // public function actualizarTramite($idTramite,$descripcion, $fecha){

        // }

        /////////////////////////////

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