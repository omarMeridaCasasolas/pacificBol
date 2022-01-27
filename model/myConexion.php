
<?php
    class Conexion{
        protected $connexion_bd;
        public function Conexion(){
            try {
                $host = "localhost";
                $usuario = "root";
                $contrasenia = "kirium";
                $base_de_datos = "agencia_final";
                $port = 3306;
                //Conexion local host
                //$this->connexion_bd = new PDO('mysql:host=localhost;dbname=agencia;port=3307',$usuario,$contrasenia);
                //Conexion CleverCloud 
                $usuario = "uasrxz4qrh1xinnr";
                $contrasenia = "WSM9ks7dz2mQJcZ9DUCy";
                $this->connexion_bd = new PDO('mysql:host=bxqsxwdoasmaf0zorzvi-mysql.services.clever-cloud.com;dbname=bxqsxwdoasmaf0zorzvi;port=3306',$usuario,$contrasenia);
                // $this->connexion_bd = new PDO('mysql:host=35.224.106.197;dbname=rosy-dynamics-326312:us-central1:aduana',$usuario,$contrasenia);
                // $connexion_bd->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
                // $connexion_bd-->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connexion_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this->connexion_bd->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
                return $this->connexion_bd;
            }catch (PDOException $e) {
                echo "Errod aqui";
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }

?>
    