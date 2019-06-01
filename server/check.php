<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if ($username == '') {
            unset($username);
        }
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == '') {
            unset($password);
        }
    }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($username) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $username = trim($username);
    $password = trim($password);
// подключаемся к базе
    include "mysql_func.php";// файл mysql_func.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя
    $result = mysqli_query($db, "SELECT id FROM users_list WHERE nick_name = '$username' and password = '$password'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['id'])) {
        exit ("введённый вами логин или пароль не совпадает . Проверьте правильность введенных вами данных.");
    } else {
        $_SESSION['username'] = "$username";
        exit("Joined");
    }
?>
