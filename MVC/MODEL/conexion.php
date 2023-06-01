<?php
    require("properties.php");
    class Conecta {

        protected $init;

        public function __construct(){

                try{
                    $this -> init = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                    $this -> init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this -> init-> exec("SET NAMES ".DB_CHARSET);
                }
                catch(Exception $e){
                    echo "Error: ". $e->getMessage()."<br>";
                    echo "Lineas: ". $e->getLine() . " " . $e->getFile();
                }
            }
        

        public function getConexion(){
            
            return $this -> init;

        }

        public function closeConexion(){
            
            $this -> init = null;
        }

    }

?>