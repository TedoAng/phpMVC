<?php
error_reporting(E_ALL ^ E_WARNING);
include '../../../gf/SourceFiles/App.php';

$app = \GF\App::getInstance();
$config = \GF\Config::getInstance();
$config->setConfigFolder('../config');
echo $config->db['key'];

$app->run();
