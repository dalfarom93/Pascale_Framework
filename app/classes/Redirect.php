<?php


class Redirect
{

    private $location;

    /*
     * Metodo para redirigir al usuario
     */
    public static function to($location)
    {
        $self = new self();
        $self->location = $location;

        //si las cabeceras ya fueron enviadas
        if(headers_sent())
        {
            echo '<script type="text/javascript">';
            echo 'windows.location.href="'.URL.$self->location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.URL.$self->location.'"/>';
            echo '</noscript>';
            die();
        }

        //cuando pasamos una url externa a nuestro sitio
        if(strpos($self->location, 'http') !==  false)
        {
            headers('Location: '.$self->location);
            die();
        }

        //redirigir dentro de la app
        header('Location: '.URL.$self->location);
        die();
    }

}