<?php
namespace GF;

class Config
{
    private static $_instance = null;
    private $_configArray = [];
    private $_configFolder = null;


    private function __construct()
    {
        
    }

    public function getConfigFolder()
    {
        return $this->_configFolder;
    }

    public function setConfigFolder($configFolder)
    {
        if (!$configFolder) {
            throw new \Exception('Empty config folder path: ');
        }
        $_configFolder = realpath($configFolder);
        if ($_configFolder != FALSE && is_dir($_configFolder) && is_readable($_configFolder)) {
            //clear old config data
            $this->_configArray = [];
            $this->_configFolder = $_configFolder . DIRECTORY_SEPARATOR;
        } else {
            throw new \Exception('Configuration directory read error: '.$configFolder);
        }
    }

    public function __get($name): array
    {
        if (!$this->_configArray[$name]) {
            $this->includeConfigFile($this->_configFolder . $name . '.php'); //https://nau4i.me/php/php-mvc-framework/364/mvc-framework-6-config1 11:55
        }
        if (array_key_exists($name, $this->_configArray)) {
            return $this->_configArray[$name];
        }
        return null;
    }

    public function includeConfigFile($path)
    {
        if (!$path) {
            throw new \Exception;
        }
        $_file = realpath($path);
        if ($_file != FALSE && is_file($_file) && is_readable($_file)) {
            $_basename = explode('.php', basename($_file))[0];
            include $_file;
            $this->_configArray[$_basename] = $cnf;
        } else {
            throw new \Exception('Config file read errror: '. $path);
        }
    }
    
    /**
     * 
     * @return \GF\Config
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new \GF\Config();
        }
        return self::$_instance;
    }
}