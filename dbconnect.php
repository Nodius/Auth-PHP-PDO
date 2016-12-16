<?php
$host = 'localhost';
$db = 'reg';
$user = 'root';
$password = '';
$rpt = array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
$pdo = new PDO("mysql:host=$host;dbname=$db",$user,$password,$rpt);
$pdo1 = new PDO("mysql:host=$host;dbname=$db",$user,$password,$rpt);
$pdo2 = new PDO("mysql:host=$host;dbname=$db",$user,$password,$rpt);
?>