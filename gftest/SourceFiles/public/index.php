<?php
include '../../../gf/SourceFiles/App.php';
$app = \GF\App::getInstance();
$config = \GF\Config::getInstance();
$config->setConfigFolder('../config');
$app->run();
