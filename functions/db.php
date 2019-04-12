<?php

$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = '';
$db = 'php-blog';

$link = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error());
?>
