<?php
session_start ();
header('Content-Type: text/html; charset=utf-8');
if($_SESSION['admin_example'])
{
    $info = '<button class="btn middle" type="button" onclick="showLoginForm()"><a href="adminindex.php">Выход </a></button>';
}
else
{
    echo 'У вас недостаточно прав для просмотра данной информации! ';
    echo '<html> <head> <meta http-equiv="Refresh" content="2; URL=adminindex.php"> </head> <body> </body> </html>';
    exit;
}

$mysqli = new mysqli('localhost', 'root', '', 'tp15_Rubczov');
$mysqli->set_charset("utf8");
$query ="SELECT `id`, `id_items_category` , `name` , `cost` , `image` , `quantity`  FROM items_list";
$result = $mysqli->query($query);
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>ID</th><th>Id категории </th><th>Название</th><th>Цена</th><th>Картинка</th><th>Количество</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 7  ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}

?>

<html>
<head>
    <title>Админка</title>
</head>
<a href = "add.php">Добавить в БД </a>
</html>
