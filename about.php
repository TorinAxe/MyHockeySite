<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "server/mysql_func.php";
include "templates/header.php";
include "templates/content_begin.php";
?>
        <h2 align = "center" >О компании</h2>
		<p>HockeyShop - ведущая онлайн-платформа в сфере хоккейной атрибутики в России и СНГ и частый победитель отраслевых наград.</p>
<?php
 include "templates/content_end.php";
include "templates/footer.php"
?>
