<?php
class MyClass {
    private $data = [];

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __call($name, $arguments)
    {
        echo "I'm in!";
    }
}

$obj = new MyClass();

$obj->tedo();

