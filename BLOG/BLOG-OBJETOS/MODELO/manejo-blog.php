<?php

    require_once("blog-behavior.php");
    class ManejoObjetos{
        
        private $conexion;

        public function __construct($conexion){

            $this->setConexion($conexion);
        }

        public function setConexion(PDO $init){
            $this ->conexion = $init;
        }

        public function orderByDate(){

            $data = array();
            $i = 0;
            $resut = $this ->conexion-> query("SELECT * FROM CONTENIDO ORDER BY fecha DESC");

            while($row=$resut->fetch(PDO::FETCH_ASSOC)){

                $object_data = new Blog();
                $object_data->setId($row["ID"]);
                $object_data->setTitulo($row["TITULO"]);
                $object_data->setFecha($row["FECHA"]);
                $object_data->setComentario($row["COMENTARIO"]);
                $object_data->setImagen($row["IMAGEN"]);

                $data[$i] = $object_data;
                $i++;
            }
            return $data;
        }

        public function insertContent(Blog $object){
            $sql = "INSERT INTO CONTENIDO (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES('".$object->getTitulo()."','".$object->getFecha()."','".$object->getComentario()."','".$object->getImagen()."')";
            $this->conexion->exec($sql);
        }

    }

?>