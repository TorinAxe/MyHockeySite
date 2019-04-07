<div id="login">
    <button class="close" onclick="closeLoginForm()">&#10006;</button>
    <form id="login_form">
        <input class="text_edit" id="username" name="username" type="text" value="" required placeholder="Имя пользователя"></br>
        <input class="text_edit" id="password" name="password" type="password" value="" required placeholder="Пароль"></br>
        <img   class="captcha"   src = "captcha.php"/><br>
        <input class="text_edit" name="capcha" required placeholder="Введите текст с картинки"/></br>
        <input type="button"     id="login_btn" class="btn lite_btn middle align_center" value ="Войти"/>
        <p>Еще не зарегистрированы?<a href = register_form.html> Регистрация</a>!</p>
    </form>
</div>
