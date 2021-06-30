<?php 
$host='localhost';
$db='locadora_db';
$user='root';
$pass='';

$con = new PDO ("mysql:host=$host;dbname=$db", $user, $pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>