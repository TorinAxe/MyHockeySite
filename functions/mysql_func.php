<?php
$db_location = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "tp15_Rubczov";


$db = mysqli_connect ($db_location, $db_user, $db_password, $db_name);

$query = "set names utf8";
$db->query($query);
if (mysqli_connect_errno())
{
    echo "Ошибка подключения к базе данных:(".mysqli_connect_errno().'): '.mysqli_connect_error();
}

function getSQLTable($target_data, $from, $ysl)//получить таблицу данных
{
    global $db;
    return mysqli_query($db, "SELECT ".$target_data." FROM ".$from." WHERE ".$ysl);
}

function getSQLTable2($target_data, $from)//получить таблицу данных
{
    global $db;
    return mysqli_query($db, "SELECT '$target_data' FROM '$from'");
}

function getTableAsArray($target_data, $from, $ysl)//получить таблицу из базы данных как массив
{
    global $db;
    return mysqli_fetch_array(mysqli_query($db, "SELECT " . $target_data . " FROM " . $from . " WHERE " . $ysl));
}

function getLineCount($table_name){
    global $db;
    $result = mysqli_query($db, "SELECT COUNT(*) FROM '$table_name'");
    echo $result;
    return $result;
}

function hasNext($SQL_Table)//Получить следующую строку итерируемой таблицы
{
    return mysqli_fetch_assoc($SQL_Table);
}
?>