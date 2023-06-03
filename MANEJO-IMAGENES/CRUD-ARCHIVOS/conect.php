<?php
require("properties-img.php");
    class Conexion{
        protected $db_connect;
        public function __construct(){

            try{

                $this -> db_connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $this -> db_connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this -> db_connect -> exec("SET NAMES ".DB_CHARSET);

            } catch(Exception $e){

                echo "Error :" . $e -> getMessage();

            }

        }

        public function getConnection(){

            return  $this -> db_connect;
        }

        public function closeConnection(){

            $this -> db_connect = null;
            exit();

        }
    }
?>