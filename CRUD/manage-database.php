<?php
    require("database-params.php");
    class GestionDatos {
        
        protected $conexion;
        public function __construct(){
            try{

                $this->conexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->exec("SET CHARACTER SET " . DB_CHARSET);

            } catch(Exception $e){

                echo "<p>Error generado: " . $e ->getMessage();
            }

        }

        public function getConexion(){
            return $this->conexion;
        }

        public function closeConexion(){
            
            return $this->conexion = null;
        }

    }
?>