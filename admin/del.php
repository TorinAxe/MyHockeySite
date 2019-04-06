<?php
session_start ();
header('Content-Type: text/html; charset=utf-8');
$mysqli = new mysqli ("localhost", "root", "", "tp15_Rubczov");
$id = $_GET['id'];
mysqli_query($mysqli, "DELETE FROM `items_list` WHERE `id`=$id");
mysqli_close($mysqli);
?>