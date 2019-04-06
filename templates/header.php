<?
include "as.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hockey Shop</title>
    <meta name="keywords" content="web store, free templates, website templates, CSS, HTML" />
    <meta name="description" content="Web Store Theme - free CSS template provided by templatemo.com" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/ddsmoothmenu.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>

</head>

<body id="home">
<div id="templatemo_wrapper">
    <div id="templatemo_header">
        <div id="site_title"><h1><a href="index.php?page=1"></a></h1></div>
        <div id="header_right">
            <ul>
                <li>
                </li>
                <?php
                if(isset($_SESSION['username'])){
                    echo '
                    Добро пожаловать, '.$_SESSION['username']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"shoppingcart.php\"><b>Ваша корзина</b><img src='./images/cart.png'/></a>";
                    echo '<input class="exit_btn middle " style="margin-left: 35px" type="submit" value="Выйти" onclick="location.href=\'exit.php\'">';

                }
                else {
                    include "templates/login_form.php";
                   echo '<button class="btn default_btn middle" type="button" onclick="showLoginForm()">Войти</button>';
                }
                ?>
            </ul>
        </div>
    </div> <!-- END of header -->