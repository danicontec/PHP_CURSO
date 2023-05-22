<?php
//Dados los cambios realizados en PHP el codigo es una mezcla entre el curso y la API del lenguaje
    require("config.php");
    class Conexion extends mysqli{
        
        public function __construct(){
           parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);

           if(mysqli_connect_error()){
            die("Error de conexion ". mysqli_connect_errno(). " " . mysqli_connect_error());
           }
        } 
    }
?>