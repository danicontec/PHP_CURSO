 <?php
    /* Al generar una cookie hay que especificar el tiempo de vida
     para que no desaparezca por defecto al cerrar el navegador, operando con la funcion time se encarga de eso en segundos */
    setcookie("prueba", "Esta es la primera cookie", time()+10,".");
    //En este caso la cookie durara 10 segundos, si se actualiza o cierra el navegador desaparecera. setcookie(clave, valor, tiempo)
    // Si el tiempo que transcurre es superior a 10 segundos al actualizar desaparecera la cookie
    if(isset($_COOKIE["prueba"])){

        echo $_COOKIE["prueba"];

    }

    //Otra forma es indicarle a la cookie el ámbito en el que actua, creando otro parametro de ruta

     setcookie("prueba2", "Esta es la segunda cookie", time()+10, "/");
    //Con la funcion de arriba aunque la cookie haya sido creada aqui, actuara otra ruta, en este caso en toda la raiz
    echo "<a href='../index'><button>Index</button></a>";
 ?>