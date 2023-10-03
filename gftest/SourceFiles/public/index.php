<?php
include '../../../gf/SourceFiles/App.php';
$app = \GF\App::getInstance();
\GF\Loader::registerNamespace('Test', '~/../../models');
$app->run();

// $sub = new \GF\Test();
// $symm = new \Symfony\Component\User();

// var_dump($symm->name);

$symm = new \Test\Models\User();

var_dump($symm->name);
