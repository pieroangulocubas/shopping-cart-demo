<?php 
// Inicializacion de sesion de usuario
session_start();

// URL CONSTANTE
define("PORT","80");
define("BASEPATH","/shopping-cart/");
define("URL","http://localhost:".PORT.BASEPATH);

// Constantes para los paths de archivos
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",getcwd().DS);
define("APP",ROOT.'app'.DS);
define("INCLUDES",ROOT.'includes'.DS);
define("VIEWS",ROOT.'views'.DS);


define('ASSETS',URL.'assets/');
define('CSS',ASSETS.'css/');
define('JS',ASSETS.'js/');
define('IMAGES',ASSETS.'images/');
define('PLUGINS',ASSETS.'plugins/');

// CONSTANTES ADICIONALES
define('SHIPPING_COST',99.90);


// Funciones
require_once APP.'functions.php';