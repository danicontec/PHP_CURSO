<?php
        $name = $_POST["usuario"];
        $age = $_POST["edad"];

        if(isset($_POST["enviar"])){
            
            if ($name == "Dani"){
            echo "<p class='yes'>Puedes entrar</p>";
            }
             else {
            echo "<p class='no'>No puedes entrar</p>";
            }
        
        }
        
        ?>