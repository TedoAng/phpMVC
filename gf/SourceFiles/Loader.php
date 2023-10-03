<?php

namespace GF;

final class Loader 
{
    private static $namespaces = [];

    private function __construct()
    {
        echo 'Loading';
        var_dump($this->namespaces);
    }

    public static function registerAutoload()
    {
        // pozvolqva da napravim custom autoloader proverqva se sled kato vgradeniq ne moje da se spravi.
        spl_autoload_register(["\GF\Loader", 'autoload']);
    }

    public static function autoload($class)
    {
        // self::loadClass($class);
    }

    public static function registerNamespace($namespace, $path)
    {
        $namespace = trim($namespace);
        if (strlen($namespace) > 0) {
            if (!$path) {
                throw new \Exception('Invalid path');
            }
            $_path = realpath($path);
            if($_path && is_dir($path) && is_readable($_path)) {
                self::$namespaces[$namespace] = $path . DIRECTORY_SEPARATOR;
            }else {
                throw new \Exception('Namespace directory read error:' . $path);
            }
        } else {
            //TODO
            throw new \Exception('Invalid namespace:' . $namespace);
        }
    }
}