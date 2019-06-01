<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$a= $_POST['capcha'];
if($_POST['capcha'] != $_SESSION['capcha'])
    exit ("Текст с картинки введен не верно!");
else {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if ($username == '') {
            unset($username);
        }
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) {
        $password = ($_POST['password']);
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
    include "functions/mysql_func.php";// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
    // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db, "SELECT id FROM users_list WHERE nick_name ='$username'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    // если такого нет, то сохраняем данные
    $result2 = mysqli_query($db, "INSERT INTO users_list (nick_name,password) VALUES('$username','$password')");
    // Проверяем, есть ли ошибки
    if ($result2 == 'TRUE') {
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../index.php'>Главная страница</a>";
    } else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
}
    ?>