<?php

class errorController
{
    function __construct()
    {
    }

    public function index()
    {
        View::render('404');
    }
}