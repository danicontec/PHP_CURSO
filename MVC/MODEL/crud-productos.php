<?php

    /*Este archivo usa un CRUD completo, aunque no se usen todos los métodos,
    si se desea escalar la aplicacion se puede hacer basandonos en el CRUD de este repositorio*/
    require("conexion.php");
    class Productos_model extends Conecta{

        public function __construct(){
            parent::__construct();
        }

        public function showProducts(){
        
            $sql = "SELECT * FROM productos";
            $execute = $this -> init ->prepare($sql);
            $result = $execute ->execute();
    
            if($result){
                $data = $execute ->fetchAll(PDO::FETCH_ASSOC);
                $execute -> closeCursor();
                return $data;
            }
            
        }
    
        public function deleteProduct($idProduct){
    
            $sql = "DELETE FROM productos WHERE id = :id";
            $execute = $this -> init ->prepare($sql);
            $result = $execute -> execute(array(":id"=>$idProduct));
    
            if ($result){
                echo "<p>Se ha borrado el registro con ID: $idProduct</p>";
            }
    
            else {
                return $result;
            }
             
        }
    
        public function insertProduct($nombre, $categoria, $precio, $disponible){
            
            $sql = "INSERT INTO PRODUCTOS(NOMBRE, CATEGORIA, PRECIO, DISPONIBLE) VALUES (:nombre, :categoria, :precio, :estado)";
            $execute = $this -> init ->prepare($sql);
            $result = $execute -> execute(array(":nombre"=>$nombre, ":categoria"=>$categoria, ":precio"=>$precio, ":estado"=>$disponible));
        
            if ($result){
                echo "<p>Se ha insertado el registro</p>";
            }
            else {
                return $result;
            }
        }
    
        public function updateProduct($id, $nombre, $categoria, $precio, $disponible){
            $sql = "UPDATE PRODUCTOS SET NOMBRE = :nombre, CATEGORIA = :categoria, PRECIO = :precio, DISPONIBLE = :estado WHERE ID = :id";
            $execute = $this -> init ->prepare($sql);
            $result = $execute -> execute(array(":nombre"=>$nombre, ":categoria"=>$categoria, ":precio"=>$precio, ":estado"=>$disponible, ":id"=>$id));
        
            if ($result){
                echo "<p>Se ha actualizado el registro con ID: $id</p>";
            }
            else {
                return $result;
            }
        }
    
        public function paginaProductos($inicio, $fin){
            $sql = "SELECT * FROM PRODUCTOS LIMIT $inicio, $fin";
            $execute = $this -> init ->prepare($sql);
            $result = $execute -> execute(array());
    
            if($result){
                return $execute -> fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
?>