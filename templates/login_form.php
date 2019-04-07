<div id="login">
    <button class="close" onclick="closeLoginForm()">Х</button>
    <form id="login_form" action="" method="post" name="login">
        <input class="text_edit" id="username" name="username" type="text" value="" required placeholder="Имя пользователя"></br>
        <input class="text_edit" id="password" name="password" type="password" value="" required placeholder="Пароль"></br>
        <img class="captcha" src = "captcha.php"/><br>
        <input  type="text_edit" name="capcha" required placeholder="Введите текст с картинки"  />
        <p><button id="#login_btn" class="button btn middle" name="login">Войти</button></p>
        <p>Еще не зарегистрированы?<a href = register_form.html> Регистрация</a>!</p>
    </form>
</div>
