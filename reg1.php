<?php
include "dbconnect.php";

$log1 = $_POST['log1'];
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$email = $_POST['email'];

if(empty($log1)) {
    print "<h2>Вы не заполнили поле Логин </h2>";
    if(empty($pass)) {
        print "<h2>Вы не заполнили поле Пароль</h2>";
        if(empty($fio)) {
            print "<h2>Вы не заполнили поле ФИО </h2>";
            if(empty($email)) {
                print "<h2>Вы не заполнили поле Email </h2>";
            }
        }
    }
}
else {
    $auth1 = $pdo1->query("SELECT login FROM users WHERE login='$log1'");
    $dot1 = $auth1->fetchColumn();

    $auth2 = $pdo1->query("SELECT email FROM users WHERE email='$email'");
    $dot2 = $auth2->fetchColumn();

    if ($dot1 == $log1) {
        if ($dot2 == $email) {
            echo "<h1>Такой логин или email уже существует</h1>";
        }
    }
    if ($dot1 !== $log1) {
        if ($dot2 !== $email) {
            $req = $pdo1->prepare("INSERT INTO users (login,password,fio,email) VALUES (:login,:password,:fio,:email)");
            $req->bindParam(':login', $log1);
            $req->bindParam(':password', $pass);
            $req->bindParam(':fio', $fio);
            $req->bindParam(':email', $email);
            $req->execute();
            print "<h2>Спасибо за регистрацию, " . $log1 . "</h2>";
        }
    }
}
?>