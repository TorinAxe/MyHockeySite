<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "./functions/mysql_func.php";
include "./templates/header.php";
include "./templates/content_begin.php";
?>
<?php
include "./templates/content_end.php";
include "./templates/footer.php";
?>
