<?php
error_reporting(E_ALL ^ E_WARNING);
include '../../../gf/SourceFiles/App.php';

$app = \GF\App::getInstance();

$app->run();
