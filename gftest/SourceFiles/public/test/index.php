<?php
$mystring = 'C:\Users\PC\Documents\PlayGround\phpMVC\gf\SourceFiles';
$findme   = 'C:\Users';
$pos = strpos($mystring, $findme);

if (null === 0) {
    echo "True";
} else {
    echo "Error";
}