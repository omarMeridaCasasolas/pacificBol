<?php
    require_once("myConexion.php");
    class Requerimiento extends Conexion{
        private $sentenceSQL;
        public function Requerimiento(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        } 

        public function getRequerimiento(){
            $sql = "SELECT * FROM requisito;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
            // echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function getRequerimientoPorTramite($idTramite){
            $sql = "SELECT * FROM requisito INNER JOIN tramite_requisito ON tramite_requisito.idrequisito = requisito.idrequisito WHERE idtramite = :id;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idTramite));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
            // echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function crearRequerimiento($idTramite,$ruta,$nomRequerimiento){
            $sql = "INSERT INTO requisito(tramite_idtramite, enlace_requerimiento, nombre_requerimiento) 
            VALUES(:idTramite, :ruta,:nombre)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":idTramite"=>$idTramite,":ruta"=>$ruta, ":nombre"=>$nomRequerimiento));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function getListaRequisitosTable(){
            $sql = "SELECT * FROM requisito;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        }

        public function agregarRequerimiento($titulo,$descripcion,$direccion,$fecha){
            $sql = "INSERT INTO requisito(nombre_requerimiento, descripcion_requerimiento ,enlace_requerimiento,fecha_requisito) 
            VALUES(:nombre, :descripcion,:enlace,:fecha)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":nombre"=>$titulo,":descripcion"=>$descripcion,":enlace"=>$direccion,":fecha"=>$fecha));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function editarRequerimiento($idRequisito,$titulo,$descripcion,$direccion,$fechaActual){
            $sql = "UPDATE requisito SET nombre_requerimiento = :nombre, descripcion_requerimiento = :descripcion ,enlace_requerimiento = :enlace,
            fecha_requisito = :fecha WHERE idrequisito = :id ";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":nombre"=>$titulo,":descripcion"=>$descripcion,":enlace"=>$direccion,":fecha"=>$fechaActual, ":id"=>$idRequisito));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function obtenerRequerimientoImportacion(){
            $sql = "SELECT  nombre_requerimiento as nombre, enlace_requerimiento as enlace, descripcion_requerimiento as descripcion
            FROM requisito INNER JOIN tramite_requisito ON tramite_requisito.idrequisito = requisito.idrequisito WHERE idtramite = 2;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        public function getRequerimientosExportacion(){ 
            $sql = "SELECT  nombre_requerimiento as nombre, enlace_requerimiento as enlace, descripcion_requerimiento as descripcion
            FROM requisito INNER JOIN tramite_requisito ON tramite_requisito.idrequisito = requisito.idrequisito WHERE idtramite = 1;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }

        // public function getListaItem(){
        //     $sql = "SELECT * FROM item;";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $sentenceSQL->execute();
        //     $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
        //     $sentenceSQL->closeCursor();
        //     echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
        // }
        
        // public function insertarItem($nombreItem,$marcaItem,$precioItem,$medidaItem,$cantidadItem){
        //     $sql = "INSERT INTO item(nombre_item, marca_item, precio_item, unidad_item, cantidad_item, estado_item) 
        //     VALUES(:nombre, :marca, :precio, :medida ,:cantidad, true)";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $res = $sentenceSQL->execute(array(":nombre"=>$nombreItem,":marca"=>$marcaItem,":precio"=>$precioItem,":medida"=>$medidaItem,":cantidad"=>$cantidadItem));
        //     $sentenceSQL->closeCursor();
        //     return $res;
        // }
        // public function cambiarEstadoItem($idItem,$estado){
        //     $sql = "UPDATE item SET estado_item = :estado WHERE id_item = :idItem";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $respuesta = $sentenceSQL-> execute(array(":estado"=>$estado,":idItem"=>$idItem));
        //     $sentenceSQL->closeCursor();
        //     return $respuesta;
        // }
        // public function actualizarItem($idItem,$nombreItem,$marcaItem,$precioItem,$medidaItem,$cantidadItem){
        //     $sql = "UPDATE item SET nombre_item = :nombre, marca_item = :marca, precio_item = :precio, unidad_item = :medida, cantidad_item = :cantidad
        //     WHERE id_item = :idItem";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $respuesta = $sentenceSQL-> execute(array(":nombre"=>$nombreItem,":marca"=>$marcaItem,":precio"=>$precioItem,":medida"=>$medidaItem,":cantidad"=>$cantidadItem,":idItem"=>$idItem));
        //     $sentenceSQL->closeCursor();
        //     return $respuesta;
        // }
    }
?>