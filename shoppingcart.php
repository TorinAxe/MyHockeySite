<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "./server/mysql_func.php";
include "./templates/header.php";
include "./templates/content_begin.php";
?>
<?php
echo '
<body onload="showMyCart()">
    <div class = "in-check" id = "in-check"> </div>
</body>'
?>
<?php
include "./templates/content_end.php";
include "./templates/footer.php";
?>
