<?php

function to_object($array)
{
    return json_decode(json_encode($array));
}

function get_siteName()
{
    return 'Pascale Framework';
}