<?php
// Configuración de depuración
$debug = true;

// Si $debug es verdadero, se configuran las opciones para mostrar errores en pantalla.
if ($debug) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    // Si $debug es falso, se desactiva la visualización de errores en pantalla.
    error_reporting(0);
}

// Inclusión del archivo "autoload.php" desde el directorio "core"
include "core/autoload.php";

// Inicio del buffer de salida
ob_start();

// Inicio de la sesión
session_start();

// Si quieres que se muestren las consultas SQL, debes descomentar la siguiente línea.
// Core::$debug_sql = true;

// Creación de una instancia de la clase "Lb"
$lb = new Lb();

// Llamada al método "start" de la instancia de "Lb"
$lb->start();
?>
