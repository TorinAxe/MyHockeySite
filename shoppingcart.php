<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "./functions/mysql_func.php";
include "./templates/header.php";
include "./templates/menu.php";
include "./templates/content_begin.php";
?>
<?php
echo '

<body onload="showMyCart()">
<div class = "in-check" id = "in-check">
    <!--<table width="700px" cellspacing="0" cellpadding="5">
        <tr bgcolor="#CCCCCC">
            <th width="90" align="center">Изображение</th>
            <th width="110" align="center">Назание Фильма</th>
            <th width="90" align="center">Режисер</th>
            <th width="90" align="center">Страна</th>
            <th width="90" align="center">Цена</th>
            <th width="90"> </th>
        </tr>
    </table>
</div>-->
</body>'
?>
<?php
include "./templates/content_end.php";
include "./templates/footer.php";
?>
