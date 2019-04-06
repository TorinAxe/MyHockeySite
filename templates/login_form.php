<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="login">
    <button class="close" onclick="closeLoginForm()">Х</button>
    <form action="check.php" method="post" name="login" xmlns="http://www.w3.org/1999/html"
          xmlns="http://www.w3.org/1999/html">
        <input class="input" id="username" name="username"size="20" type="text" value="" required placeholder="Имя пользователя"></br>
        <input class="input" id="password" name="password"size="20" type="password" value="" required placeholder="Пароль"></br>
        <img style="border: 1px solid gray; background: url('bg_capcha.png');" src = "captcha.php" width="120" height="40"/><br>
        <input  type="text" name="capcha" required placeholder="Введите текст с картинки"  />
        <p><button class="button btn middle" name="login"type= "submit" onclick="" >Войти</button></p>
        <p>Еще не зарегистрированы?<a href = register_form.html> Регистрация</a>!</p>
    </form>
</div>
