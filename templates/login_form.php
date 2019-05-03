<script src =".//js/main.js"></script>
<div id="login">
    <button class="close" onclick="closeLoginForm()">&#10006;</button>
    <form id="login_form">
        <input class="text_edit" id="username" name="username" type="text" value="" required placeholder="Имя пользователя"></br>
        <input class="text_edit" id="password" name="password" type="password" value="" required placeholder="Пароль"></br>
        <input type="button"     id="login_btn" class="btn lite_btn middle" value ="Войти"/>
        <p>Еще не зарегистрированы?<a href="javascript:PopUpShow()">Регистрация</a>!</p>
    </form>
    <div id ="regform"">
        <br id="register_form" action="">
            <input class="text_edit" id="username" name="username"  type="text" value="" placeholder="Имя пользователя" required ></br>
            <input class="text_edit" id="password" name="password"  type="password" value="" placeholder="Пароль"  required title=""></br>
            <!--<input class="text_edit" type="email" name="email" placeholder="Введите свою почту"></br>-->
            <img   id ="captcha"   src = "captcha.php"/><br>
            <span onclick="document.getElementById('captcha').src = 'captcha.php?' + Math.random()">&#8635;Обновить</span></br>
            <input class="text_edit" name="capcha"  placeholder="Введите текст с картинки"/></br>
            <p>Уже зарегистрированы? <a href="javascript:PopUpHide()">Введите имя пoльзователя</a>!</p>
        </form>
    </div>
</div>

<script>
        $(document).ready(function(){
        //Скрыть PopUp при загрузке страницы
        PopUpHide();
    });
    //Функция отображения PopUp
    function PopUpShow(){
        $("#regform").show();
        $("#login_form").hide();
    }
    //Функция скрытия PopUp
    function PopUpHide(){
        $("#regform").hide();
        $("#login_form").show();
    }
</script>

<script>
    $(document).ready(function(){

    }
</script>