<?php
require("config.php");
    class ConexionPDO {

        protected $init;

        public function __construct(){

            try{
                
                $this -> init = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $this -> init -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this -> init -> exec("SET CHARACTER SET ". DB_CHARSET);
                return $this -> init;

            }catch(Exception $e){

                echo "Error: ". $e -> getMessage();

            }
        }

    }
?>