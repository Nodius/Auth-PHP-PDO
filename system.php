<?php
include "dbconnect.php";

$log1=$_POST['login'];
$pas1=$_POST['pas'];

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
		print "<h1>Добро пожаловать,".$log1."</h1>";
		print '<form action="admin.php">
               <p align="center"><input type="submit" value="Панель администратора"></p>
               </form>';
		print '<form action="index.html">
               <p align="center"><input type="submit" value="Назад"></p>
               </form>';
	}
}
?>


