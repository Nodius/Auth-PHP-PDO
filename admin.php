<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">
<table class="table1">
    <tr>
        <td class='block1'>Логин</td>
        <td class='block2'>ФИО</td>
        <td class='block3'>Email</td>
        <td class='block4'>Пароль</td>
    </tr>
</table>

<?php
include "dbconnect.php";

$del1 = $_POST['del'];

$adm = $pdo2 -> query("SELECT login,fio,email,password FROM users");
$auth = $adm -> fetchAll();

foreach ($auth as $v) {
    echo "
    <table class='table2'>
  <tr>
    <td class='block1'>$v[0]</td>
    <td class='block2'>$v[1]</td>
    <td class='block3'>$v[2]</td>
    <td class='block4'>$v[3]</td>
  </tr>
</table>";
}

if(!empty('$del1')) {
    $adm1 = $pdo2->query("DELETE FROM users WHERE login = '$del1'");
}
?>

<h3 class="title1">Для удаления пользователя введите его логин (затем обновите страницу):</h3>
<form action="admin.php" method="post">
<p align="center"><input  type="text" size="20" name="del">
<input  type="submit" value="Удалить"></p>
</form>
</body>
</html>