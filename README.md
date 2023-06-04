# PHP_CURSO
Practicas hechas en lenguaje PHP de curso pildoras informaticas: [Curso PHP](https://www.pildorasinformaticas.es/course/php-mysql/)

Mi práctica del curso fue terminada el 4 de Junio de 2023, actualizando el código respecto a la API de **PHP**, y utilizando otra manera de hacer las cosas. Puedes usarlo como referencia pero te recomiendo que en base a esta referencia busques tu manera y lógica de hacer las cosas basandote en el material de [Pildoras Informaticas](https://www.pildorasinformaticas.es/course/php-mysql/). Están todas las prácticas hechas y comentadas, usando nombres intuitivos para encontrarlas mejor y divididas las secciones mas complicadas por carpetas. **Si encuentras errores o tienes cualquier sugerencia a cambios mandame un pull request o contacta conmigo, lo revisaré lo antes posible**.

Para continuar con mas prácticas con framework puedes basarte en: [Repositorio Laravel](https://github.com/danicontec/LARAVEL_CURSO).

## Actualizaciones

**1.** El curso esta actualizado a modo personal dados los siguientes aspectos:

- El lenguaje PHP ha evolucionado a lo largo de los años y he tenido que actualizar métodos de realizar ciertas tareas.

- La carpeta de objetos contiene las clases relacionadas entre si, el código ha sido cambiado en gran parte dado los cambios de las características del lenguaje respecto a la salida del curso. Leer con atención los comentarios👀.

- Algunas anotaciones personales que no aparecen en el curso, van de la mano de mi conocimiento de POO, para mas detalles podeis visitar: [Objetos](https://profile.es/blog/que-es-la-programacion-orientada-a-objetos/), es una de tantas referencias, si aun asi no se entiende, recomiendo hacer un curso sobre el tema antes de abordar cualquier lenguaje que trabaje con objetos.

- Las partes visuales de CSS no están relacionadas con el curso, son de conocimiento personal y no estan en todos los ejemplos, para mantener la lógica de los códigos y el repaso de la manera mas clara posible.

**2.** Es un curso de solamente PHP, las utilidades de Framework seran vistas en otro repositorio. 

- ~~ Se actualizará en este apartado el link llegado el momento.~~ [Repositorio Laravel](https://github.com/danicontec/LARAVEL_CURSO).

**3.** Este repositorio está adaptado solo para logiga de PHP, no tiene otro fin. Así me es mas fácil apreciar las diferencias con mis conocimientos de otros lenguajes a traves de comentarios personales.

**4.** La base de datos de prueba y distintas tablas, estan insertadas en el repositorio, en la carpeta **Database**. Uso phpmyadmin con gestor de datos MySQL , el servidor que estoy usando es [WAMP](https://www.wampserver.com/en/).

- Importar los archivos sin modificar los parámetros del servidor para que funcionen. Si se hace modificaciones cambiar los parametros en los distintos archivos del código o no funcionaran los ejemplos.

- Si existe cualquier duda sobre los scripts puedes contactar conmigo, ya que pongo ejemplos personalizados en base a los ejemplos de este curso aplicando también conocimientos propios.

**5.** Hay un simulacro de **sesiones** y **cookies** usando **objetos** en la subcarpeta dentro de la carpeta de **sesiones**, se mezcla conocimientos de las 3 cosas.

**6.** En la carpeta de **CRUD**, hay un ejemplo donde se juntan tanto el manejo de archivos CRUD, como lógica aplicada y vista en el curso. Si hay dudas con el código ya que es diferente al tratado en el curso original, puedes contactar conmigo y te aclaro la lógica que he aplicado a mi ejemplo de CRUD. Espero que te sea de ayuda 😊.

**7.** En la carpeta de MVC no es exactamente teoria de PHP como tal, es aplicación de un patrón de diseño. El código es muy parecido y se usa **CRUD** para acceder a estos datos. Para más información sobre esto puedes visitar: [Patrones de diseño](https://refactoring.guru/es/design-patterns/what-is-pattern). Tampoco se ha puesto hincapié en el **CSS**, para ver el código de la manera más clara posible. Para practicar esa parte en base al proyecto en PHP, se puede observar lo realizado en el aparado de **CRUD** y basarse en ello. ¡Atrévete a ponerle tus propios estilos, solo aprenderás practicando 🚀!

**8.** Si te es útil este repositorio, agradecería que dejaras alguna estrella y compartieras con mas gente💥!!

## Warnings

**1.** Trabajando con XAMP y gestor de datos MySQL hay una curiosidad con importaciones usando la clase **PDO** de PHP. El puntero de inserción de datos se mantiene inmediatamente después de haber insertado datos con un archivo en formato **Open Document**, por lo que las inserciones se hacen en la misma fila. Esto cambia el orden de inserción completamente.

- Entorno: **Xamp 3.3.0, MySQL 8.0.31, PHP(8.1.13 , 8.2.0), Windows 10, Chrome 113.0.5672.127**

**2.** En el archivo de **database-login-check** que está en la raíz, hay que remodelar el procedimiento almacenado o la manera de hacer las consultas para dar una respuesta acertada al usuario en función de la lógica que se quiera sacar. Ya que no redirige pero a la hora de insertar solo da una salida. En un futuro tocaré este tema, si antes se te ocurre algo y me quieres hacer un **pull request**, estaré encantado de revisarlo. Sino, en un futuro volveré a ello.

**3.** En directorio de **CRUD** al actualizar los registros de la tabla de productos, hace la tarea e imprime mensaje, pero no actualiza de manera inmediata la tabla. Se podría hacer por ejemplo con AJAX, pero a vistas de ser un curso de repaso y práctica no ensuciaré el codigo a no ser que sea estrictamente necesario. Si encuentro una funcion en PHP que no redirija el link, solamente actualice parte del HTML, la implementaré. Mientras tanto, se pueden comprobar los datos navegando con los botones.

**4.** ~~La paginacion del archivo de CRUD por alguna razon no esta pillando el GET, en breves lo mirare y cuando este arreglado editare este punto. Si encuentras una solcion en base al codigo antes que yo espero tu pull request 💪🏽.~~

-Solucionado: Se pasa los valores de las paginas y los registros por sesion para no dar conflicto con los envios del formulario. El select desaparece una vez cambiada la página, hay otro select comentado en el código ya que los valores cambian solo al cambiar de página, y es mas intuitivo darle al boton de paginación de nuevo.