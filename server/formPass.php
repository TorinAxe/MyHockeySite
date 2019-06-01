<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$a = $_SESSION['username'];
if (isset($_POST['newpas'])) {
    $password = $_POST['newpas'];
    if ($password == '') {
        unset($password);
    }
}
if (empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$a = stripslashes($a);
$a = htmlspecialchars($a);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$a = trim($a);
$password = trim($password);
include "functions/mysql_func.php";
$result = mysqli_query($db, "UPDATE users_list SET password ='$password' WHERE nick_name = '$a'");
?>

