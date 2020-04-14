<?php

class homeController
{
    function __construct()
    {
    }

    public function index()
    {
        $data = ['titulo' => 'Pascale Framework'];

        View::render('pascale', $data);
    }


}