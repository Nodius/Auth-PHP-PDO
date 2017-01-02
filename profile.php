<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">
<?php
include "dbconnect.php";

$log=$_SESSION['log'];
$pas=$_SESSION['pas'];

$req1=$pdo->query("SELECT fio FROM users WHERE login='$log'");
$fio=$req1->fetchColumn();

$req2=$pdo->query("SELECT email FROM users WHERE login='$log'");
$email=$req2->fetchColumn();

echo "<div class='main3'><h1>Профиль пользователя</h1>
<h2>Ваш логин: $log</h2>
<h2>ФИО: $fio</h2>
<h2>Email: $email</h2>
<h2>Пароль: $pas</h2>";
?>
<form action="index.html">
<input type="submit" class="button" value="Назад">
</form>
</body>
</html>
