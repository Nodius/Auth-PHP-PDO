<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table align="center">
    <tr>
        <td class='block1'>Логин</td>
        <td class='block2'>ФИО</td>
        <td class='block3'>Email</td>
        <td class='block4'>Пароль</td>
    </tr>
</table>

<?php
include "dbconnect.php";

$adm = $pdo2 -> query("SELECT login,fio,email,password FROM users");
$auth = $adm -> fetchAll();

foreach ($auth as $v) {
    echo "
    <table align='center'>
  <tr>
    <td class='block1'>$v[0]</td>
    <td class='block2'>$v[1]</td>
    <td class='block3'>$v[2]</td>
    <td class='block4'>$v[3]</td>
  </tr>
</table>";
}
?>
</body>
</html>