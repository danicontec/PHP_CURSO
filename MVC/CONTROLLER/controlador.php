<?php

    //Este archivo se encarga de conectar el codigo de la parte de Modelo a la vista.

    require_once("MODEL/crud-productos.php");
    $productos = new Productos_model();
    $product_data = $productos ->showProducts();
    require_once("VIEW/view-response.php");

?>