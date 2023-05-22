<?php
require("conexion-objeto-pdo.php");
    class ListPDO extends ConexionPDO{

        public function __construct(){
            parent::__construct();
        }

        public function getUsers($user){

            $sql = "SELECT * FROM USUARIOS WHERE USUARIO ='".$user."'";
            $query = $this->init->prepare($sql);
            $query -> execute(array());
            $result=$query -> fetchAll(PDO::FETCH_ASSOC);
            $query -> closeCursor();

                return $result;

        }

    }
?>