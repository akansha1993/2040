<?php header('Access-Control-Allow-Origin: *'); ?>
<?php header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'); ?>
<?php header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT'); ?>
<?php

$SERVER='localhost';
//$USERNAME='healthca_heal';
$USERNAME='healthca_heal';
//$PASSWORD='3y.i&6MaD)y@';
$PASSWORD='';
$DB='healthca_health';

$con=mysqli_connect($SERVER,$USERNAME,$PASSWORD,$DB) or die ("could not connect to mysql");;

