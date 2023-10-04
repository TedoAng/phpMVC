<?php

namespace GF;

final class Loader 
{
    private static $namespaces = [];

    private function __construct()
    {
        echo 'Loading';
    }

    public static function registerAutoload()
    {
        // pozvolqva da napravim custom autoloader proverqva se sled kato vgradeniq ne moje da se spravi.
        spl_autoload_register(["\GF\Loader", 'autoload']);
    }

    public static function autoload($class)
    {
        self::loadClass($class);
    }

    /**
     * Includva podadeniq class za da e dostapen v App.php
     */
    public static function loadClass($class)
    {
        foreach (self::$namespaces as $k => $v) {
            if (strpos($class, $k) === 0) {
                $f = str_replace('\\', DIRECTORY_SEPARATOR, $class);
                $f = substr_replace($f, $v, 0, strlen($k)).'.php';
                $f =realpath($f);
                if ($f && is_readable($f)) {
                    include $f;
                } else {
                    throw new \Exception('File can not be included:'.$f);
                }
                break;
            }
        }
    }
    /**
     * method za registrirane na dopalnitelni namespaces
     */
    public static function registerNamespace($namespace, $path)
    {
        $namespace = trim($namespace);
        if (strlen($namespace) > 0) {
            if (!$path) {
                throw new \Exception('Invalid path');
            }
            $_path = realpath($path);
            if($_path && is_dir($path) && is_readable($_path)) {
                self::$namespaces[$namespace.DIRECTORY_SEPARATOR] = $path.DIRECTORY_SEPARATOR;
            }else {
                //TODO
                throw new \Exception('Namespace directory read error:' . $path);
            }
        } else {
            //TODO
            throw new \Exception('Invalid namespace:' . $namespace);
        }
    }

    public static function getNamespace($namespace)
    {
        return self::$namespaces;
    }

    public static function removeNamespace($namespace)
    {
        unset(self::$namespaces[$namespace]);
    }

    public static function clearNamespaces()
    {
        self::$namespaces = [];
    }
}