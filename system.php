<?php
session_start();
include "dbconnect.php";

$log1 = $_POST['login'];
$pas1 = $_POST['pas'];
$_SESSION['log'] = $log1;
$_SESSION['pas'] = $pas1;
$back = $_SERVER['HTTP_REFERER'];

if(empty($log1)) {
	echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
  </head>
</html>";
}
if(empty($pas1)) {
	echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
  </head>
</html>";
}
else {
	$req = $pdo -> query("SELECT login,password FROM users WHERE login='$log1'");
	$req -> execute();
	$rows = $req -> fetch();

	if($log1 !== $rows[0]) {
		print "<h2 align='center'>Вы ввели неверный логин </h2>";
	}
	if($pas1 !== $rows[1]) {
		print "<h2 align='center'>Вы ввели неверный пароль</h2>";
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
