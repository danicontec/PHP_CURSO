<?php
    require_once("conect.php");
    class ManageImages extends Conexion{

        public function __construct(){

            parent::__construct();

        }

        public function insertImageProduct($nombre, $tipo, $contenido){

            $sql = "INSERT INTO ARCHIVOS (NOMBRE, TIPO, CONTENIDO) VALUES (:nombre, :tipo, :contenido)";
            $stmt = $this -> db_connect -> prepare($sql);
            $result = $stmt -> execute(array(":nombre"=>$nombre, ":tipo"=>$tipo, ":contenido"=>$contenido));

            if ($result){
                $stmt -> closeCursor();
                echo "<p>Datos actualizados correctamente</p>";
            }
            else{
                echo "<p>Fallo en insercion de datos</p>";
            }
        }

        public function deleteImageProduct($id){

            $sql = "DELETE FROM ARCHIVOS WHERE ID=:id";
            $stmt = $this -> db_connect -> prepare($sql);
            $result = $stmt -> execute(array(":id"=>$id));
            if($result){
                echo "<p>Se ha borrado el registro con id $id</p>";
            }
        }

        public function updateImageProduct($id, $nombre, $tipo, $contenido){

            $sql= "UPDATE ARCHIVOS SET ID=:id, NOMBRE=:nombre, TIPO=:tipo, CONTENIDO=:contenido";
            $stmt = $this -> db_connect -> prepare($sql);
            $result = $stmt -> execute(array(":id"=>$id, ":nombre"=>$nombre, ":tipo"=>$tipo, ":contenido"=>$contenido));

            if ($result){
                $stmt -> closeCursor();
                echo "<p>Registros actualizados correctamente</p>";
            }
            else{
                echo "<p>Fallo al insertar los registros</p>";
            }

        }

        public function showImageProducts(){
            $sql = "SELECT * FROM ARCHIVOS";
            $stmt = $this -> db_connect -> prepare($sql);
            $result = $stmt -> execute();

            if($result){

                $list = $stmt -> FetchAll(PDO::FETCH_ASSOC);
                $stmt -> closeCursor();
                return $list;

            }
        }
    }

?>