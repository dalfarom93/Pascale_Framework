<?php

/*
 * Identificar el entorno de ejecucion
 * devuelve TRUE si es local o False si es re remoto
 */
define('PRODUCTION', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

/*
 * Definir uso horario o timezone del sistema
 */
date_default_timezone_set('America/Santiago');

/*
 * Lenguaje de la aplicacion
 */
define('LANG', 'es');

/*
 * Ruta base del proyecto
 */
define('BASE_PATH', PRODUCTION ? '/' : '____EL BASEPATH EN PRODUCCION____');

/*
 * Sal del sistema
 */
define('AUTH_SALT', 'PascaleFramework');

/*
 * Puerto y Url del sitio
 */
define('PORT', '80');
define('URL', PRODUCTION ? 'http://127.0.0.1:' . PORT . '' : '____URL PRODUCCION____');

/*
 * Rutas de directorios y archivos
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);

define('APP', ROOT . 'app' . DS);
define('CLASSES', APP . 'classes' . DS);
define('CONFIG', APP . 'config' . DS);
define('CONTROLLERS', APP . 'controllers' . DS);
define('FUNCTIONS', APP . 'functions' . DS);
define('MODELS', APP . 'models' . DS);

define('TEMPLATES', ROOT . 'templates' . DS);
define('INCLUDES', TEMPLATES . 'includes' . DS);
define('MODULES', TEMPLATES . 'modules' . DS);
define('VIEWS', TEMPLATES . 'views' . DS);

/*
 * Rutas relativas
 */
define('ASSETS', URL . 'assets/');
define('CSS', ASSETS . 'css/');
define('FAVICON', ASSETS . 'favicon/');
define('FONTS', ASSETS . 'fonts/');
define('IMAGES', ASSETS . 'images/');
define('JS', ASSETS . 'js/');
define('PLUGINS', ASSETS . 'plugins/');
define('UPLOADS', ASSETS . 'uploads/');

/*
 * Credenciales base de datos
 */
//Local
define('LDB_ENGINE', 'mysql');
define('LDB_HOST', 'localhost');
define('LDB_NAME', 'framework');
define('LDB_USER', 'root');
define('LDB_PASS', '');
define('LDB_CHARSET', 'utf8');

//Produccion
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'framework');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

//Controlador por defecto
define('DEFAULT_CONTROLLER', 'home');
//Metodo de error por defecto
define('DEFAULT_ERROR_CONTROLLER', 'error');
//Metodo por defecto
define('DEFAULT_METHOD', 'index');