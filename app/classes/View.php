<?php


class View
{

    public static function render($view, $data = [])
    {
        //Convertir array en objeto
        $d = to_object($data);

        if(!is_file(VIEWS.CONTROLLER.DS.$view.'View.php'))
        {
            die(sprintf('No existe la vista %sView en el directorio %s', $view, CONTROLLER));
        }

        require_once VIEWS.CONTROLLER.DS.$view.'View.php';
        exit();
    }

}