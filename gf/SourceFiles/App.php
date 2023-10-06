<?php

namespace GF;
include_once 'Loader.php';

class App 
{
   private static $_instance = null;
   private $_config = null;
   /**
    * @var \GF\FrontController
    */
   private $_frontController = null;

   private function __construct()
   {
     \GF\Loader::registerNamespace('GF', dirname(__FILE__).DIRECTORY_SEPARATOR);
     \GF\Loader::registerAutoload();
     $this->_config = \GF\Config::getInstance();
     if ($this->_config->getConfigFolder() == null) {
        $this->setConfigFolder('../config');
     }
   }
   
   public function run()
   {
    if ($this->_config->getConfigFolder() == null) {
      $this->setConfigFolder('../config');
    }
    $this->_frontController = \GF\FrontController::getInstance();
    $this->_frontController->dispatch();
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

   public function setConfigFolder($path)
   {
    $this->_config->setConfigFolder($path);
   }

   public function getConfigFolder()
   {
    // return $this->_configFolder;
   }
   /**
    * @return \GF\Config
    */
   public function getConfig() {
    return $this->_config;
   }
}