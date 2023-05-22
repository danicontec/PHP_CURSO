<?php
    require("conexion-objeto-mysqli.php");
    class ListItems extends Conexion{

        //En el constructor padre se llama a un constructor con parametros de la clase mysqli
        //estos parametros no hacen falta pasarselos, ya rellena los datos.
        //Al instanciar no recoge valores del usuario sino constantes de archivo PHP por eso no lleva parametros
        
        public function __construct(){
            parent::__construct();
        }

    //Esta funcion devuelve array multidimensional. Revisar implementacion en (database-return-objectlist)
        public function getItems(){
            $result = $this -> query("SELECT * FROM HOJA1");
            $list = $result -> fetch_all(MYSQLI_ASSOC);
            return $list;
        }
    }
?>