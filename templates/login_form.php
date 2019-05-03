<script src =".//js/main.js"></script>
<div id="login" class ="selection_false">
    <button class="close" onclick="closeLoginForm()">&#10006;</button>
    <form id="login_form">
        <input class="text_edit" id="username" name="username" type="text" value="" required placeholder="Имя пользователя"></br>
        <input class="text_edit" id="password" name="password" type="password" value="" required placeholder="Пароль"></br>
        <input type="button"     id="login_btn" class="btn lite_btn middle" value ="Войти"/>
        <p>Еще не зарегистрированы?<a href="javascript:PopUpShow()">Регистрация</a>!</p>
    </form>
    <div id ="regform">
        <form id="register_form" action="">
            <input class="text_edit" id="reg_username" name="username"  type="text" value="" placeholder="Имя пользователя" required ></br>
            <input class="text_edit" id="reg_password" name="password"  type="password" value="" placeholder="Пароль"  required title=""></br>
            <input class="text_edit" id="reg_reppassword" name="password"  type="password" value="" placeholder="Повторите пароль"  required title=""></br>
            <!--<input class="text_edit" type="email" name="email" placeholder="Введите свою почту"></br>-->
            <div>
                <img  id ="captcha" src = "captcha.php"/>
                <span style="vertical-align:12px; font-size: 1.2em; cursor:pointer;" onclick="document.getElementById('captcha').src = 'captcha.php?' + Math.random()">&#8635;Обновить</span>
            </div>
            <input class="text_edit" name="capcha"  placeholder="Введите текст с картинки"/></br>
            <input type="button"     id="register_btn" class="btn lite_btn middle large_btn" value ="Регистрация"/></br>
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