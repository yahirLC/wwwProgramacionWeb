<?php
// autoload.php
// [creado] 10 de octubre de 2014
// [reconstruido] 9 de abril de 2016
// Esta función elimina la necesidad de agregar manualmente los modelos.

// Definición de la función de carga automática
function my_autoload($modelname) {
    // Verifica si la clase existe utilizando un método estático "exists" en la clase "Model"
    if (Model::exists($modelname)) {
        // Incluye el archivo de la clase utilizando un método estático "getFullPath" en la clase "Model"
        include Model::getFullPath($modelname);
    }
}

// Registra la función de carga automática "my_autoload" con la pila de autocarga de PHP
spl_autoload_register("my_autoload");
?>
