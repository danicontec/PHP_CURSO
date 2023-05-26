<?php
require("manage-database.php");
class ManageProducts extends GestionDatos {
     
    public function __construct(){
        parent::__construct();
    }

    public function showProducts(){
        
        $sql = "SELECT * FROM productos";
        $execute = $this -> conexion ->prepare($sql);
        $execute -> execute(array());
        $result = $execute ->fetchAll(PDO::FETCH_ASSOC);
        
        $execute -> closeCursor();
        return $result;
    }

    public function deleteProduct($idProduct){

        $sql = "DELETE FROM productos WHERE id = :id";
        $execute = $this -> conexion ->prepare($sql);
        $result = $execute -> execute(array(":id"=>$idProduct));

        if ($result){
            echo "<p>Se ha borrado el registro</p>";
        }

        else {
            return $result;
        }
         
    }

    public function insertProduct($nombre, $categoria, $precio, $disponible){
        
        $sql = "INSERT INTO PRODUCTOS(NOMBRE, CATEGORIA, PRECIO, DISPONIBLE) VALUES (:nombre, :categoria, :precio, :estado)";
        $execute = $this -> conexion ->prepare($sql);
        $result = $execute -> execute(array(":nombre"=>$nombre, ":categoria"=>$categoria, ":precio"=>$precio, ":estado"=>$disponible));
    
        if ($result){
            echo "<p>Se ha insertado el registro</p>";
        }
        else {
            return $result;
        }
    }

}
?>