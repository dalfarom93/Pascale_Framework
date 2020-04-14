<?php

class Autoloader
{

    /*
     * Metodo encargado de ejecutar el autocargador
     */
    public static function init()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    private static function autoload($classname)
    {
        if(is_file(CLASSES.$classname.'.php'))
        {
            require_once CLASSES.$classname.'.php';
        }elseif(is_file(CONTROLLERS.$classname.'.php')){
            require_once CONTROLLERS.$classname.'.php';
        }elseif (is_file(MODELS.$classname.'Model.php')){
            require_once MODELS.$classname.'Model.php';
        }

        return;
    }

}