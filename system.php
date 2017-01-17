<?php
session_start();
include "dbconnect.php";
$log1=$_POST['login'];
$pas1=$_POST['pas'];
$hash=crypt('$pas1');

$_SESSION['log']=$log1;
$_SESSION['pas']=$pas1;

if(empty($log1)) {
	print "<h2>Не введен логин</h2>";
}
if(empty($pas1)) {
	print "<h2>Не введен пароль</h2>";
}
else {
	$req=$pdo->query("SELECT login FROM users WHERE login='$log1'");
	$rows=$req->fetchColumn();

	$req1=$pdo->query("SELECT password FROM users WHERE password='$pas1'");
	$rows1=$req1->fetchColumn();

	if($log1!==$rows) {
		print "<h2>Вы ввели неверный логин </h2>";

	}
	if($pas1!==$rows1) {
		print "<h2>Вы ввели неверный пароль</h2>";
	}
	else {
		print "<h1 align='center' class='title2'>Добро пожаловать, ".$log1."</h1>";
		print '<form action="admin.php">
               <p align="center"><input type="submit" value="Панель администратора" class="button"></p>
               </form>';
		print '<form action="profile.php" method="post">
               <p align="center"><input type="submit" value="Профиль пользователя" class="button"></p>
               </form>';
		print '<form action="index.html">
               <p align="center"><input type="submit" value="Назад" class="button"></p>
               </form>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Система</title>
</head>
<body class="bg">
</body>
</html>
