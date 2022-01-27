<?php
    require_once("myConexion.php");
    class Archivo extends Conexion{
        private $sentenceSQL;
        public function Archivo(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->sentenceSQL = null;
            $this->connexion_bd = null;
        }  
        
        public function guardarArchivo($idRequerimiento,$enlace,$fecha,$idCliente,$nomRequerimiento,$idTramite,$idTramiteCliente){
            $sql = "INSERT INTO archivo(idrequisito, direcion_archivo, fecha_archivo,idcliente,nombre_requerimiento,idTramite,idTramiteCliente) 
            VALUES(:idReq, :dir, :fecha, :idCli, :nomReq, :idTram, :idTramiteCliente)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":idReq"=>$idRequerimiento,":dir"=>$enlace,":fecha"=>$fecha,
            ":idCli"=>$idCliente,":nomReq"=>$nomRequerimiento,":idTram"=>$idTramite,":idTramiteCliente"=>$idTramiteCliente));
            $sentenceSQL->closeCursor();
            return $res;
        }


        // public function guardarArchivo($idRequerimiento,$enlace,$fecha,$idCliente,$nomRequerimiento,$idTramite){ v1.0
        //     $sql = "INSERT INTO archivo(idrequisito, direcion_archivo, fecha_archivo,idcliente,nombre_requerimiento,idTramite) 
        //     VALUES(:idReq,:dir,:fecha,:idCli,:nomReq,:idTram)";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $res = $sentenceSQL->execute(array(":idReq"=>$idRequerimiento,":dir"=>$enlace,":fecha"=>$fecha,
        //     ":idCli"=>$idCliente,":nomReq"=>$nomRequerimiento,":idTram"=>$idTramite));
        //     $sentenceSQL->closeCursor();
        //     return $res;
        // }

        public function solictarArchivosTramite($idTramite, $idCliente, $idTramiteCliente){
            $sql = "SELECT * FROM archivo WHERE idTramite = :idTram AND idcliente = :idClien AND idTramiteCliente = :idTC";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idTram"=>$idTramite,":idClien"=>$idCliente,":idTC"=>$idTramiteCliente));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode($respuesta);
        }
        
        

        public function guardarPublicacion($direccion,$titulo,$descripcion,$fechaActual,$idPersonal){
            $date = new DateTime();
            $date->modify('-5 hours');
            $fechaActual = $date->format('Y-m-j H:i:s');
            $sql = "INSERT INTO publicacion(titulo_publicacion, descripcion_publicacion, enlace_publicacion,fecha_publicacion,idpersonal) 
            VALUES(:titulo,:descripcion,:enlace,:fecha,:idPersonal)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res = $sentenceSQL->execute(array(":titulo"=>$titulo,":descripcion"=>$descripcion,":enlace"=>$direccion,":fecha"=>$fechaActual,":idPersonal"=>$idPersonal));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function actualizarArchivos($direccion,$idArchivo,$fecha){
            $sql = "UPDATE archivo SET direcion_archivo = :enlace, fecha_archivo = :fecha WHERE idarchivo = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL-> execute(array(":enlace"=>$direccion,":fecha"=>$fecha,":id"=>$idArchivo));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        ///NUEVO

        public function obtenerRequerimeintosSobrantes($idTramite,$idCliente,$idTramiteCliente){
            $sql = "SELECT idarchivo, direcion_archivo FROM archivo WHERE idtramite = :idTram AND idTramiteCliente = :idTC AND idrequisito NOT IN (SELECT idrequisito FROM tramite_requisito WHERE idTramite = :idTram AND idcliente = :idclien)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idTram"=>$idTramite,":idTC"=>$idTramiteCliente,":idclien"=>$idCliente));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function eliminarArchivo($tmpArchivo){
            $sql = "DELETE FROM archivo WHERE idarchivo = :idArchivo";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idArchivo"=>$tmpArchivo));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        // public function obtenerRequerimeintosFaltantes($idTramite,$idCliente,$idTramiteCliente){ v1.0
        //     // $sql = "SELECT idrequisito FROM tramite_requisito where idtramite = :idTram AND idrequisito NOT IN 
        //     // (SELECT idrequisito FROM archivo where idTramite = :idTram AND idcliente = :idclien);";
        //     $sql =  "SELECT requisito.idrequisito, nombre_requerimiento FROM requisito INNER JOIN tramite_requisito ON tramite_requisito.idrequisito = requisito.idrequisito
        //     where idtramite = :idTram AND tramite_requisito.idrequisito NOT IN  (SELECT idrequisito FROM archivo where idTramite = :idTram AND idcliente = :idclien AND idTramiteCliente = :idTC);";
        //     $sentenceSQL = $this->connexion_bd->prepare($sql);
        //     $sentenceSQL->execute(array(":idTram"=>$idTramite,":idclien"=>$idCliente,":idTC"=>$idTramiteCliente));
        //     $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
        //     $sentenceSQL->closeCursor();
        //     return $respuesta;
        // }

        public function obtenerRequerimeintosFaltantes($idTramiteCliente,$idTramite){
            // $sql = "SELECT idrequisito FROM tramite_requisito where idtramite = :idTram AND idrequisito NOT IN 
            // (SELECT idrequisito FROM archivo where idTramite = :idTram AND idcliente = :idclien);";
            $sql =  "SELECT requisito.idrequisito, nombre_requerimiento FROM requisito INNER JOIN tramite_requisito ON tramite_requisito.idrequisito = requisito.idrequisito
            where tramite_requisito.idtramite = :idTramite AND tramite_requisito.idrequisito NOT IN (SELECT idrequisito FROM archivo where idTramiteCliente = :idTC);";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idTramite"=>$idTramite,":idTC"=>$idTramiteCliente));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $respuesta;
        }


        public function insertarArchivo($idrequisito,$idTramite,$idCliente,$nombreRequerimiento,$idTramiteCliente){
            $sql = "INSERT INTO archivo(idrequisito,idTramite,idcliente,nombre_requerimiento,idTramiteCliente) VALUES(:idReq,:idTram,:idCliente,:requerimient,:idTC);";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idReq"=>$idrequisito,":idTram"=>$idTramite,":idCliente"=>$idCliente,":requerimient"=>$nombreRequerimiento,":idTC"=>$idTramiteCliente));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }



        ///////////////////


        /////////////////////////////////////////////

        

        public function getListaItem(){
            $sql = "SELECT * FROM item;";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            echo json_encode(array('data' => $respuesta), JSON_PRETTY_PRINT);
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