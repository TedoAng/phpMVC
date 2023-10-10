<?php


if (!isset($_COOKIE['Q'])) {
    for ($i=0; $i < 10; $i++) { 
        $A [] = $i;
    }
    $Serialized_array = serialize($A);
    setcookie("Q", $Serialized_array, time()+7200);
    unset($A);
} else {
    $A = unserialize($_COOKIE['Q']);

    foreach($A as $v) echo "$v ";
}