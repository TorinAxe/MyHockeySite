<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "./server/mysql_func.php";
include "./templates/header.php";
include "./templates/content_begin.php";
include "./templates/module.php";
?>

<div  class ="selection_false">
<form id="pas_form">
    <h2>Смена пароля</h2>
    <input class="text_edit" type="password" name="newpas"  id="reg_password" required placeholder="Новый пароль" /><br>
    <input class="text_edit" type="password" name="newpas1" id ="reg_reppassword"  required placeholder="Повторите пароль"/> <br>
    <input type="button"     id="pass_btn" class="btn lite_btn middle large_btn" value ="Сменить пароль"/></br>
</form>
</div>
<?php
include "./templates/content_end.php";
include "./templates/footer.php";
?>
