<div id="templatemo_menu" class="ddsmoothmenu">
    <ul>
        <li><a class="main_menu_link" href="index.php?page=1" >Главная</a></li>
        <li class="divider"></li>
        <li><a class="main_menu_link" href="about.php">О нас</a></li>
        <li><a class="main_menu_link" href="contact.php">Контакты</a></li>
    </ul>
    <div class="user_control">
    <?php
        if(isset($_SESSION['username'])){
            echo '<span>Добро пожаловать, '.$_SESSION['username']."</span>
            <a href=\"shoppingcart.php\"><b>Ваша корзина</b><img src='./images/cart.png'/></a>";
            echo '<button class="shadow_btn" type="submit" onclick="location.href=\'exit.php\'">Выйти</button>';
        }
        else {
            include "templates/login_form.php";
            echo '<button onclick="showLoginForm()">Войти</button>';
        }
    ?>
    </div>
    <br style="clear: left" />
</div> <!-- end of templatemo_menu -->