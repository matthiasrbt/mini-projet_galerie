<?php namespace Configuration;

class Config
{
    public static function get()
    {
        return array('default_controller' => 'GaleryController',
            'default_method'  => 'accueilGalery',
            'namespace' => 'Controllers');
    }
}