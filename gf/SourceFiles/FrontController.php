<?php

namespace GF;

class FrontController
{
    private static $_instance = null;


    private function __construct()
    {

    }

    public function dispatch()
    {
        
    }

    /**
     *
     * @return \GF\FrontController
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new \GF\FrontController();
        }
        return self::$_instance;
    }
}