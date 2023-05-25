<?php
require("database-object.php");
    class ReturnUsers extends Data{

        public function __construst(){

            parent::__construct();
        }

        public function getUser($user, $pass){

            $sql = "SELECT * FROM USERDATA DATA WHERE USUARIO = '$user' AND CONTRASEÑA = '$pass'";
            $stmt = $this->init->prepare($sql);
            $result = $stmt->execute();

            if($result){
                $valor = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(sizeof($valor)==1){
                    return $user;
                }
            } else {
                echo "Hubo un problema con su usuario, contacte con el administrador";
            }
        }
    }
?>