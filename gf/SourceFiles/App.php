<?php

namespace GF;
include_once 'Loader.php';

class App 
{
   private static $_instance = null;

   private function __construct()
   {
     echo dirname(__FILE__).DIRECTORY_SEPARATOR;
     \GF\Loader::registerNamespace('GF', dirname(__FILE__).DIRECTORY_SEPARATOR);
     \GF\Loader::registerAutoload();
   }
   
   public function run()
   {
//     echo "ok";
   }
   /**
    * @return \GF\App
    */
   public static function getInstance()
   {
     if (self::$_instance == null) {
          self::$_instance = new \GF\App();
     }

     return self::$_instance;
   }
}