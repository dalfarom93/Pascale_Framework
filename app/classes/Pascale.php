<?php

class Pascale {

    /*
     * Atributos
     */
    private $framework  = 'Pascale Framework';
    private $version    = '0.0.1';
    private $uri        = [];


    /*
     * Metodo principal
     */
    function __construct()
    {
        echo "Ejecutando el constructor <br>";
        $this->init();
    }

    /*
     * Metodo para ejecutar cada metodo de forma consecutiva
     */
    private function init()
    {
        $this->init_session();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_autoload();
        $this->dispatch();
    }

    /*
     * Metodo para iniciar la sesion en el sistema
     */
    private function init_session()
    {
        if(!session_start())
        {
            session_start();
        }

        return;
    }

    /*
     * Metodo para cargar configuracion del sistem
     */
    private function init_load_config()
    {
        $file = 'pascale_config.php';
        if(!is_file('app/config/'.$file))
        {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }

        // Se carga archivo de configuracion
        require_once 'app/config/'.$file;

        return;
    }

    /*
     * Metodo para cargar todas las funciones del sistema y del usuario
     */
    private function init_load_functions()
    {
        $file = 'pascale_core_functions.php';
        if(!is_file(FUNCTIONS.$file))
        {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }

        // Se carga archivo de funciones core
        require_once FUNCTIONS.$file;

        $file = 'pascale_custom_functions.php';
        if(!is_file(FUNCTIONS.$file))
        {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }

        // Se carga archivo de funciones custom
        require_once FUNCTIONS.$file;

        return;
    }

    /*
     * Metodo que carga todos los archivos de forma automatica
     */
    private function init_autoload()
    {
        require_once CLASSES.'Db.php';
        require_once CLASSES.'Model.php';
        require_once CLASSES.'Controller.php';
        require_once CONTROLLERS.DEFAULT_CONTROLLER.'Controller.php';
        require_once CONTROLLERS.DEFAULT_ERROR_CONTROLLER.'Controller.php';

        return;
    }

    /*
     * Metodo para filtrar y descomponer los elementos de url y uri
     */
    private function filter_url()
    {
        if(isset($_GET['uri']))
        {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', strtolower($this->uri));
            return $this->uri;
        }
    }

    /*
     * Metodo para ejecutar y cargar de forma automatica el controlador solicitado por el usuario
     * su metodo y pasar parametros a el.
     */
    private function dispatch()
    {
        //filtrar
        $this->filter_url();

        //Controlador
        if(isset($this->uri[0]))
        {
            $currentController = $this->uri[0];
            //Se limpia el indice 0 del array uri
            unset($this->uri[0]);
        }else{
            $currentController = DEFAULT_CONTROLLER; //home
        }

        //ejecucion del controlador
        //verificar que exista el controlador solicitado
        $controller = $currentController.'Controller';
        if(!class_exists($controller))
        {
            $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
        }

        print_r($this->uri);
        echo $controller;;
    }

}