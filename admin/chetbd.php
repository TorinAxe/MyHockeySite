<?php
header('Content-Type: text/html; charset=utf-8');

$items = $_POST["items"];
$name = $_POST["name"];
$cost = $_POST["cost"];
$kol = $_POST["kol-vo"];
$discription = $_POST["discription"];


// Путь загрузки
$path = '../images/';

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Загрузка файла и вывод сообщения
    if (!@copy($_FILES['image']['tmp_name'], $path . $_FILES['image']['name']))
        echo 'Что-то пошло не так';
    else
        echo 'Загрузка удачна';
}

$image = $_FILES['tmp_name'];

$mysqli = new mysqli('localhost', 'root', '', 'tp15_Rubczov');
$query = "set names utf8";
$mysqli->query($query);


$query = "insert into items_list  (id_items_category ,  name, cost , quantity , discription , image ) values ( '$items','$name', '$cost' , '$kol' , '$discription', '$image' )";
$results = $mysqli->query($query);
if ($result=='TRUE')
{
    echo "Ошибка! Файлы не загруженный";
}
else {
    $_SESSION['admin_example'] = "$username";
    $otkuda = $_SERVER['HTTP_REFERER'];
    //echo $otkuda;
    header("Location: $otkuda");
}
?>