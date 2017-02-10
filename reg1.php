<?php
include "dbconnect.php";

$log1 = $_POST['log1'];
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$email = $_POST['email'];
$birth = $_POST['birthday'];

if(empty($log1)) {
    print "<h2>Вы не заполнили поле Логин </h2>";
    if(empty($pass)) {
        print "<h2>Вы не заполнили поле Пароль</h2>";
        if(empty($fio)) {
            print "<h2>Вы не заполнили поле ФИО </h2>";
            if(empty($email)) {
                print "<h2>Вы не заполнили поле Email </h2>";
                if(empty($birth)) {
                    print "<h2>Вы не заполнили поле Дата рождения </h2>";
                }
            }
        }
    }
}
if(!preg_match("/^[a-zA-Z0-9]+$/",$log1)) {
    print "Логин может состоять только из букв латинского алфавита и цифр";
}
elseif(strlen($log1) < 3 or strlen($log1) > 30) {
    print "Логин должен быть не меньше 3-х символов и не больше 30";
}
elseif(!preg_match("/^[a-zA-Z0-9]+$/",$pass)) {
    print "Пароль может состоять только из букв латинского алфавита и цифр";
}
elseif(strlen($log1) < 3 or strlen($log1) > 30) {
    print "Пароль должен быть не меньше 5 символов и не больше 20";
}
else {
    $auth1 = $pdo1 -> query("SELECT login FROM users WHERE login='$log1'");
    $dot1 = $auth1 -> fetchColumn();

    $auth2 = $pdo1 -> query("SELECT email FROM users WHERE email='$email'");
    $dot2 = $auth2 -> fetchColumn();

    if ($dot1 !== $log1) {
        if ($dot2 !== $email) {
            /*$hash=password_hash('$pass',PASSWORD_DEFAULT);*/
            $req = $pdo1 -> prepare("INSERT INTO users (login,password,fio,email,birthday) VALUES (:login,:password,:fio,:email,:birthday)");
            $req -> bindParam(':login', $log1);
            $req -> bindParam(':password', $pass);
            $req -> bindParam(':fio', $fio);
            $req -> bindParam(':email', $email);
            $req -> bindParam(':birthday',$birth);
            $req -> execute();
            print "<h2 class='title1'>Спасибо за регистрацию, " . $log1 . "</h2>";
        }
    }
    else
    {
        print "<h1 align='center'>Такой логин или email уже существует</h1>";
    }
}
?>