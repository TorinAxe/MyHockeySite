<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include "functions/mysql_func.php";
include "templates/header.php";
include "templates/middle.php";
include "templates/content_begin.php";
include "templates/content.php";
include "templates/content_end.php";
include "templates/footer.php";
?>