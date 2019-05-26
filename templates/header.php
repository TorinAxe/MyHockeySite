<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hockey Shop</title>
    <meta name="keywords" content="web store, free templates, website templates, CSS, HTML" />
    <meta name="description" content="Web Store Theme - free CSS template provided by templatemo.com" />
    <link href="css/main_style.css" rel="stylesheet" type="text/css" />
    <link href="css/animations.css" rel="stylesheet" type="text/css" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/ddsmoothmenu.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Kelly+Slab|Ruslan+Display" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/dynamicsite.js"></script>

</head>

<body id="home" class="flex_container">
<?php include "templates/module.php"; ?>

<div id="header_wrapper">
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
                        echo '<a href="personal_account.php">Личный кабинет</a>  
                        <a href="shoppingcart.php"><b>Ваша корзина</b><img src="./images/cart.png"/></a>';
                        echo '<button class="shadow_btn" type="submit" onclick="location.href=\'exit.php\'">Выйти</button>';
                    }
                    else {
                        include "templates/login_form.php";
                        echo '<span></span>';
                        echo '<button class="shadow_btn" onclick="showLoginForm()">Войти</button>';

                    }
                ?>
        </div>
        <br style="clear: left" />
    </div>
</div>